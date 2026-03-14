<?php 
$page_title = "Withdrawal Requests";
include '../includes/header-admin.php'; 


$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";

$conn = mysqli_connect($servername, $username, $password, $database);




$sql = "SELECT COUNT(*) AS total_pending 
        FROM withdraw 
        WHERE status = 'pending'";

$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);



$sqlw = "SELECT SUM(amount) AS totalamountpending 
        FROM withdraw where status='pending'";

$resultw = mysqli_query($conn, $sqlw);
$roww = mysqli_fetch_assoc($resultw);

$totalamountpending = $roww['totalamountpending'];



$sqli="SELECT * from withdraw  ORDER BY withdraw_at ASC";
  $run= mysqli_query($conn,$sqli);





  if(isset($_POST['approve'])){

$id = $_POST['withdraw_id'];

$approve = "UPDATE withdraw SET status='approved' WHERE id='$id'";
mysqli_query($conn,$approve);

header("Location: withdrawal_requests.php");
exit();
}

if(isset($_POST['reject'])){

$id = $_POST['withdraw_id'];

$reject = "UPDATE withdraw SET status='rejected' WHERE id='$id'";
mysqli_query($conn,$reject);

header("Location: withdrawal_requests.php");
exit();
}
  
?>

<!-- Alert -->
<div class="alert alert-warning mb-4">
    <i class="fas fa-exclamation-triangle"></i>
    <span>You have 5 pending withdrawal requests that require your attention.</span>
</div>

<!-- Stats -->
<div class="grid grid-4 mb-4">
    <div class="card">
        <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Pending Requests</h4>
        <h3 style="font-size: 24px; font-weight: 700; color: var(--warning);"><?php echo $rows['total_pending']; ?></h3>
    </div>
    
    <div class="card">
        <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Approved Today</h4>
        <h3 style="font-size: 24px; font-weight: 700; color: var(--success);">12</h3>
    </div>
    
    <div class="card">
        <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Rejected Today</h4>
        <h3 style="font-size: 24px; font-weight: 700; color: var(--danger);">2</h3>
    </div>
    
    <div class="card">
        <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Total Amount Pending</h4>
        <h3 style="font-size: 24px; font-weight: 700;"> $<?php echo $totalamountpending ?></h3>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div style="display: flex; gap: 16px; flex-wrap: wrap; align-items: flex-end;">
        <div style="flex: 1; min-width: 200px;">
            <label class="form-label">Filter by Status</label>
            <select class="form-control">
                <option value="pending">Pending</option>
                <option value="approved">Approved</option>
                <option value="rejected">Rejected</option>
                <option value="all">All Status</option>
            </select>
        </div>
        
        <div style="flex: 1; min-width: 150px;">
            <label class="form-label">Method</label>
            <select class="form-control">
                <option value="all">All Methods</option>
                <option value="bank">Bank Transfer</option>
                <option value="paypal">PayPal</option>
                <option value="crypto">Cryptocurrency</option>
            </select>
        </div>
        
        <div style="flex: 1; min-width: 150px;">
            <label class="form-label">Date Range</label>
            <select class="form-control">
                <option value="today">Today</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
                <option value="all">All Time</option>
            </select>
        </div>
        
        <button class="btn btn-primary">
            <i class="fas fa-filter"></i> Apply
        </button>
    </div>
</div>

<!-- Withdrawal Requests Table -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Withdrawal Requests</h3>
        <div style="display: flex; gap: 8px;">
            <button class="btn btn-success btn-sm">
                <i class="fas fa-check-double"></i> Approve Selected
            </button>
            <button class="btn btn-secondary btn-sm">
                <i class="fas fa-download"></i> Export
            </button>
        </div>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th><input type="checkbox"></th>
                    <th>Request ID</th>
                    <th>User</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>Details</th>
                    <th>Requested</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php

if (mysqli_num_rows($run) > 0) {

while ($row = mysqli_fetch_assoc($run)) {

echo "<tr>
<td><input type='checkbox'></td>

<td><strong>#WD-00".$row['transaction_id']."</strong></td>

<td>
<div>
<strong style='font-size: 14px;'>".$row['user_id']."</strong>
</div>
</td>

<td><strong>$".$row['amount']."</strong></td>

<td>".$row['method']."</td>

<td>
<button class='btn btn-sm btn-secondary'>
<i class='fas fa-eye'></i> View
</button>
</td>

<td>".$row['withdraw_at']."</td>

<td>
<span class='badge badge-warning'>".$row['status']."</span>
</td>
<td>
<form method='POST'>

<input type='hidden' name='withdraw_id' value='".$row['transaction_id']."'>

<button type='submit' name='approve' class='btn btn-sm btn-success'>
<i class='fas fa-check'></i>
</button>

<button type='submit' name='reject' class='btn btn-sm btn-danger'>
<i class='fas fa-times'></i>
</button>

</form>
</td>

</tr>";

}

}
?>
            
            </tbody>
        </table>
    </div>
</div>

<!-- Withdrawal Details Modal -->
<div class="modal" id="detailsModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title">Withdrawal Request Details</h3>
            <button class="modal-close" onclick="closeModal('detailsModal')">×</button>
        </div>
        <div class="modal-body">
            <div style="display: flex; flex-direction: column; gap: 16px;">
                <div style="padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                    <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 4px;">Request ID</h4>
                    <strong id="modalRequestId">-</strong>
                </div>
                <div style="padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                    <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 4px;">User Information</h4>
                    <strong id="modalUser">-</strong>
                </div>
                <div style="padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                    <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 4px;">Withdrawal Amount</h4>
                    <strong id="modalAmount">-</strong>
                </div>
                <div style="padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                    <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 4px;">Withdrawal Method</h4>
                    <strong id="modalMethod">-</strong>
                </div>
                <div style="padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                    <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 4px;">Bank/Payment Details</h4>
                    <p id="modalDetails" style="margin-top: 4px;">-</p>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('detailsModal')">Close</button>
            <button class="btn btn-danger" onclick="rejectWithdrawal()">Reject</button>
            <button class="btn btn-success" onclick="approveWithdrawal()">Approve</button>
        </div>
    </div>
</div>

<script>
function viewDetails(id) {
    document.getElementById('modalRequestId').textContent = '#' + id;
    document.getElementById('modalUser').textContent = 'Mike Chen (mike.chen@example.com)';
    document.getElementById('modalAmount').textContent = '$1,200.00';
    document.getElementById('modalMethod').textContent = 'Bank Transfer';
    document.getElementById('modalDetails').innerHTML = '<strong>Account:</strong> 1234567890<br><strong>Bank:</strong> Chase Bank<br><strong>Name:</strong> Mike Chen';
    openModal('detailsModal');
}

function approveWithdrawal(id) {
    if (confirm('Are you sure you want to approve this withdrawal request?')) {
        showNotification('Processing approval...', 'info');
        setTimeout(function() {
            showNotification('Withdrawal approved successfully!', 'success');
            closeModal('detailsModal');
        }, 1500);
    }
}

function rejectWithdrawal(id) {
    if (confirm('Are you sure you want to reject this withdrawal request?')) {
        showNotification('Processing rejection...', 'info');
        setTimeout(function() {
            showNotification('Withdrawal rejected.', 'danger');
            closeModal('detailsModal');
        }, 1500);
    }
}
</script>

<?php include '../includes/footer.php'; ?>
