<?php 
$page_title = "Withdraw Funds";
include '../includes/header-user.php'; 
?>

<!-- Alert -->
<div class="alert alert-warning mb-4">
    <i class="fas fa-exclamation-triangle"></i>
    <span>Withdrawal requests are reviewed by our team and typically processed within 24-48 hours.</span>
</div>

<div class="grid grid-2">
    <!-- Withdrawal Form -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Request Withdrawal</h3>
        </div>
        
        <form id="withdrawForm" onsubmit="return handleWithdraw(event)">
            <div class="form-group">
                <label class="form-label">Withdrawal Method</label>
                <select class="form-control" id="withdrawMethod" required>
                    <option value="">Select withdrawal method</option>
                    <option value="bank">Bank Transfer</option>
                    <option value="paypal">PayPal</option>
                    <option value="crypto">Cryptocurrency</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" placeholder="Enter amount" step="0.01" min="50" required>
                <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 4px;">
                    Available: <strong>$24,580.00</strong> | Minimum: <strong>$50.00</strong>
                </p>
            </div>
            
            <div class="form-group" id="bankDetailsGroup" style="display: none;">
                <label class="form-label">Bank Account Number</label>
                <input type="text" class="form-control" id="bankAccount" placeholder="Enter your bank account number">
                
                <label class="form-label mt-2">Bank Name</label>
                <input type="text" class="form-control" id="bankName" placeholder="Enter your bank name">
                
                <label class="form-label mt-2">Account Name</label>
                <input type="text" class="form-control" id="accountName" placeholder="Enter account holder name">
            </div>
            
            <div class="form-group" id="paypalGroup" style="display: none;">
                <label class="form-label">PayPal Email</label>
                <input type="email" class="form-control" id="paypalEmail" placeholder="Enter your PayPal email">
            </div>
            
            <div class="form-group" id="cryptoGroup" style="display: none;">
                <label class="form-label">Cryptocurrency</label>
                <select class="form-control" id="cryptoType">
                    <option value="btc">Bitcoin (BTC)</option>
                    <option value="eth">Ethereum (ETH)</option>
                    <option value="usdt">Tether (USDT)</option>
                </select>
                
                <label class="form-label mt-2">Wallet Address</label>
                <input type="text" class="form-control" id="cryptoWallet" placeholder="Enter your wallet address">
            </div>
            
            <div class="form-group">
                <label class="form-label">Reason for Withdrawal (Optional)</label>
                <textarea class="form-control" id="reason" placeholder="Tell us why you're withdrawing"></textarea>
            </div>
            
            <!-- Withdrawal Summary -->
            <div style="background-color: var(--bg-secondary); padding: 16px; border-radius: 8px; margin-bottom: 20px;">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <span style="color: var(--text-tertiary);">Withdrawal Amount:</span>
                    <span id="displayAmount">$0.00</span>
                </div>
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <span style="color: var(--text-tertiary);">Processing Fee:</span>
                    <span id="displayFee">$0.00</span>
                </div>
                <div style="height: 1px; background-color: var(--border-color); margin: 12px 0;"></div>
                <div style="display: flex; justify-content: space-between;">
                    <strong>You Will Receive:</strong>
                    <strong id="displayTotal" style="color: var(--success);">$0.00</strong>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary w-full">
                <i class="fas fa-check-circle"></i> Submit Withdrawal Request
            </button>
        </form>
    </div>
    
    <!-- Info & Pending Withdrawals -->
    <div>
        <!-- Withdrawal Info -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Withdrawal Process</h3>
            </div>
            <div style="display: flex; flex-direction: column; gap: 16px;">
                <div style="display: flex; gap: 12px;">
                    <div style="width: 40px; height: 40px; background: rgba(37, 99, 235, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--primary-blue); font-weight: 700;">
                        1
                    </div>
                    <div style="flex: 1;">
                        <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">Submit Request</h4>
                        <p style="font-size: 13px; color: var(--text-tertiary);">Fill out the form and submit your withdrawal request</p>
                    </div>
                </div>
                
                <div style="display: flex; gap: 12px;">
                    <div style="width: 40px; height: 40px; background: rgba(245, 158, 11, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--warning); font-weight: 700;">
                        2
                    </div>
                    <div style="flex: 1;">
                        <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">Review Process</h4>
                        <p style="font-size: 13px; color: var(--text-tertiary);">Our team reviews your request (24-48 hours)</p>
                    </div>
                </div>
                
                <div style="display: flex; gap: 12px;">
                    <div style="width: 40px; height: 40px; background: rgba(16, 185, 129, 0.1); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--success); font-weight: 700;">
                        3
                    </div>
                    <div style="flex: 1;">
                        <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">Receive Funds</h4>
                        <p style="font-size: 13px; color: var(--text-tertiary);">Money is transferred to your account</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pending Withdrawals -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pending Withdrawals</h3>
            </div>
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <div style="padding: 12px; background-color: var(--bg-secondary); border-radius: 8px; border-left: 3px solid var(--warning);">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                        <strong style="font-size: 14px;">Bank Transfer</strong>
                        <span class="badge badge-warning">Pending</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: 13px; color: var(--text-tertiary);">Feb 01, 2026</span>
                        <strong style="color: var(--text-primary);">$1,200.00</strong>
                    </div>
                </div>
                
                <div style="padding: 16px; text-align: center; color: var(--text-tertiary);">
                    <i class="fas fa-clock" style="font-size: 32px; margin-bottom: 8px;"></i>
                    <p style="font-size: 13px;">No other pending withdrawals</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Withdrawal History -->
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Withdrawal History</h3>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Method</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Requested Date</th>
                    <th>Processed Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>#WD-2024-00143</strong></td>
                    <td>Bank Transfer</td>
                    <td><strong>$1,200.00</strong></td>
                    <td><span class="badge badge-warning">Pending</span></td>
                    <td>Feb 01, 2026</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td><strong>#WD-2024-00142</strong></td>
                    <td>PayPal</td>
                    <td><strong>$850.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Jan 28, 2026</td>
                    <td>Jan 29, 2026</td>
                </tr>
                <tr>
                    <td><strong>#WD-2024-00141</strong></td>
                    <td>Bank Transfer</td>
                    <td><strong>$2,500.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Jan 20, 2026</td>
                    <td>Jan 22, 2026</td>
                </tr>
                <tr>
                    <td><strong>#WD-2024-00140</strong></td>
                    <td>Cryptocurrency</td>
                    <td><strong>$1,000.00</strong></td>
                    <td><span class="badge badge-danger">Rejected</span></td>
                    <td>Jan 15, 2026</td>
                    <td>Jan 16, 2026</td>
                </tr>
                <tr>
                    <td><strong>#WD-2024-00139</strong></td>
                    <td>Bank Transfer</td>
                    <td><strong>$3,200.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Jan 10, 2026</td>
                    <td>Jan 12, 2026</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
