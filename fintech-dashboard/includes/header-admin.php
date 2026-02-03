<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Admin Dashboard'; ?> - FinTech Pro Admin</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <div class="logo-icon">FP</div>
                    <div class="logo-text">
                        <h2>FinTech Pro</h2>
                        <p>Admin Panel</p>
                    </div>
                </div>
            </div>
            
            <nav class="sidebar-nav">
                <!-- Main Menu -->
                <div class="nav-section">
                    <h3 class="nav-section-title">Main Menu</h3>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="users.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <span>Manage Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="transactions.php" class="nav-link">
                                <i class="nav-icon fas fa-exchange-alt"></i>
                                <span>All Transactions</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Management -->
                <div class="nav-section">
                    <h3 class="nav-section-title">Management</h3>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="withdrawals.php" class="nav-link">
                                <i class="nav-icon fas fa-money-check-alt"></i>
                                <span>Withdrawal Requests</span>
                                <span class="nav-badge">5</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="deposits.php" class="nav-link">
                                <i class="nav-icon fas fa-coins"></i>
                                <span>Deposit History</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reports.php" class="nav-link">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <span>Reports & Analytics</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- System -->
                <div class="nav-section">
                    <h3 class="nav-section-title">System</h3>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="settings.php" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="activity-log.php" class="nav-link">
                                <i class="nav-icon fas fa-history"></i>
                                <span>Activity Log</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <button class="menu-toggle" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="page-title"><?php echo $page_title ?? 'Admin Dashboard'; ?></h1>
                </div>
                
                <div class="header-right">
                    <!-- Search Box -->
                    <div class="search-box">
                        <input type="text" placeholder="Search users, transactions...">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                    
                    <!-- Theme Toggle -->
                    <button class="theme-toggle" id="themeToggle">
                        🌙
                    </button>
                    
                    <!-- Notifications -->
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">5</span>
                    </button>
                    
                    <!-- User Profile -->
                    <div class="user-profile">
                        <div class="user-avatar">AD</div>
                        <div class="user-info">
                            <h4>Admin User</h4>
                            <p>Administrator</p>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Content Area -->
            <div class="content-area">
