<?php 
$page_title = "Set Pin";
include '../includes/header-user.php'; 

$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";

$conn = mysqli_connect($servername, $username, $password, $database);


if (isset($_POST['update'])) {

    $dcurrentpin = $_POST['currentpin'];
    $newpin = $_POST['newpin'];
    $confirm = $_POST['confirmpin'];
      $user_id =   $_SESSION['user_id'];


 $pincon = "SELECT pin from signup where id = '$user_id'";
    $pinresult = mysqli_query($conn, $pincon);
    $pinfetch =mysqli_fetch_assoc($pinresult);
        $currentpin = $pinfetch['pin'];

       if ($dcurrentpin != $currentpin ) {
        echo " incorrect current pin ";
       exit();
       }

              if ($newpin != $confirm ) {
        echo " New pin does not match with confirm pin ";
       exit();
       }



    $sqli= "UPDATE signup SET pin = '$newpin' Where id='$user_id'";
    if ( mysqli_query($conn, $sqli))
       {
        echo "Pin updated successfully";
    } else {
      echo "Pin update not  successful";
       }  
}
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
                <input type="text" name="currentpin" class="form-control"  required>
            </div>
            
            <div class="form-group">
                <label class="form-label">New pin</label>
                <input type="text" name="newpin" class="form-control" required>
            </div>
               <div class="form-group">
                <label class="form-label">Confirm pin</label>
                <input type="text" name="confirmpin" class="form-control" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary w-full">
                <i class="fas fa-save"></i> Update Pin
            </button>
        </form>

<?php include '../includes/footer.php'; ?>
