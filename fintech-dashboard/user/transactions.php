<?php 
$page_title = "Transaction History";
include '../includes/header-user.php'; 
?>

<!-- Filters -->
<div class="card mb-4">
    <div style="display: flex; gap: 16px; flex-wrap: wrap;">
        <div style="flex: 1; min-width: 200px;">
            <label class="form-label">Filter by Type</label>
            <select class="form-control" id="filterType">
                <option value="all">All Transactions</option>
                <option value="deposit">Deposits</option>
                <option value="transfer">Transfers</option>
                <option value="withdrawal">Withdrawals</option>
            </select>
        </div>
        
        <div style="flex: 1; min-width: 200px;">
            <label class="form-label">Filter by Status</label>
            <select class="form-control" id="filterStatus">
                <option value="all">All Status</option>
                <option value="completed">Completed</option>
                <option value="pending">Pending</option>
                <option value="failed">Failed</option>
            </select>
        </div>
        
        <div style="flex: 1; min-width: 200px;">
            <label class="form-label">Date Range</label>
            <select class="form-control" id="filterDate">
                <option value="all">All Time</option>
                <option value="today">Today</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
                <option value="year">This Year</option>
            </select>
        </div>
        
        <div style="display: flex; align-items: flex-end;">
            <button class="btn btn-primary">
                <i class="fas fa-filter"></i> Apply Filters
            </button>
        </div>
    </div>
</div>

<!-- Transaction Stats -->
<div class="grid grid-4 mb-4">
    <div class="card">
        <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Total Transactions</h4>
        <h3 style="font-size: 24px; font-weight: 700;">248</h3>
    </div>
    
    <div class="card">
        <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Completed</h4>
        <h3 style="font-size: 24px; font-weight: 700; color: var(--success);">235</h3>
    </div>
    
    <div class="card">
        <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Pending</h4>
        <h3 style="font-size: 24px; font-weight: 700; color: var(--warning);">10</h3>
    </div>
    
    <div class="card">
        <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Failed</h4>
        <h3 style="font-size: 24px; font-weight: 700; color: var(--danger);">3</h3>
    </div>
</div>

