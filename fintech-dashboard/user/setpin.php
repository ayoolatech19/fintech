<?php 
$page_title = "Set Pin";
include '../includes/header-user.php'; 

$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";

$conn = mysqli_connect($servername, $username, $password, $database);


?>


<div class="grid grid-2">
    <!-- Profile Information -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Set Pin</h3>
        </div>
        
        <form id="profileForm" method="post">
            <div class="form-group">
                <label class="form-label">  Current pin</label>
                <input type="text" name="fullname" class="form-control"  required>
            </div>
            
            <div class="form-group">
                <label class="form-label">New pin</label>
                <input type="email" name="email" class="form-control" required>
            </div>
               <div class="form-group">
                <label class="form-label">Confirm pin</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary w-full">
                <i class="fas fa-save"></i> Update Pin
            </button>
        </form>

<?php include '../includes/footer.php'; ?>
