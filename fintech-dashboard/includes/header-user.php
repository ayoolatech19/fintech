<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Dashboard'; ?> - FinTech Pro</title>
    
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
                        <p>User Portal</p>
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
                            <a href="wallet.php" class="nav-link">
                                <i class="nav-icon fas fa-wallet"></i>
                                <span>My Wallet</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="transactions.php" class="nav-link">
                                <i class="nav-icon fas fa-exchange-alt"></i>
                                <span>Transactions</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Payments -->
                <div class="nav-section">
                    <h3 class="nav-section-title">Payments</h3>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="deposit.php" class="nav-link">
                                <i class="nav-icon fas fa-plus-circle"></i>
                                <span>Deposit Funds</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="transfer.php" class="nav-link">
                                <i class="nav-icon fas fa-paper-plane"></i>
                                <span>Transfer Money</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="withdraw.php" class="nav-link">
                                <i class="nav-icon fas fa-money-bill-wave"></i>
                                <span>Withdraw</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Account -->
                <div class="nav-section">
                    <h3 class="nav-section-title">Account</h3>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="profile.php" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="notifications.php" class="nav-link">
                                <i class="nav-icon fas fa-bell"></i>
                                <span>Notifications</span>
                                <span class="nav-badge">3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="settings.php" class="nav-link">
                                <i class="nav-icon fas fa-cog"></i>
                                <span>Settings</span>
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
                    <h1 class="page-title"><?php echo $page_title ?? 'Dashboard'; ?></h1>
                </div>
                
                <div class="header-right">
                    <!-- Search Box -->
                    <div class="search-box">
                        <input type="text" placeholder="Search transactions, users...">
                        <i class="fas fa-search search-icon"></i>
                    </div>
                    
                    <!-- Theme Toggle -->
                    <button class="theme-toggle" id="themeToggle">
                        🌙
                    </button>
                    
                    <!-- Notifications -->
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </button>
                    
                    <!-- User Profile -->
                    <div class="user-profile">
                    <div class="user-avatar">
    <?php
        $name = $_SESSION['user_name'];
        $words = explode(" ", $name);

        $initials = "";

        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper($word[0]);
            }
        }

        echo $initials;
    ?>
</div>

                        <div class="user-info">
                            <h4> <?php echo $_SESSION['user_name']; ?></h4>
                            <p>User</p>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Content Area -->
            <div class="content-area">
