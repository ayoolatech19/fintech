<?php 
$page_title = "Transfer Money";
include '../includes/header-user.php'; 


$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";

$conn = mysqli_connect($servername, $username, $password, $database);

if (isset($_POST['send'])) {

    $description = $_POST['descrip'];
    $amount      = $_POST['amount'];
    $info        = $_POST['recipient_info'];

    $sender_id = $_SESSION['user_id'];

    // ✅ 1. Verify recipient (fullname/email/wallet_id)
    $sql = "
    SELECT signup.id AS user_id,
           wallet.wallet_id,
           wallet.wallet_balance
    FROM signup
    JOIN wallet ON signup.id = wallet.user_id
    WHERE signup.email = ?
       OR signup.fullname = ?
       OR wallet.wallet_id = ?
    ";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $info, $info, $info);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {

        $recipient = mysqli_fetch_assoc($result);

        $recipient_id        = $recipient['user_id'];
        $recipient_wallet_id = $recipient['wallet_id'];

        echo "Recipient verified successfully!<br>";

        // ✅ 2. Insert transfer record properly
        $insert = "
        INSERT INTO transfers (sender_id, recipient_id, amount, description)
        VALUES (?, ?, ?, ?)
        ";

        $stmt2 = mysqli_prepare($conn, $insert);
        mysqli_stmt_bind_param(
            $stmt2,
            "iids",
            $sender_id,
            $recipient_id,
            $amount,
            $description
        );

        if (mysqli_stmt_execute($stmt2)) {
            echo "Transfer saved successfully!";
        } else {
            echo "Transfer failed!";
        }

    } else {
        die("Recipient not found. Check fullname, email or wallet ID.");
    }
}
?>


<div class="grid grid-2">
    <!-- Transfer Form -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Send Money</h3>
        </div>
        
        <form id="transferForm" method="post" >
            <div class="form-group">
                <label class="form-label">Recipient</label>
                <select class="form-control"  id="recipientType" onchange="toggleRecipientInput()">
                    <option value="email">Email Address</option>
                    <option value="fullname">Fullname</option>
                    <option value="wallet_id">Wallet ID</option>
                </select>
            </div>
            
            <div class="form-group" id="recipientInputGroup">
                <label class="form-label"  id="recipientLabel">Recipient Email</label>
                <input type="text" class="form-control" name="recipient_info" id="recipient" placeholder="Enter recipient email" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Amount</label>
                <input type="number"  name="amount"  class="form-control" id="amount" placeholder="Enter amount" step="0.01" min="1" required>
                <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 4px;">
                    Available Balance: <strong>$24,580.00</strong>
                </p>
            </div>
            
            <div class="form-group">
                <label class="form-label">Description (Optional)</label>
                <textarea class="form-control" name="descrip" id="description" placeholder="What's this transfer for?"></textarea>
            </div>
            
            <!-- Transfer Summary -->
            <div style="background-color: var(--bg-secondary); padding: 16px; border-radius: 8px; margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <span style="color: var(--text-tertiary);">Transfer Amount:</span>
                    <span id="displayAmount">$0.00</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <span style="color: var(--text-tertiary);">Transfer Fee:</span>
                    <span id="displayFee">$0.00</span>
                </div>
                <div style="height: 1px; background-color: var(--border-color); margin: 12px 0;"></div>
                <div style="display: flex; justify-content: space-between;">
                    <strong>Total Deduction:</strong>
                    <strong id="displayTotal" style="color: var(--danger);">$0.00</strong>
                </div>
            </div>
            
            <button type="submit"name="send" class="btn btn-primary w-full">
                <i class="fas fa-paper-plane"></i> Send Money
            </button>
        </form>
    </div>
    
    <!-- Info & Quick Transfer -->
    <div>
        <!-- Quick Transfer -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Quick Transfer</h3>
            </div>
            <p style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 16px;">Send money to recent recipients</p>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px; cursor: pointer;" onclick="quickTransfer('alex@example.com', 'Alex Johnson')">
                    <div style="display: flex; gap: 12px; align-items: center;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                            AJ
                        </div>
                        <div>
                            <strong style="font-size: 14px;">Alex Johnson</strong>
                            <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">alex@example.com</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right" style="color: var(--text-tertiary);"></i>
                </div>
                
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px; cursor: pointer;" onclick="quickTransfer('sarah@example.com', 'Sarah Williams')">
                    <div style="display: flex; gap: 12px; align-items: center;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #f093fb, #f5576c); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                            SW
                        </div>
                        <div>
                            <strong style="font-size: 14px;">Sarah Williams</strong>
                            <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">sarah@example.com</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right" style="color: var(--text-tertiary);"></i>
                </div>
                
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px; cursor: pointer;" onclick="quickTransfer('mike@example.com', 'Mike Chen')">
                    <div style="display: flex; gap: 12px; align-items: center;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #4facfe, #00f2fe); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                            MC
                        </div>
                        <div>
                            <strong style="font-size: 14px;">Mike Chen</strong>
                            <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">mike@example.com</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right" style="color: var(--text-tertiary);"></i>
                </div>
            </div>
        </div>
        
        <!-- Transfer Info -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Transfer Information</h3>
            </div>
            <div style="display: flex; flex-direction: column; gap: 16px;">
                <div style="display: flex; gap: 12px;">
                    <div style="width: 40px; height: 40px; background: rgba(37, 99, 235, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--primary-blue);">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div style="flex: 1;">
                        <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">Instant Transfer</h4>
                        <p style="font-size: 13px; color: var(--text-tertiary);">Money is transferred instantly to the recipient</p>
                    </div>
                </div>
                
                <div style="display: flex; gap: 12px;">
                    <div style="width: 40px; height: 40px; background: rgba(16, 185, 129, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--success);">
                        <i class="fas fa-percent"></i>
                    </div>
                    <div style="flex: 1;">
                        <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">Low Fees</h4>
                        <p style="font-size: 13px; color: var(--text-tertiary);">Only 1% transfer fee, capped at $10</p>
                    </div>
                </div>
                
                <div style="display: flex; gap: 12px;">
                    <div style="width: 40px; height: 40px; background: rgba(245, 158, 11, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--warning);">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div style="flex: 1;">
                        <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">Secure & Protected</h4>
                        <p style="font-size: 13px; color: var(--text-tertiary);">All transfers are encrypted and monitored</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Toggle recipient input based on type
