<?php 
$page_title = "Notifications";
include '../includes/header-user.php'; 
?>

<!-- Header Actions -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
    <div>
        <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 4px;">Notifications</h2>
        <p style="color: var(--text-tertiary);">Stay updated with your account activity</p>
    </div>
    <button class="btn btn-secondary">
        <i class="fas fa-check-double"></i> Mark All as Read
    </button>
</div>

<!-- Notification Filters -->
<div class="card mb-4">
    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
        <button class="btn btn-primary btn-sm">All</button>
        <button class="btn btn-secondary btn-sm">Transactions</button>
        <button class="btn btn-secondary btn-sm">Account</button>
        <button class="btn btn-secondary btn-sm">Security</button>
        <button class="btn btn-secondary btn-sm">System</button>
    </div>
</div>

<!-- Notifications List -->
<div class="card">
    <!-- Unread Notifications -->
    <div style="padding: 16px 24px; background-color: var(--bg-secondary); border-bottom: 1px solid var(--border-color);">
        <h3 style="font-size: 14px; font-weight: 600; color: var(--text-secondary);">NEW</h3>
    </div>
    
    <div style="display: flex; flex-direction: column;">
        <!-- Notification Item -->
        <div style="display: flex; gap: 16px; padding: 20px 24px; border-bottom: 1px solid var(--border-color); background-color: rgba(37, 99, 235, 0.05);">
            <div style="width: 48px; height: 48px; background: rgba(37, 99, 235, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary-blue); flex-shrink: 0;">
                <i class="fas fa-check-circle" style="font-size: 20px;"></i>
            </div>
            <div style="flex: 1;">
                <h4 style="font-size: 15px; font-weight: 600; margin-bottom: 4px;">Deposit Successful</h4>
                <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Your deposit of $2,500.00 has been processed successfully and credited to your wallet.</p>
                <div style="display: flex; gap: 16px; font-size: 13px; color: var(--text-tertiary);">
                    <span><i class="fas fa-clock"></i> 2 hours ago</span>
                    <span><i class="fas fa-tag"></i> Transaction</span>
                </div>
            </div>
            <button class="btn btn-sm btn-secondary" style="align-self: flex-start;">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <!-- Notification Item -->
        <div style="display: flex; gap: 16px; padding: 20px 24px; border-bottom: 1px solid var(--border-color); background-color: rgba(37, 99, 235, 0.05);">
            <div style="width: 48px; height: 48px; background: rgba(245, 158, 11, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--warning); flex-shrink: 0;">
                <i class="fas fa-exclamation-triangle" style="font-size: 20px;"></i>
            </div>
            <div style="flex: 1;">
                <h4 style="font-size: 15px; font-weight: 600; margin-bottom: 4px;">Withdrawal Pending Review</h4>
                <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Your withdrawal request of $1,200.00 is being reviewed by our team.</p>
                <div style="display: flex; gap: 16px; font-size: 13px; color: var(--text-tertiary);">
                    <span><i class="fas fa-clock"></i> 5 hours ago</span>
                    <span><i class="fas fa-tag"></i> Transaction</span>
                </div>
            </div>
            <button class="btn btn-sm btn-secondary" style="align-self: flex-start;">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <!-- Notification Item -->
        <div style="display: flex; gap: 16px; padding: 20px 24px; border-bottom: 1px solid var(--border-color); background-color: rgba(37, 99, 235, 0.05);">
            <div style="width: 48px; height: 48px; background: rgba(16, 185, 129, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--success); flex-shrink: 0;">
                <i class="fas fa-shield-alt" style="font-size: 20px;"></i>
            </div>
            <div style="flex: 1;">
                <h4 style="font-size: 15px; font-weight: 600; margin-bottom: 4px;">Security Alert</h4>
                <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">New login from Chrome on Windows. If this wasn't you, please secure your account.</p>
                <div style="display: flex; gap: 16px; font-size: 13px; color: var(--text-tertiary);">
                    <span><i class="fas fa-clock"></i> 1 day ago</span>
                    <span><i class="fas fa-tag"></i> Security</span>
                </div>
            </div>
            <button class="btn btn-sm btn-secondary" style="align-self: flex-start;">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    
    <!-- Earlier Notifications -->
    <div style="padding: 16px 24px; background-color: var(--bg-secondary); border-bottom: 1px solid var(--border-color);">
        <h3 style="font-size: 14px; font-weight: 600; color: var(--text-secondary);">EARLIER</h3>
    </div>
    
    <div style="display: flex; flex-direction: column;">
        <!-- Read Notification -->
        <div style="display: flex; gap: 16px; padding: 20px 24px; border-bottom: 1px solid var(--border-color); opacity: 0.7;">
            <div style="width: 48px; height: 48px; background: rgba(37, 99, 235, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary-blue); flex-shrink: 0;">
                <i class="fas fa-user" style="font-size: 20px;"></i>
            </div>
            <div style="flex: 1;">
                <h4 style="font-size: 15px; font-weight: 600; margin-bottom: 4px;">Profile Updated</h4>
                <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Your profile information has been successfully updated.</p>
                <div style="display: flex; gap: 16px; font-size: 13px; color: var(--text-tertiary);">
                    <span><i class="fas fa-clock"></i> 3 days ago</span>
                    <span><i class="fas fa-tag"></i> Account</span>
                </div>
            </div>
        </div>
        
        <div style="display: flex; gap: 16px; padding: 20px 24px; border-bottom: 1px solid var(--border-color); opacity: 0.7;">
            <div style="width: 48px; height: 48px; background: rgba(37, 99, 235, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary-blue); flex-shrink: 0;">
                <i class="fas fa-bell" style="font-size: 20px;"></i>
            </div>
            <div style="flex: 1;">
                <h4 style="font-size: 15px; font-weight: 600; margin-bottom: 4px;">New Feature Available</h4>
                <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Check out our new instant transfer feature for faster transactions.</p>
                <div style="display: flex; gap: 16px; font-size: 13px; color: var(--text-tertiary);">
                    <span><i class="fas fa-clock"></i> 5 days ago</span>
                    <span><i class="fas fa-tag"></i> System</span>
                </div>
            </div>
        </div>
        
        <div style="display: flex; gap: 16px; padding: 20px 24px; border-bottom: 1px solid var(--border-color); opacity: 0.7;">
            <div style="width: 48px; height: 48px; background: rgba(16, 185, 129, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--success); flex-shrink: 0;">
                <i class="fas fa-check-circle" style="font-size: 20px;"></i>
            </div>
            <div style="flex: 1;">
                <h4 style="font-size: 15px; font-weight: 600; margin-bottom: 4px;">Transfer Completed</h4>
                <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Your transfer of $850.00 to Alex Johnson was successful.</p>
                <div style="display: flex; gap: 16px; font-size: 13px; color: var(--text-tertiary);">
                    <span><i class="fas fa-clock"></i> 1 week ago</span>
                    <span><i class="fas fa-tag"></i> Transaction</span>
                </div>
            </div>
        </div>
        
        <div style="display: flex; gap: 16px; padding: 20px 24px; opacity: 0.7;">
            <div style="width: 48px; height: 48px; background: rgba(37, 99, 235, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary-blue); flex-shrink: 0;">
                <i class="fas fa-user-plus" style="font-size: 20px;"></i>
            </div>
            <div style="flex: 1;">
                <h4 style="font-size: 15px; font-weight: 600; margin-bottom: 4px;">Welcome to FinTech Pro!</h4>
                <p style="font-size: 14px; color: var(--text-secondary); margin-bottom: 8px;">Your account has been created successfully. Start managing your finances today.</p>
                <div style="display: flex; gap: 16px; font-size: 13px; color: var(--text-tertiary);">
                    <span><i class="fas fa-clock"></i> 2 weeks ago</span>
                    <span><i class="fas fa-tag"></i> Account</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
