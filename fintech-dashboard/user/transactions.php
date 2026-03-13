<?php 
$page_title = "Transaction History";
include '../includes/header-user.php'; 


$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";

$conn = mysqli_connect($servername, $username, $password, $database);
     $userid = $_SESSION['user_id']; 

$sql="SELECT * from transactionhistory where user_id='$userid' ORDER BY transact_date ASC ";
  $run= mysqli_query($conn,$sql);
  






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
              <?php  

if (mysqli_num_rows($run) > 0) {

    while ($row = mysqli_fetch_assoc($run)) {

        // TYPE COLOR
        if ($row['type'] == 'deposit') {
            $typeClass = 'badge-success';
            $icon = 'fa-arrow-down';
        } 
        elseif ($row['type'] == 'withdrawal') {
            $typeClass = 'badge-danger';
            $icon = 'fa-arrow-up';
        } 
        else { // transfer
            $typeClass = 'badge-primary';
            $icon = 'fa-exchange-alt';
        }

        // STATUS COLOR
        if ($row['status'] == 'completed') {
            $statusClass = 'badge-success';
        } 
        elseif ($row['status'] == 'pending') {
            $statusClass = 'badge-warning';
        } 
        else { // failed
            $statusClass = 'badge-danger';
        }

        echo "<tr>
                <td>".$row['transaction_id']."</td>
                <td>
                    <span class='badge $typeClass'>
                        <i class='fas $icon'></i> ".$row['type']."
                    </span>
                </td>
                <td>".$row['description']."</td>
                <td>
                    <strong>₦".$row['amount']."</strong>
                </td>
                <td>
                    <span class='badge $statusClass'>
                        ".$row['status']."
                    </span>
                </td>
                <td>".$row['transact_date']."</td>
                <td>
                    <button class='btn btn-sm btn-secondary'
                        onclick=\"viewTransaction('".$row['transaction_id']."')\">
                        <i class='fas fa-eye'></i>
                    </button>
                </td>
              </tr>";
    }
}

?>
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
