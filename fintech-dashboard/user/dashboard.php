<?php 
$page_title = "Dashboard";
include '../includes/header-user.php'; 

$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";
$conn = mysqli_connect($servername, $username, $password, $database);
$userid = $_SESSION['user_id']; 

$sql = "SELECT * FROM wallet 
            WHERE user_id = '$userid'  
            ";
 $result = mysqli_query($conn, $sql);
 $user = mysqli_fetch_assoc($result);



 $sqli = "SELECT SUM(amount) AS total 
        FROM transfers 
        WHERE recipient_id = '$userid'";

$results = mysqli_query($conn, $sqli);
$rows = mysqli_fetch_assoc($results);

$totalincomes = $rows['total'];


 $sqls = "SELECT *  
        FROM transfers 
        WHERE recipient_id = '$userid' || user_id = '$userid'";

$resultss = mysqli_query($conn, $sqls);
$rowss = mysqli_num_rows($resultss);




 $sqlw = "SELECT SUM(amount) AS totalwithdraw 
        FROM withdraw 
        WHERE user_id = '$userid'";

$resultw = mysqli_query($conn, $sqlw);
$roww = mysqli_fetch_assoc($resultw);

$totalwithdraw = $roww['totalwithdraw'];



// $sqls = "SELECT * 
//          FROM transfers 
//          WHERE recipient_id = '$userid' 
//          OR user_id = '$userid'";

// $resultss = mysqli_query($conn, $sqls);
// $rowss = mysqli_num_rows($resultss);

// echo $rowss;


?>

<!-- Stats Cards -->
<div class="grid grid-4 mb-4">
    <!-- Balance Card -->
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon blue">
                <i class="fas fa-wallet"></i>
            </div>
            <span class="stat-change up">
                <i class="fas fa-arrow-up"></i> 12.5%
            </span>
        </div>
        <div class="stat-body">
            <h3>$<?php echo $user['wallet_balance']; ?></h3>
            <p>Total Balance</p>
        </div>
    </div>
    
    <!-- Income Card -->
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon green">
                <i class="fas fa-arrow-down"></i>
            </div>
            <span class="stat-change up">
                <i class="fas fa-arrow-up"></i> 8.2%
            </span>
        </div>
        <div class="stat-body">
            <h3>$<?php echo $totalincomes ; ?></h3>
            <p>Total Income</p>
        </div>
    </div>
    
    <!-- Expenses Card -->
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon orange">
                <i class="fas fa-arrow-up"></i>
            </div>
            <span class="stat-change down">
                <i class="fas fa-arrow-down"></i> 3.1%
            </span>
        </div>
        <div class="stat-body">
            <h3>$<?php echo $totalwithdraw ?? 0 ?></h3>
            <p>Total withdrawals</p>
        </div>
    </div>
    
    <!-- Transactions Card -->
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon red">
                <i class="fas fa-exchange-alt"></i>
            </div>
            <span class="stat-change up">
                <i class="fas fa-arrow-up"></i> 15.3%
            </span>
        </div>
        <div class="stat-body">
            <h3><?php echo $rowss ?></h3>
            <p>Total Transactions</p>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="card mb-4">
    <div class="card-header">
        <h3 class="card-title">Quick Actions</h3>
    </div>
    <div class="grid grid-4">
        <button class="btn btn-primary" onclick="window.location.href='deposit.php'">
            <i class="fas fa-plus-circle"></i> Deposit Funds
        </button>
        <button class="btn btn-primary" onclick="window.location.href='transfer.php'">
            <i class="fas fa-paper-plane"></i> Transfer Money
        </button>
        <button class="btn btn-primary" onclick="window.location.href='withdraw.php'">
            <i class="fas fa-money-bill-wave"></i> Withdraw Funds
        </button>
        <button class="btn btn-secondary" onclick="window.location.href='transactions.php'">
            <i class="fas fa-history"></i> View History
        </button>
    </div>
</div>

<!-- Main Grid -->
<div class="grid grid-2">
    <!-- Recent Transactions -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Recent Transactions</h3>
            <a href="transactions.php" class="card-action">View All</a>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-arrow-down" style="color: var(--success);"></i>
                                <span>Deposit</span>
                            </div>
                        </td>
                        <td><strong>+$2,500.00</strong></td>
                        <td><span class="badge badge-success">Completed</span></td>
                        <td>Feb 03, 2026</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-paper-plane" style="color: var(--primary-blue);"></i>
                                <span>Transfer to Alex</span>
                            </div>
                        </td>
                        <td><strong>-$850.00</strong></td>
                        <td><span class="badge badge-success">Completed</span></td>
                        <td>Feb 02, 2026</td>
                    </tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Activity Feed -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Recent Activity</h3>
        </div>
        <div style="display: flex; flex-direction: column; gap: 16px;">
            <!-- Activity Item -->
            <div style="display: flex; gap: 12px; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                <div style="width: 40px; height: 40px; background: rgba(37, 99, 235, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary-blue);">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div style="flex: 1;">
                    <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">Transaction Successful</h4>
                    <p style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 4px;">Your deposit of $2,500 has been processed successfully</p>
                    <span style="font-size: 12px; color: var(--text-tertiary);">2 hours ago</span>
                </div>
            </div>
            
            <!-- Activity Item -->
            <div style="display: flex; gap: 12px; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                <div style="width: 40px; height: 40px; background: rgba(16, 185, 129, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--success);">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div style="flex: 1;">
                    <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">Profile Updated</h4>
                    <p style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 4px;">Your profile information has been updated</p>
                    <span style="font-size: 12px; color: var(--text-tertiary);">1 day ago</span>
                </div>
            </div>
            
            <!-- Activity Item -->
            <div style="display: flex; gap: 12px; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                <div style="width: 40px; height: 40px; background: rgba(245, 158, 11, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--warning);">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div style="flex: 1;">
                    <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">Withdrawal Pending</h4>
                    <p style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 4px;">Your withdrawal request is being reviewed</p>
                    <span style="font-size: 12px; color: var(--text-tertiary);">2 days ago</span>
                </div>
            </div>
            
            <!-- Activity Item -->
            <div style="display: flex; gap: 12px; padding: 12px; background-color: var(--bg-secondary); border-radius: 8px;">
                <div style="width: 40px; height: 40px; background: rgba(37, 99, 235, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--primary-blue);">
                    <i class="fas fa-bell"></i>
                </div>
                <div style="flex: 1;">
                    <h4 style="font-size: 14px; font-weight: 600; margin-bottom: 4px;">New Feature Available</h4>
                    <p style="font-size: 13px; color: var(--text-tertiary); margin-bottom: 4px;">Check out our new instant transfer feature</p>
                    <span style="font-size: 12px; color: var(--text-tertiary);">3 days ago</span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
