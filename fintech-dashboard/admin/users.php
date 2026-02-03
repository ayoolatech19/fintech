<?php 
$page_title = "Manage Users";
include '../includes/header-admin.php'; 
?>

<!-- Stats -->
<div class="grid grid-4 mb-4">
    <div class="card">
        <h4 style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 8px;">Total Users</h4>
        <h3 style="font-size: 24px; font-weight: 700;">1,248</h3>
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
                <tr>
                    <td>
                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 14px;">
                                JD
                            </div>
                            <div>
                                <strong style="font-size: 14px;">John Doe</strong>
                                <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">USER-001</p>
                            </div>
                        </div>
                    </td>
                    <td>john.doe@example.com</td>
                    <td>+1 234 567 8900</td>
                    <td><strong>$24,580.00</strong></td>
                    <td><span class="badge badge-success">Active</span></td>
                    <td>Jan 15, 2024</td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            <button class="btn btn-sm btn-secondary" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-secondary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-warning" title="Suspend">
                                <i class="fas fa-ban"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #f093fb, #f5576c); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 14px;">
                                SW
                            </div>
                            <div>
                                <strong style="font-size: 14px;">Sarah Williams</strong>
                                <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">USER-002</p>
                            </div>
                        </div>
                    </td>
                    <td>sarah.w@example.com</td>
                    <td>+1 234 567 8901</td>
                    <td><strong>$18,240.00</strong></td>
                    <td><span class="badge badge-success">Active</span></td>
                    <td>Jan 18, 2024</td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            <button class="btn btn-sm btn-secondary" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-secondary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-warning" title="Suspend">
                                <i class="fas fa-ban"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #4facfe, #00f2fe); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 14px;">
                                MC
                            </div>
                            <div>
                                <strong style="font-size: 14px;">Mike Chen</strong>
                                <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">USER-003</p>
                            </div>
                        </div>
                    </td>
                    <td>mike.chen@example.com</td>
                    <td>+1 234 567 8902</td>
                    <td><strong>$32,150.00</strong></td>
                    <td><span class="badge badge-warning">Suspended</span></td>
                    <td>Jan 22, 2024</td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            <button class="btn btn-sm btn-secondary" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-secondary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-success" title="Activate">
                                <i class="fas fa-check"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #fa709a, #fee140); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 14px;">
                                AJ
                            </div>
                            <div>
                                <strong style="font-size: 14px;">Alex Johnson</strong>
                                <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">USER-004</p>
                            </div>
                        </div>
                    </td>
                    <td>alex.j@example.com</td>
                    <td>+1 234 567 8903</td>
                    <td><strong>$45,890.00</strong></td>
                    <td><span class="badge badge-success">Active</span></td>
                    <td>Jan 25, 2024</td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            <button class="btn btn-sm btn-secondary" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-secondary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-warning" title="Suspend">
                                <i class="fas fa-ban"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #30cfd0, #330867); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; font-size: 14px;">
                                ED
                            </div>
                            <div>
                                <strong style="font-size: 14px;">Emily Davis</strong>
                                <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">USER-005</p>
                            </div>
                        </div>
                    </td>
                    <td>emily.d@example.com</td>
                    <td>+1 234 567 8904</td>
                    <td><strong>$12,340.00</strong></td>
                    <td><span class="badge badge-success">Active</span></td>
                    <td>Jan 28, 2024</td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            <button class="btn btn-sm btn-secondary" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-secondary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-warning" title="Suspend">
                                <i class="fas fa-ban"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex; gap: 12px; align-items: center;">
                            <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #a8edea, #fed6e3); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #333; font-weight: 600; font-size: 14px;">
                                RB
                            </div>
                            <div>
                                <strong style="font-size: 14px;">Robert Brown</strong>
                                <p style="font-size: 12px; color: var(--text-tertiary); margin-top: 2px;">USER-006</p>
                            </div>
                        </div>
                    </td>
                    <td>robert.b@example.com</td>
                    <td>+1 234 567 8905</td>
                    <td><strong>$28,750.00</strong></td>
                    <td><span class="badge badge-success">Active</span></td>
                    <td>Feb 01, 2024</td>
                    <td>
                        <div style="display: flex; gap: 8px;">
                            <button class="btn btn-sm btn-secondary" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-secondary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-warning" title="Suspend">
                                <i class="fas fa-ban"></i>
                            </button>
                        </div>
                    </td>
                </tr>
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
