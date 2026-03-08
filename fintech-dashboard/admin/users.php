<?php 
$page_title = "Manage Users";
include '../includes/header-admin.php'; 



$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";

$conn = mysqli_connect($servername, $username, $password, $database);
    //  $userid = $_SESSION['user_id']; 



    
$sqli = "SELECT COUNT(id) AS total_users 
        FROM signup 
        WHERE role = 'user'";

$results = mysqli_query($conn, $sqli);
$rows = mysqli_fetch_assoc($results);



$sql = "SELECT * 
        FROM signup 
        WHERE role = 'user'";

$result = mysqli_query($conn, $sql);
// $rows = mysqli_fetch_assoc($result);

?>

<!-- Stats -->
<div class="grid grid-4 mb-4">
    <div class="card">
        <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Total users</h4>
        <h3 style="font-size: 24px; font-weight: 700;"><?php echo $rows ['total_users']; ?></h3>
    </div>
    
    <div class="card">
        <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Active Users</h4>
        <h3 style="font-size: 24px; font-weight: 700; color: var(--success);">1,185</h3>
    </div>
    
    <div class="card">
        <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Suspended</h4>
        <h3 style="font-size: 24px; font-weight: 700; color: var(--warning);">48</h3>
    </div>
    
    <div class="card">
        <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">New Today</h4>
        <h3 style="font-size: 24px; font-weight: 700; color: var(--info);">15</h3>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div style="display: flex; gap: 16px; flex-wrap: wrap; align-items: flex-end;">
        <div style="flex: 1; min-width: 200px;">
            <label class="form-label">Search Users</label>
            <input type="text" class="form-control" placeholder="Search by name, email, or ID">
        </div>
        
        <div style="flex: 1; min-width: 150px;">
            <label class="form-label">Status</label>
            <select class="form-control">
                <option value="all">All Status</option>
                <option value="active">Active</option>
                <option value="suspended">Suspended</option>
                <option value="banned">Banned</option>
            </select>
        </div>
        
        <div style="flex: 1; min-width: 150px;">
            <label class="form-label">Date Joined</label>
            <select class="form-control">
                <option value="all">All Time</option>
                <option value="today">Today</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
            </select>
        </div>
        
        <button class="btn btn-primary">
            <i class="fas fa-filter"></i> Apply
        </button>
        
        <button class="btn btn-success">
            <i class="fas fa-user-plus"></i> Add User
        </button>
    </div>
</div>

<!-- Users Table -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Users</h3>
        <div style="display: flex; gap: 8px;">
            <button class="btn btn-secondary btn-sm">
                <i class="fas fa-download"></i> Export
            </button>
        </div>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Balance</th>
                    <th>Status</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 

if (mysqli_num_rows($result) > 0) {
   while ($row = mysqli_fetch_assoc($result)) {

      $fullname = $row['fullname'];
      $userid = $row['id'];
      $email = $row['email'];
      $phone = $row['phone'];

     $walletsql = "SELECT * FROM wallet WHERE user_id='$userid'";
      $walletrun = mysqli_query($conn,$walletsql);
      $walletrow = mysqli_fetch_assoc($walletrun);

      $balance = $walletrow['wallet_balance'];
      $creation = $walletrow['created_at'];


      echo "

<tr>
<td>
<div style='display: flex; gap: 12px; align-items: center;'>
<div style='width: 36px; height: 36px; background: linear-gradient(135deg, #a8edea, #fed6e3); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #333; font-weight: 600; font-size: 14px;'>
RB
</div>
<div>
<strong style='font-size: 14px;'>$fullname</strong>
<p style='font-size: 12px; color: var(--text-tertiary); margin-top: 2px;'>USER-006</p>
</div>
</div>
</td>

<td>$email</td>
<td>$phone</td>
<td><strong> $balance </strong></td>
<td><span class='badge badge-success'>Active</span></td>
<td>$creation</td>

<td>
<div style='display: flex; gap: 8px;'>
<button class='btn btn-sm btn-secondary'>
<i class='fas fa-eye'></i>
</button>

<button class='btn btn-sm btn-secondary'>
<i class='fas fa-edit'></i>
</button>

<button class='btn btn-sm btn-warning'>
<i class='fas fa-ban'></i>
</button>
</div>
</td>

</tr>

      ";
   }
}
?>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px 24px; border-top: 1px solid var(--border-color);">
        <p style="font-size: 14px; color: var(--text-tertiary);">Showing 1 to 6 of 1,248 users</p>
        <div style="display: flex; gap: 8px;">
            <button class="btn btn-sm btn-secondary" disabled>Previous</button>
            <button class="btn btn-sm btn-primary">1</button>
            <button class="btn btn-sm btn-secondary">2</button>
            <button class="btn btn-sm btn-secondary">3</button>
            <button class="btn btn-sm btn-secondary">...</button>
            <button class="btn btn-sm btn-secondary">208</button>
            <button class="btn btn-sm btn-secondary">Next</button>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
