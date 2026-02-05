<?php 
$page_title = "Deposit Funds";
include '../includes/header-user.php'; 


$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";

$conn = mysqli_connect($servername, $username, $password, $database);

if (isset($_POST['proceed'])) {

    $deposit=  $_POST['depositmeth'];
     $amount= $_POST['amount'];
     $textarea= $_POST['textarea'];

    $sql = "INSERT INTO deposit (deposit_meth,amount,description)
            VALUES ('$deposit','$amount','$textarea')";

    if ( mysqli_query($conn, $sql))
       {
        echo "Registration successful";
    } else {
      echo "Not successfully";
    }
  

}







?>

<!-- Alert -->
<div class="alert alert-info mb-4">
    <i class="fas fa-info-circle"></i>
    <span>This is a mock deposit page. In production, integrate with real payment gateways like Paystack or Flutterwave.</span>
</div>

<div class="grid grid-2">
    <!-- Deposit Form -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Deposit Money</h3>
        </div>
        
        <form id="depositForm" method="POST" onsubmit="return handleDeposit(event)">
            <div class="form-group">
                <label class="form-label">Deposit Method</label>
                <select class="form-control" name="depositmeth" id="depositMethod" required>
                    <option value="">Select payment method</option>
                    <option value="bank_transfer">Bank Transfer</option>
                    <option value="card">Credit/Debit Card</option>
                    <option value="paystack">Paystack (Mock)</option>
                    <option value="flutterwave">Flutterwave (Mock)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" id="amount" placeholder="Enter amount" step="0.01" min="10" required>
                <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 4px;">Minimum deposit: $10.00</p>
            </div>
            
            <div class="form-group">
                <label class="form-label">Description (Optional)</label>
                <textarea class="form-control" name="textarea" id="description" placeholder="Add a note about this deposit"></textarea>
            </div>
            
            <!-- Fee Information -->
            <div style="background-color: var(--bg-secondary); padding: 16px; border-radius: 8px; margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <span style="color: var(--text-tertiary);">Amount:</span>
                    <span id="displayAmount">$0.00</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <span style="color: var(--text-tertiary);">Processing Fee:</span>
                    <span id="displayFee">$0.00</span>
                </div>
                <div style="height: 1px; background-color: var(--border-color); margin: 12px 0;"></div>
                <div style="display: flex; justify-content: space-between;">
                    <strong>Total to Pay:</strong>
                    <strong id="displayTotal" style="color: var(--primary-blue);">$0.00</strong>
                </div>
            </div>
            
            <button type="submit" name="proceed" class="btn btn-primary w-full">
                <i class="fas fa-check-circle"></i> Proceed to Deposit
            </button>
        </form>
    </div>
    
    <!-- Info & Recent Deposits -->
    <div>
        <!-- Deposit Info -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Deposit Information</h3>
            </div>
            <div style="display: flex; flex-direction: column; gap: 16px;">
                <div style="display: flex; gap: 12px;">
                    <div style="width: 40px; height: 40px; background: rgba(37, 99, 235, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--primary-blue);">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div style="flex: 1;">
                        <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">Instant Processing</h4>
                        <p style="font-size: 13px; color: var(--text-tertiary);">Your deposit will be credited instantly after confirmation</p>
                    </div>
                </div>
                
                <div style="display: flex; gap: 12px;">
                    <div style="width: 40px; height: 40px; background: rgba(16, 185, 129, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--success);">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div style="flex: 1;">
                        <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">Secure Payment</h4>
                        <p style="font-size: 13px; color: var(--text-tertiary);">All transactions are encrypted and secure</p>
                    </div>
                </div>
                
                <div style="display: flex; gap: 12px;">
                    <div style="width: 40px; height: 40px; background: rgba(245, 158, 11, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--warning);">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div style="flex: 1;">
                        <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">24/7 Available</h4>
                        <p style="font-size: 13px; color: var(--text-tertiary);">Make deposits anytime, anywhere</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Recent Deposits -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Deposits</h3>
            </div>
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                    <div>
                        <strong style="font-size: 14px;">Bank Transfer</strong>
                        <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Feb 03, 2026</p>
                    </div>
                    <strong style="color: var(--success);">+$2,500.00</strong>
                </div>
                
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                    <div>
                        <strong style="font-size: 14px;">Credit Card</strong>
                        <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Jan 30, 2026</p>
                    </div>
                    <strong style="color: var(--success);">+$5,000.00</strong>
                </div>
                
                <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                    <div>
                        <strong style="font-size: 14px;">Paystack</strong>
                        <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Jan 25, 2026</p>
                    </div>
                    <strong style="color: var(--success);">+$1,800.00</strong>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
<script>
// Calculate fees in real-time
document.getElementById('amount').addEventListener('input', function() {
    const amount = parseFloat(this.value) || 0;
    const fee = amount * 0.02; // 2% fee
    const total = amount + fee;
    
    document.getElementById('displayAmount').textContent = '$' + amount.toFixed(2);
    document.getElementById('displayFee').textContent = '$' + fee.toFixed(2);
    document.getElementById('displayTotal').textContent = '$' + total.toFixed(2);
});

// Handle deposit form submission
function handleDeposit(event) {
    event.preventDefault();
    
    if (!validateForm('depositForm')) {
        showNotification('Please fill in all required fields', 'danger');
        return false;
    }
    
    const method = document.getElementById('depositMethod').value;
    const amount = document.getElementById('amount').value;
    
    // Simulate payment processing
    showNotification('Processing your deposit...', 'info');
    
    setTimeout(function() {
        showNotification('Deposit successful! Your wallet has been credited with $' + amount, 'success');
        // Redirect to wallet page
        setTimeout(function() {
            window.location.href = 'wallet.php';
        }, 2000);
    }, 2000);
    
    return false;
}
</script> -->

<?php include '../includes/footer.php'; ?>
