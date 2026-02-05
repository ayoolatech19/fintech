<?php
$page_title = "My Wallet";
include '../includes/header-user.php'; 
?>

<!-- Wallet Balance Card -->
<div class="card mb-4" style="background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light)); border: none; color: white;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <p style="opacity: 0.9; margin-bottom: 8px;">Available Balance</p>
            <h2 style="font-size: 42px; font-weight: 700; margin-bottom: 8px;">$24,580.00</h2>
            <p style="opacity: 0.8; font-size: 14px;">Wallet ID: <?php echo $_SESSION['wallet_id'];?></p>
        </div>
        <div style="text-align: right;">
            <button class="btn" style="background: rgba(255,255,255,0.2); color: white; border: 1px solid rgba(255,255,255,0.3);" onclick="copyToClipboard('FTP-2024-USER-001')">
                <i class="fas fa-copy"></i> Copy ID
            </button>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-3 mb-4">
    <div class="card" style="cursor: pointer;" onclick="window.location.href='deposit.php'">
        <div style="text-align: center;">
            <div style="width: 60px; height: 60px; background: rgba(37, 99, 235, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; color: var(--primary-blue); font-size: 24px;">
                <i class="fas fa-plus-circle"></i>
            </div>
            <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 4px;">Deposit Funds</h3>
            <p style="font-size: 13px; color: var(--text-tertiary);">Add money to your wallet</p>
        </div>
    </div>
    
    <div class="card" style="cursor: pointer;" onclick="window.location.href='transfer.php'">
        <div style="text-align: center;">
            <div style="width: 60px; height: 60px; background: rgba(16, 185, 129, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; color: var(--success); font-size: 24px;">
                <i class="fas fa-paper-plane"></i>
            </div>
            <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 4px;">Send Money</h3>
            <p style="font-size: 13px; color: var(--text-tertiary);">Transfer to other users</p>
        </div>
    </div>
    
    <div class="card" style="cursor: pointer;" onclick="window.location.href='withdraw.php'">
        <div style="text-align: center;">
            <div style="width: 60px; height: 60px; background: rgba(245, 158, 11, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; color: var(--warning); font-size: 24px;">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 4px;">Withdraw</h3>
            <p style="font-size: 13px; color: var(--text-tertiary);">Cash out to your bank</p>
        </div>
    </div>
</div>

<!-- Statistics Grid -->
<div class="grid grid-3 mb-4">
    <div class="card">
        <h4 style="font-size: 14px; color: var(--text-tertiary); margin-bottom: 12px;">Total Deposits</h4>
        <h3 style="font-size: 28px; font-weight: 700; color: var(--success);">$45,230.00</h3>
        <p style="font-size: 13px; color: var(--text-tertiary); margin-top: 8px;">
            <i class="fas fa-arrow-up"></i> 23 deposits this month
        </p>
    </div>
    
    <div class="card">
        <h4 style="font-size: 14px; color: var(--text-tertiary); margin-bottom: 12px;">Total Withdrawals</h4>
        <h3 style="font-size: 28px; font-weight: 700; color: var(--danger);">$20,650.00</h3>
        <p style="font-size: 13px; color: var(--text-tertiary); margin-top: 8px;">
            <i class="fas fa-arrow-down"></i> 15 withdrawals this month
        </p>
    </div>
    
    <div class="card">
        <h4 style="font-size: 14px; color: var(--text-tertiary); margin-bottom: 12px;">Pending Transactions</h4>
        <h3 style="font-size: 28px; font-weight: 700; color: var(--warning);">3</h3>
        <p style="font-size: 13px; color: var(--text-tertiary); margin-top: 8px;">
            <i class="fas fa-clock"></i> Awaiting approval
        </p>
    </div>
</div>

<!-- Recent Wallet Activity -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Recent Wallet Activity</h3>
        <a href="transactions.php" class="card-action">View All Transactions</a>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Transaction</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div>
                            <strong>Deposit via Bank Transfer</strong>
                            <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 4px;">Transaction ID: #TXN-2024-00145</p>
                        </div>
                    </td>
                    <td>
                        <span class="badge badge-success">
                            <i class="fas fa-arrow-down"></i> Deposit
                        </span>
                    </td>
                    <td><strong style="color: var(--success);">+$2,500.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Feb 03, 2026 14:30</td>
                    <td>
                        <button class="btn btn-sm btn-secondary">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <strong>Transfer to Alex Johnson</strong>
                            <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 4px;">Transaction ID: #TXN-2024-00144</p>
                        </div>
                    </td>
                    <td>
                        <span class="badge badge-info">
                            <i class="fas fa-paper-plane"></i> Transfer
                        </span>
                    </td>
                    <td><strong style="color: var(--danger);">-$850.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Feb 02, 2026 10:15</td>
                    <td>
                        <button class="btn btn-sm btn-secondary">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <strong>Withdrawal Request</strong>
                            <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 4px;">Transaction ID: #TXN-2024-00143</p>
                        </div>
                    </td>
                    <td>
                        <span class="badge badge-warning">
                            <i class="fas fa-money-bill-wave"></i> Withdrawal
                        </span>
                    </td>
                    <td><strong style="color: var(--danger);">-$1,200.00</strong></td>
                    <td><span class="badge badge-warning">Pending</span></td>
                    <td>Feb 01, 2026 16:45</td>
                    <td>
                        <button class="btn btn-sm btn-secondary">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <strong>Deposit via Card</strong>
                            <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 4px;">Transaction ID: #TXN-2024-00142</p>
                        </div>
                    </td>
                    <td>
                        <span class="badge badge-success">
                            <i class="fas fa-arrow-down"></i> Deposit
                        </span>
                    </td>
                    <td><strong style="color: var(--success);">+$5,000.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Jan 30, 2026 09:20</td>
                    <td>
                        <button class="btn btn-sm btn-secondary">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <strong>Transfer to Sarah Williams</strong>
                            <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 4px;">Transaction ID: #TXN-2024-00141</p>
                        </div>
                    </td>
                    <td>
                        <span class="badge badge-info">
                            <i class="fas fa-paper-plane"></i> Transfer
                        </span>
                    </td>
                    <td><strong style="color: var(--danger);">-$320.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Jan 28, 2026 13:55</td>
                    <td>
                        <button class="btn btn-sm btn-secondary">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
