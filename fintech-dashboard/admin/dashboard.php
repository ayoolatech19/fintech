<?php 
$page_title = "Admin Dashboard";
include '../includes/header-admin.php'; 
?>

<!-- Stats Cards -->
<div class="grid grid-4 mb-4">
    <!-- Total Users -->
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon blue">
                <i class="fas fa-users"></i>
            </div>
            <span class="stat-change up">
                <i class="fas fa-arrow-up"></i> 12.5%
            </span>
        </div>
        <div class="stat-body">
            <h3>1,248</h3>
            <p>Total Users</p>
        </div>
    </div>
    
    <!-- Total Balance -->
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon green">
                <i class="fas fa-wallet"></i>
            </div>
            <span class="stat-change up">
                <i class="fas fa-arrow-up"></i> 8.2%
            </span>
        </div>
        <div class="stat-body">
            <h3>$2.4M</h3>
            <p>Total Platform Balance</p>
        </div>
    </div>
    
    <!-- Transactions Today -->
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon orange">
                <i class="fas fa-exchange-alt"></i>
            </div>
            <span class="stat-change up">
                <i class="fas fa-arrow-up"></i> 15.3%
            </span>
        </div>
        <div class="stat-body">
            <h3>342</h3>
            <p>Transactions Today</p>
        </div>
    </div>
    
    <!-- Pending Withdrawals -->
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon red">
                <i class="fas fa-clock"></i>
            </div>
            <span class="stat-change">
                <i class="fas fa-exclamation-circle"></i> Needs Attention
            </span>
        </div>
        <div class="stat-body">
            <h3>5</h3>
            <p>Pending Withdrawals</p>
        </div>
    </div>
</div>

<!-- Chart & Quick Actions -->
<div class="grid grid-2 mb-4">
    <!-- Transaction Chart -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Transaction Volume (7 Days)</h3>
        </div>
        <div style="height: 300px; display: flex; align-items: center; justify-content: center; color: var(--text-tertiary);">
            <div style="text-align: center;">
                <i class="fas fa-chart-line" style="font-size: 48px; margin-bottom: 16px; opacity: 0.3;"></i>
                <p>Chart will be rendered here with Chart.js or similar library</p>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Quick Actions</h3>
        </div>
        <div style="display: flex; flex-direction: column; gap: 12px;">
            <button class="btn btn-primary w-full" onclick="window.location.href='users.php'">
                <i class="fas fa-users"></i> Manage Users
            </button>
            <button class="btn btn-primary w-full" onclick="window.location.href='withdrawals.php'">
                <i class="fas fa-money-check-alt"></i> Review Withdrawals
            </button>
            <button class="btn btn-primary w-full" onclick="window.location.href='transactions.php'">
                <i class="fas fa-exchange-alt"></i> View All Transactions
            </button>
            <button class="btn btn-secondary w-full" onclick="window.location.href='reports.php'">
                <i class="fas fa-file-alt"></i> Generate Reports
            </button>
        </div>
        
        <!-- Platform Stats -->
        <div style="margin-top: 24px; padding-top: 24px; border-top: 1px solid var(--border-color);">
            <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 16px;">Platform Statistics</h4>
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <div style="display: flex; justify-content: space-between;">
                    <span style="font-size: 13px; color: var(--text-tertiary);">Active Users Today:</span>
                    <strong>892</strong>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <span style="font-size: 13px; color: var(--text-tertiary);">Transaction Volume:</span>
                    <strong>$458,230</strong>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <span style="font-size: 13px; color: var(--text-tertiary);">Success Rate:</span>
                    <strong style="color: var(--success);">98.5%</strong>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Grid -->
<div class="grid grid-2">
    <!-- Recent Transactions -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Recent Transactions</h3>
            <a href="transactions.php" class="card-action">View All</a>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>John Doe</strong></td>
                        <td><span class="badge badge-success"><i class="fas fa-arrow-down"></i> Deposit</span></td>
                        <td><strong>$2,500.00</strong></td>
                        <td><span class="badge badge-success">Completed</span></td>
                    </tr>
                    <tr>
                        <td><strong>Sarah Williams</strong></td>
                        <td><span class="badge badge-info"><i class="fas fa-paper-plane"></i> Transfer</span></td>
                        <td><strong>$850.00</strong></td>
                        <td><span class="badge badge-success">Completed</span></td>
                    </tr>
                    <tr>
                        <td><strong>Mike Chen</strong></td>
                        <td><span class="badge badge-warning"><i class="fas fa-money-bill-wave"></i> Withdrawal</span></td>
                        <td><strong>$1,200.00</strong></td>
                        <td><span class="badge badge-warning">Pending</span></td>
                    </tr>
                    <tr>
                        <td><strong>Alex Johnson</strong></td>
                        <td><span class="badge badge-success"><i class="fas fa-arrow-down"></i> Deposit</span></td>
                        <td><strong>$5,000.00</strong></td>
                        <td><span class="badge badge-success">Completed</span></td>
                    </tr>
                    <tr>
                        <td><strong>Emily Davis</strong></td>
                        <td><span class="badge badge-info"><i class="fas fa-paper-plane"></i> Transfer</span></td>
                        <td><strong>$320.00</strong></td>
                        <td><span class="badge badge-success">Completed</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Pending Withdrawals -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pending Withdrawal Requests</h3>
            <a href="withdrawals.php" class="card-action">View All</a>
        </div>
        <div style="display: flex; flex-direction: column; gap: 12px;">
            <div style="padding: 12px; background-color: var(--bg-secondary); border-radius: 8px; border-left: 3px solid var(--warning);">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <strong style="font-size: 14px;">Mike Chen</strong>
                    <strong style="color: var(--text-primary);">$1,200.00</strong>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 12px; color: var(--text-tertiary);">Bank Transfer</span>
                    <div style="display: flex; gap: 8px;">
                        <button class="btn btn-success btn-sm">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div style="padding: 12px; background-color: var(--bg-secondary); border-radius: 8px; border-left: 3px solid var(--warning);">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <strong style="font-size: 14px;">Emily Davis</strong>
                    <strong style="color: var(--text-primary);">$850.00</strong>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 12px; color: var(--text-tertiary);">PayPal</span>
                    <div style="display: flex; gap: 8px;">
                        <button class="btn btn-success btn-sm">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div style="padding: 12px; background-color: var(--bg-secondary); border-radius: 8px; border-left: 3px solid var(--warning);">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <strong style="font-size: 14px;">Robert Brown</strong>
                    <strong style="color: var(--text-primary);">$2,500.00</strong>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 12px; color: var(--text-tertiary);">Bank Transfer</span>
                    <div style="display: flex; gap: 8px;">
                        <button class="btn btn-success btn-sm">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div style="padding: 12px; background-color: var(--bg-secondary); border-radius: 8px; border-left: 3px solid var(--warning);">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <strong style="font-size: 14px;">Lisa Anderson</strong>
                    <strong style="color: var(--text-primary);">$650.00</strong>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 12px; color: var(--text-tertiary);">Cryptocurrency</span>
                    <div style="display: flex; gap: 8px;">
                        <button class="btn btn-success btn-sm">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div style="padding: 12px; background-color: var(--bg-secondary); border-radius: 8px; border-left: 3px solid var(--warning);">
                <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
                    <strong style="font-size: 14px;">David Wilson</strong>
                    <strong style="color: var(--text-primary);">$3,200.00</strong>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span style="font-size: 12px; color: var(--text-tertiary);">Bank Transfer</span>
                    <div style="display: flex; gap: 8px;">
                        <button class="btn btn-success btn-sm">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