// Show/hide fields based on withdrawal method
document.getElementById('withdrawMethod').addEventListener('change', function() {
    const method = this.value;
    
    // Hide all method-specific groups
    document.getElementById('bankDetailsGroup').style.display = 'none';
    document.getElementById('paypalGroup').style.display = 'none';
    document.getElementById('cryptoGroup').style.display = 'none';
    
    // Show relevant group
    if (method === 'bank') {
        document.getElementById('bankDetailsGroup').style.display = 'block';
    } else if (method === 'paypal') {
        document.getElementById('paypalGroup').style.display = 'block';
    } else if (method === 'crypto') {
        document.getElementById('cryptoGroup').style.display = 'block';
    }
});

// Calculate fees in real-time
document.getElementById('amount').addEventListener('input', function() {
    const amount = parseFloat(this.value) || 0;
    const fee = amount * 0.03; // 3% fee
    const total = amount - fee;
    
    document.getElementById('displayAmount').textContent = '$' + amount.toFixed(2);
    document.getElementById('displayFee').textContent = '$' + fee.toFixed(2);
    document.getElementById('displayTotal').textContent = '$' + total.toFixed(2);
});

// Handle withdrawal form submission
function handleWithdraw(event) {
    event.preventDefault();
    
    if (!validateForm('withdrawForm')) {
        showNotification('Please fill in all required fields', 'danger');
        return false;
    }
    
    const amount = document.getElementById('amount').value;
    const method = document.getElementById('withdrawMethod').value;
    
    // Check balance (mock)
    if (parseFloat(amount) > 24580) {
        showNotification('Insufficient balance', 'danger');
        return false;
    }
    
    // Check minimum
    if (parseFloat(amount) < 50) {
        showNotification('Minimum withdrawal amount is $50', 'danger');
        return false;
    }
    
    // Simulate withdrawal processing
    showNotification('Submitting withdrawal request...', 'info');
    
    setTimeout(function() {
        showNotification('Withdrawal request submitted successfully! You will be notified once it\'s processed.', 'success');
        // Redirect to dashboard
        setTimeout(function() {
            window.location.href = 'dashboard.php';
        }, 2000);
    }, 2000);
    
    return false;
}
</script>

<?php include '../includes/footer.php'; ?>
