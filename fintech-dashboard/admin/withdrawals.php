<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";

$conn = mysqli_connect($servername, $username, $password, $database);


if(isset($_POST['approve'])){

$withdraw_id = $_POST['withdraw_id'];

$get = mysqli_query($conn,"SELECT * FROM withdraw WHERE id='$withdraw_id'");
$row = mysqli_fetch_assoc($get);

$user = $row['user_id'];
$amount = $row['amount'];

mysqli_query($conn,"
UPDATE wallet 
SET wallet_balance = wallet_balance - '$amount'
WHERE user_id='$user'
");

mysqli_query($conn,"
UPDATE withdraw 
SET status='approved'
WHERE id='$withdraw_id'
");

}

if(isset($_POST['reject'])){

$withdraw_id = $_POST['withdraw_id'];

mysqli_query($conn,"
UPDATE withdraw 
SET status='rejected'
WHERE id='$withdraw_id'
");

}


$page_title = "Withdrawal Requests";
include '../includes/header-admin.php';



$sql = "SELECT COUNT(*) AS total_pending 
        FROM withdraw 
        WHERE status = 'pending'";

$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);



$sqlw = "SELECT SUM(amount) AS totalamountpending 
        FROM withdraw 
        WHERE status='pending'";

$resultw = mysqli_query($conn, $sqlw);
$roww = mysqli_fetch_assoc($resultw);

$totalamountpending = $roww['totalamountpending'];

$sqli="SELECT withdraw.*, signup.fullname
FROM withdraw
JOIN signup ON signup.id = withdraw.user_id";
$run= mysqli_query($conn,$sqli);

?>

<div class="alert alert-warning mb-4">
<i class="fas fa-exclamation-triangle"></i>
<span>You have <?php echo $rows['total_pending']; ?> pending withdrawal requests.</span>
</div>


<div class="grid grid-4 mb-4">

<div class="card">
<h4 style="font-size:13px;">Pending Requests</h4>
<h3 style="font-size:24px;color:orange;">
<?php echo $rows['total_pending']; ?>
</h3>
</div>

<div class="card">
<h4 style="font-size:13px;">Total Amount Pending</h4>
<h3 style="font-size:24px;">
$<?php echo $totalamountpending ?>
</h3>
</div>

</div>


<!-- Withdrawal Table -->
<div class="card">

<div class="card-header">
<h3 class="card-title">Withdrawal Requests</h3>
</div>

<div class="table-container">

<table class="table">

<thead>
<tr>
<th>Request ID</th>
<th>User</th>
<th>Amount</th>
<th>Method</th>
<th>Requested</th>
<th>Status</th>
<th>Actions</th>
</tr>
</thead>

<tbody>

<?php

if(mysqli_num_rows($run) > 0){

while($row = mysqli_fetch_assoc($run)){

echo "<tr>

<td><strong>#WD-00".$row['id']."</strong></td>

<td>".$row['user_id']."</td>

<td><strong>$".$row['amount']."</strong></td>

<td>".$row['method']."</td>

<td>".$row['withdraw_at']."</td>

<td>
<span class='badge badge-warning'>".$row['status']. "</span>
</td>

<td>";

if($row['status'] == 'pending'){

echo "
<form method='POST' style='display:flex;gap:8px;'>

<input type='hidden' name='withdraw_id' value='".$row['id']."'>


<button type='submit' name='approve' class='btn btn-sm btn-success'>
<i class='fas fa-check'></i>
</button>


<button type='submit' name='reject' class='btn btn-sm btn-danger'>
<i class='fas fa-times'></i>
</button>

</form>
";

}else{

echo "<span style='color:gray;'>Processed</span>";

}

echo "</td>
</tr>";

}

}

?>

</tbody>

</table>

</div>

</div>


<?php include '../includes/footer.php'; ?>