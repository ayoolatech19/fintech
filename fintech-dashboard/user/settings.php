<?php 
$page_title = "Settings";
include '../includes/header-user.php'; 
?>

<div class="grid grid-2">
    <!-- General Settings -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">General Settings</h3>
        </div>
        
        <form>
            <div class="form-group">
                <label class="form-label">Language</label>
                <select class="form-control">
                    <option>English (US)</option>
                    <option>English (UK)</option>
                    <option>Spanish</option>
                    <option>French</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Timezone</label>
                <select class="form-control">
                    <option>UTC-05:00 (Eastern Time)</option>
                    <option>UTC-08:00 (Pacific Time)</option>
                    <option>UTC+00:00 (GMT)</option>
                    <option>UTC+01:00 (CET)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label class="form-label">Currency</label>
                <select class="form-control">
                    <option>USD ($)</option>
                    <option>EUR (€)</option>
                    <option>GBP (£)</option>
                    <option>NGN (₦)</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary w-full">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </form>
    </div>
    
    <!-- Notification Preferences -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Notification Preferences</h3>
        </div>
        
        <form>
            <div style="display: flex; flex-direction: column; gap: 16px;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <strong style="font-size: 14px;">Email Notifications</strong>
                        <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Receive notifications via email</p>
                    </div>
                    <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                        <input type="checkbox" checked style="opacity: 0; width: 0; height: 0;">
                        <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: var(--primary-blue); border-radius: 26px; transition: 0.3s;"></span>
                    </label>
                </div>
                
                <div style="height: 1px; background-color: var(--border-color);"></div>
                
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <strong style="font-size: 14px;">SMS Notifications</strong>
                        <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Receive notifications via SMS</p>
                    </div>
                    <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                        <input type="checkbox" style="opacity: 0; width: 0; height: 0;">
                        <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: var(--border-color); border-radius: 26px; transition: 0.3s;"></span>
                    </label>
                </div>
                
                <div style="height: 1px; background-color: var(--border-color);"></div>
                
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <strong style="font-size: 14px;">Transaction Alerts</strong>
                        <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Get notified of all transactions</p>
                    </div>
                    <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                        <input type="checkbox" checked style="opacity: 0; width: 0; height: 0;">
                        <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: var(--primary-blue); border-radius: 26px; transition: 0.3s;"></span>
                    </label>
                </div>
                
                <div style="height: 1px; background-color: var(--border-color);"></div>
                
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <strong style="font-size: 14px;">Security Alerts</strong>
                        <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Important security notifications</p>
                    </div>
                    <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                        <input type="checkbox" checked style="opacity: 0; width: 0; height: 0;">
                        <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: var(--primary-blue); border-radius: 26px; transition: 0.3s;"></span>
                    </label>
                </div>
                
                <div style="height: 1px; background-color: var(--border-color);"></div>
                
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <strong style="font-size: 14px;">Marketing Emails</strong>
                        <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Receive updates and promotions</p>
                    </div>
                    <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                        <input type="checkbox" style="opacity: 0; width: 0; height: 0;">
                        <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: var(--border-color); border-radius: 26px; transition: 0.3s;"></span>
                    </label>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Privacy Settings -->
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Privacy Settings</h3>
    </div>
    <div style="display: flex; flex-direction: column; gap: 16px;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <strong style="font-size: 14px;">Profile Visibility</strong>
                <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Make your profile visible to other users</p>
            </div>
            <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                <input type="checkbox" checked style="opacity: 0; width: 0; height: 0;">
                <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: var(--primary-blue); border-radius: 26px; transition: 0.3s;"></span>
            </label>
        </div>
        
        <div style="height: 1px; background-color: var(--border-color);"></div>
        
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <strong style="font-size: 14px;">Activity Status</strong>
                <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">Show when you're online</p>
            </div>
            <label style="position: relative; display: inline-block; width: 50px; height: 26px;">
                <input type="checkbox" checked style="opacity: 0; width: 0; height: 0;">
                <span style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: var(--primary-blue); border-radius: 26px; transition: 0.3s;"></span>
            </label>
        </div>
    </div>
</div>

<!-- Session Management -->
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">Active Sessions</h3>
    </div>
    <div style="display: flex; flex-direction: column; gap: 12px;">
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
            <div style="display: flex; gap: 12px; align-items: center;">
                <i class="fas fa-desktop" style="font-size: 24px; color: var(--primary-blue);"></i>
                <div>
                    <strong style="font-size: 14px;">Chrome on Windows</strong>
                    <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">New York, USA • Active now</p>
                </div>
            </div>
            <span class="badge badge-success">Current</span>
        </div>
        
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
            <div style="display: flex; gap: 12px; align-items: center;">
                <i class="fas fa-mobile-alt" style="font-size: 24px; color: var(--primary-blue);"></i>
                <div>
                    <strong style="font-size: 14px;">Safari on iPhone</strong>
                    <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">New York, USA • 2 hours ago</p>
                </div>
            </div>
            <button class="btn btn-danger btn-sm">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </div>
    </div>
    
    <button class="btn btn-danger w-full mt-3">
        <i class="fas fa-sign-out-alt"></i> Logout All Other Sessions
    </button>
</div>

<?php include '../includes/footer.php'; ?>
