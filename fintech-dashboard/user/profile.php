<?php 
$page_title = "My Profile";
include '../includes/header-user.php'; 

$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";

$conn = mysqli_connect($servername, $username, $password, $database);


if (isset($_POST['update'])) {

$fullname=$_POST['fullname'];
$email=$_POST['email'];
$phonenumber=$_POST['phone'];

 $id =   $_SESSION['user_id'];


$sql=" UPDATE signup set fullname = ?, email =?, phone = ? where id = ?";
  $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi",
        $fullname,
        $email,
        $phonenumber,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile.";
    }

}

if (isset($_POST['change'])){
$curpassword=$_POST['cur_password'];
$newpassword=$_POST['new_password'];
$conpassword=$_POST['confirm_password'];

 $id =   $_SESSION['user_id'];



$check = "SELECT * from signup where id= '$id'";
$run = mysqli_query($conn,$check);

 $row = mysqli_fetch_assoc($run);

    $db_password = $row['passwords'];
    $fullnames = $row['fullname'];
    $emails = $row['email'];
    $phones = $row['phone'];

     if ($curpassword != $db_password) {
        echo "Current password is wrong!";
        exit();
    }


     if ($newpassword !== $conpassword) {
        echo "New passwords do not match!";
        exit();
    }

    $sql = "UPDATE signup set passwords ='$newpassword' where id= '$id'";
    $update= mysqli_query($conn, $sql);

    if ($update) {
        echo "password changed successfully!";
        }
        else {
            echo "password changed unsucessful";
        }
    }



?>


<div class="grid grid-2">
    <!-- Profile Information -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Personal Information</h3>
        </div>
        
        <!-- Profile Picture -->
        <div style="text-align: center; margin-bottom: 24px;">
            <div style="width: 100px; height: 100px; background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; color: white; font-size: 40px; font-weight: 700;">
                JD
            </div>
            <button class="btn btn-secondary btn-sm">
                <i class="fas fa-camera"></i> Change Photo
            </button>
        </div>
        
        <form id="profileForm" method="post">
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" name="fullname" class="form-control" value= "<?php echo $row['fullname'];  ?>" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" value= "<?php echo $row['email'];?>"   required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Phone Number</label>
                <input type="tel" name="phone" class="form-control" value= "<?php echo $row ['phone']; ?> "required>
            </div>
            <button type="submit" name="update" class="btn btn-primary w-full">
                <i class="fas fa-save"></i> Update Profile
            </button>
        </form>
    </div>
    
    <!-- Account Settings -->
    <div>
        <!-- Account Status -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Account Status</h3>
            </div>
            <div style="display: flex; flex-direction: column; gap: 16px;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <strong style="font-size: 14px;">Email Verification</strong>
                        <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Your email is verified</p>
                    </div>
                    <span class="badge badge-success">Verified</span>
                </div>
                
                <div style="height: 1px; background-color: var(--border-color);"></div>
                
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <strong style="font-size: 14px;">Phone Verification</strong>
                        <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Your phone is verified</p>
                    </div>
                    <span class="badge badge-success">Verified</span>
                </div>
                
                <div style="height: 1px; background-color: var(--border-color);"></div>
                
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <strong style="font-size: 14px;">KYC Status</strong>
                        <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Identity verification completed</p>
                    </div>
                    <span class="badge badge-success">Verified</span>
                </div>
                
                <div style="height: 1px; background-color: var(--border-color);"></div>
                
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <strong style="font-size: 14px;">Account Level</strong>
                        <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Premium member</p>
                    </div>
                    <span class="badge badge-info">Level 3</span>
                </div>
            </div>
        </div>
        
        <!-- Security Settings -->
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="card-title">Security</h3>
            </div>
            <form id="passwordForm" method="POST">
                <div class="form-group">
                    <label class="form-label">Current Password</label>
                    <input type="password" name="cur_password" class="form-control" placeholder="Enter current password" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">New Password</label>
                    <input type="password" name="new_password" class="form-control" placeholder="Enter new password" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm new password" required>
                </div>
                
                <button type="submit" name="change" class="btn btn-primary w-full">
                    <i class="fas fa-lock"></i> Change Password
                </button>
            </form>
        </div>
        
        <!-- Two-Factor Authentication -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Two-Factor Authentication</h3>
            </div>
            <p style="font-size: 14px; color: var(--text-tertiary); margin-bottom: 16px;">Add an extra layer of security to your account</p>
            <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                <div>
                    <strong style="font-size: 14px;">Status</strong>
                    <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">2FA is currently disabled</p>
                </div>
                <button class="btn btn-success btn-sm">
                    <i class="fas fa-shield-alt"></i> Enable 2FA
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Account Information -->
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Account Information</h3>
    </div>
    <div class="grid grid-3">
        <div>
            <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">User ID</h4>
            <p style="font-size: 14px; font-weight: 600;">USER-2024-001</p>
        </div>
        
        <div>
            <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Wallet ID</h4>
            <div style="display: flex; gap: 8px; align-items: center;">
                <p style="font-size: 14px; font-weight: 600;">FTP-2024-USER-001</p>
                <button class="btn btn-sm btn-secondary" onclick="copyToClipboard('FTP-2024-USER-001')">
                    <i class="fas fa-copy"></i>
                </button>
            </div>
        </div>
        
        <div>
            <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Member Since</h4>
            <p style="font-size: 14px; font-weight: 600;">January 15, 2024</p>
        </div>
    </div>
</div>

<!-- Danger Zone -->
<div class="card mt-4" style="border-color: var(--danger);">
    <div class="card-header">
        <h3 class="card-title" style="color: var(--danger);">Danger Zone</h3>
    </div>
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <strong style="font-size: 14px;">Delete Account</strong>
            <p style="font-size: 13px; color: var(--text-tertiary); margin-top: 4px;">Once you delete your account, there is no going back. Please be certain.</p>
        </div>
        <button class="btn btn-danger">
            <i class="fas fa-trash"></i> Delete Account
        </button>
    </div>
</div>

<script>
function handleProfileUpdate(event) {
    event.preventDefault();
    
    if (!validateForm('profileForm')) {
        showNotification('Please fill in all required fields', 'danger');
        return false;
    }
    
    showNotification('Updating profile...', 'info');
    
    setTimeout(function() {
        showNotification('Profile updated successfully!', 'success');
    }, 1500);
    
    return false;
}

function handlePasswordChange(event) {
    event.preventDefault();
    
    if (!validateForm('passwordForm')) {
        showNotification('Please fill in all required fields', 'danger');
        return false;
    }
    
    showNotification('Changing password...', 'info');
    
    setTimeout(function() {
        showNotification('Password changed successfully!', 'success');
        document.getElementById('passwordForm').reset();
    }, 1500);
    
    return false;
}
</script>

<?php include '../includes/footer.php'; ?>
