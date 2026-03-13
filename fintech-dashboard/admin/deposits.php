<?php 
$page_title = "Transaction History";
include '../includes/header-admin.php'; 


$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";

$conn = mysqli_connect($servername, $username, $password, $database);
    //  $userid = $_SESSION['user_id']; 

$sql = "SELECT *,
        (SELECT fullname FROM signup WHERE signup.id = deposit.user_id) AS name
        FROM deposit";

$result = mysqli_query($conn, $sql);






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
                    <th>Depositor name</th>
                    <th>Deposit method</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php  

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

        if ($row['status'] == 'completed') {
            $statusClass = 'badge-success';
        } elseif ($row['status'] == 'pending') {
            $statusClass = 'badge-warning';
        } else {
            $statusClass = 'badge-danger';
        }

        echo "<tr>
                <td>".$row['name']."</td>
                <td>".$row['deposit_meth']."</td>
                <td><strong>₦".$row['amount']."</strong></td>
                <td>".$row['description']."</td>
                <td>
                    <span class='badge $statusClass'>
                        ".$row['status']."
                    </span>
                </td>
                <td>".$row['deposited_at']."</td>
                <td>
                    <button class='btn btn-sm btn-secondary'>
                        <i class='fas fa-eye'></i>
                    </button>
                </td>
              </tr>";
    }
}

?>
</tbody>
            </tbody>
        </table>
    </div>
    
