<?php 
$page_title = "Transaction History";
include '../includes/header-admin.php'; 


$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";

$conn = mysqli_connect($servername, $username, $password, $database);
    //  $userid = $_SESSION['user_id']; 

$sql="SELECT * from transactionhistory  ORDER BY transact_date ASC ";
  $run= mysqli_query($conn,$sql);
  






?>
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
    