function toggleRecipientInput() {
    const type = document.getElementById('recipientType').value;
    const label = document.getElementById('recipientLabel');
    const input = document.getElementById('recipient');
    
    switch(type) {
        case 'email':
            label.textContent = 'Recipient Email';
            input.placeholder = 'Enter recipient email';
            input.type = 'email';
            break;
        case 'username':
            label.textContent = 'Recipient fullname';
            input.placeholder = 'Enter fullname';
            input.type = 'text';
            break;
        case 'wallet_id':
            label.textContent = 'Recipient Wallet ID';
            input.placeholder = 'Enter wallet ID';
            input.type = 'text';
            break;
    }
}

// Calculate fees in real-time
document.getElementById('amount').addEventListener('input', function() {
    const amount = parseFloat(this.value) || 0;
    const fee = Math.min(amount * 0.01, 10); // 1% fee, max $10
    const total = amount + fee;
    
    document.getElementById('displayAmount').textContent = '$' + amount.toFixed(2);
    document.getElementById('displayFee').textContent = '$' + fee.toFixed(2);
    document.getElementById('displayTotal').textContent = '$' + total.toFixed(2);
});

// // Quick transfer
// function quickTransfer(email, name) {
//     document.getElementById('recipientType').value = 'email';
//     toggleRecipientInput();
//     document.getElementById('recipient').value = email;
//     showNotification('Recipient selected: ' + name, 'info');
// }

// // Handle transfer form submission
// function handleTransfer(event) {
//     event.preventDefault();
    
//     if (!validateForm('transferForm')) {
//         showNotification('Please fill in all required fields', 'danger');
//         return false;
//     }
    
//     const recipient = document.getElementById('recipient').value;
//     const amount = document.getElementById('amount').value;
    
//     // Check balance (mock)
//     if (parseFloat(amount) > 24580) {
//         showNotification('Insufficient balance', 'danger');
//         return false;
//     }
    
//     // Simulate transfer processing
//     showNotification('Processing transfer...', 'info');
    
//     setTimeout(function() {
//         showNotification('Transfer successful! $' + amount + ' sent to ' + recipient, 'success');
//         // Redirect to transactions page
//         setTimeout(function() {
//             window.location.href = 'transactions.php';
//         }, 2000);
//     }, 2000);
    
//     return false;
// }
</script> 

<?php include '../includes/footer.php'; ?>