<!-- Transactions Table -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Transactions</h3>
        <div style="display: flex; gap: 8px;">
            <button class="btn btn-secondary btn-sm">
                <i class="fas fa-download"></i> Export
            </button>
            <button class="btn btn-secondary btn-sm">
                <i class="fas fa-print"></i> Print
            </button>
        </div>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong>#TXN-2024-00145</strong></td>
                    <td><span class="badge badge-success"><i class="fas fa-arrow-down"></i> Deposit</span></td>
                    <td>Bank Transfer Deposit</td>
                    <td><strong style="color: var(--success);">+$2,500.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Feb 03, 2026 14:30</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" onclick="viewTransaction('TXN-2024-00145')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>#TXN-2024-00144</strong></td>
                    <td><span class="badge badge-info"><i class="fas fa-paper-plane"></i> Transfer</span></td>
                    <td>Transfer to Alex Johnson</td>
                    <td><strong style="color: var(--danger);">-$850.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Feb 02, 2026 10:15</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" onclick="viewTransaction('TXN-2024-00144')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>#TXN-2024-00143</strong></td>
                    <td><span class="badge badge-warning"><i class="fas fa-money-bill-wave"></i> Withdrawal</span></td>
                    <td>Withdrawal Request</td>
                    <td><strong style="color: var(--danger);">-$1,200.00</strong></td>
                    <td><span class="badge badge-warning">Pending</span></td>
                    <td>Feb 01, 2026 16:45</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" onclick="viewTransaction('TXN-2024-00143')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>#TXN-2024-00142</strong></td>
                    <td><span class="badge badge-success"><i class="fas fa-arrow-down"></i> Deposit</span></td>
                    <td>Card Payment Deposit</td>
                    <td><strong style="color: var(--success);">+$5,000.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Jan 30, 2026 09:20</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" onclick="viewTransaction('TXN-2024-00142')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>#TXN-2024-00141</strong></td>
                    <td><span class="badge badge-info"><i class="fas fa-paper-plane"></i> Transfer</span></td>
                    <td>Transfer to Sarah Williams</td>
                    <td><strong style="color: var(--danger);">-$320.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Jan 28, 2026 13:55</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" onclick="viewTransaction('TXN-2024-00141')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>#TXN-2024-00140</strong></td>
                    <td><span class="badge badge-warning"><i class="fas fa-money-bill-wave"></i> Withdrawal</span></td>
                    <td>PayPal Withdrawal</td>
                    <td><strong style="color: var(--danger);">-$850.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Jan 25, 2026 11:30</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" onclick="viewTransaction('TXN-2024-00140')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>#TXN-2024-00139</strong></td>
                    <td><span class="badge badge-success"><i class="fas fa-arrow-down"></i> Deposit</span></td>
                    <td>Paystack Deposit</td>
                    <td><strong style="color: var(--success);">+$1,800.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Jan 22, 2026 15:10</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" onclick="viewTransaction('TXN-2024-00139')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>#TXN-2024-00138</strong></td>
                    <td><span class="badge badge-info"><i class="fas fa-paper-plane"></i> Transfer</span></td>
                    <td>Transfer to Mike Chen</td>
                    <td><strong style="color: var(--danger);">-$500.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Jan 20, 2026 08:45</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" onclick="viewTransaction('TXN-2024-00138')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>#TXN-2024-00137</strong></td>
                    <td><span class="badge badge-warning"><i class="fas fa-money-bill-wave"></i> Withdrawal</span></td>
                    <td>Bank Transfer Withdrawal</td>
                    <td><strong style="color: var(--danger);">-$3,200.00</strong></td>
                    <td><span class="badge badge-success">Completed</span></td>
                    <td>Jan 18, 2026 12:20</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" onclick="viewTransaction('TXN-2024-00137')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><strong>#TXN-2024-00136</strong></td>
                    <td><span class="badge badge-success"><i class="fas fa-arrow-down"></i> Deposit</span></td>
                    <td>Bank Transfer Deposit</td>
                    <td><strong style="color: var(--success);">+$4,200.00</strong></td>
                    <td><span class="badge badge-danger">Failed</span></td>
                    <td>Jan 15, 2026 14:00</td>
                    <td>
                        <button class="btn btn-sm btn-secondary" onclick="viewTransaction('TXN-2024-00136')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px 24px; border-top: 1px solid var(--border-color);">
        <p style="font-size: 14px; color: var(--text-tertiary);">Showing 1 to 10 of 248 transactions</p>
        <div style="display: flex; gap: 8px;">
            <button class="btn btn-sm btn-secondary" disabled>Previous</button>
            <button class="btn btn-sm btn-primary">1</button>
            <button class="btn btn-sm btn-secondary">2</button>
            <button class="btn btn-sm btn-secondary">3</button>
            <button class="btn btn-sm btn-secondary">...</button>
            <button class="btn btn-sm btn-secondary">25</button>
            <button class="btn btn-sm btn-secondary">Next</button>
        </div>
    </div>
</div>

<!-- Transaction Detail Modal -->
<div class="modal" id="transactionModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Transaction Details</h3>
            <button class="modal-close" onclick="closeModal('transactionModal')">×</button>
        </div>
        <div class="modal-body">
            <div style="display: flex; flex-direction: column; gap: 16px;">
                <div style="display: flex; justify-content: space-between; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                    <span style="color: var(--text-tertiary);">Transaction ID:</span>
                    <strong id="modalTxnId">-</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                    <span style="color: var(--text-tertiary);">Type:</span>
                    <strong id="modalType">-</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                    <span style="color: var(--text-tertiary);">Amount:</span>
                    <strong id="modalAmount">-</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                    <span style="color: var(--text-tertiary);">Status:</span>
                    <strong id="modalStatus">-</strong>
                </div>
                <div style="display: flex; justify-content: space-between; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                    <span style="color: var(--text-tertiary);">Date:</span>
                    <strong id="modalDate">-</strong>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('transactionModal')">Close</button>
            <button class="btn btn-primary">Download Receipt</button>
        </div>
    </div>
</div>

<script>
function viewTransaction(txnId) {
    // Mock data - in production, fetch from server
    document.getElementById('modalTxnId').textContent = '#' + txnId;
    document.getElementById('modalType').textContent = 'Deposit';
    document.getElementById('modalAmount').textContent = '$2,500.00';
    document.getElementById('modalStatus').textContent = 'Completed';
    document.getElementById('modalDate').textContent = 'Feb 03, 2026 14:30';
    
    openModal('transactionModal');
}
</script>

<?php include '../includes/footer.php'; ?>
