<?php 
$page_title = "My Profile";
include '../includes/header-user.php'; 
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
        
        <form id="profileForm" onsubmit="return handleProfileUpdate(event)">
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" value="John Doe" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" value="john.doe@example.com" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Phone Number</label>
                <input type="tel" class="form-control" value="+1 234 567 8900" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Date of Birth</label>
                <input type="date" class="form-control" value="1990-01-15" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Address</label>
                <textarea class="form-control" required>123 Main Street, New York, NY 10001, USA</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary w-full">
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
            <form id="passwordForm" onsubmit="return handlePasswordChange(event)">
                <div class="form-group">
                    <label class="form-label">Current Password</label>
                    <input type="password" class="form-control" placeholder="Enter current password" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control" placeholder="Enter new password" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control" placeholder="Confirm new password" required>
                </div>
                
                <button type="submit" class="btn btn-primary w-full">
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
