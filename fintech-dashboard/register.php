<?php 
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";

$conn = mysqli_connect($servername, $username, $password, $database);
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - FinTech Pro</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
            padding: 40px 0;
        }
        
        .auth-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }
        
        .auth-card {
            background-color: var(--bg-primary);
            border-radius: 16px;
            padding: 40px;
            box-shadow: var(--shadow-lg);
        }
        
        .auth-header {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .auth-logo {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-blue-light));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            color: white;
            font-size: 32px;
            font-weight: 700;
        }
        
        .auth-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .auth-subtitle {
            color: var(--text-tertiary);
            font-size: 14px;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 24px 0;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: var(--border-color);
        }
        
        .divider span {
            padding: 0 16px;
            color: var(--text-tertiary);
            font-size: 13px;
        }
        
        .auth-footer {
            text-align: center;
            margin-top: 24px;
            color: var(--text-tertiary);
            font-size: 14px;
        }
        
        .auth-footer a {
            color: var(--primary-blue);
            font-weight: 600;
        }
        
        .theme-toggle-auth {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <button class="theme-toggle-auth" id="themeToggle">🌙</button>
    
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <div class="auth-logo">FP</div>
                <h1 class="auth-title">Create Account</h1>
                <p class="auth-subtitle">Join FinTech Pro and start managing your finances</p>
            </div>
            
            <form id="registerForm" method="post"  onsubmit="return handleRegister(event)">
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control" placeholder="Enter your full name" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Phone Number</label>
                    <input type="tel" name="phonenumber" class="form-control" placeholder="+1 234 567 8900" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password"  class="form-control" placeholder="Create a password" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm your password" required>
                </div>
                
                <div style="margin-bottom: 24px;">
                    <label style="display: flex; align-items: flex-start; gap: 8px; cursor: pointer;">
                        <input type="checkbox" style="cursor: pointer; margin-top: 4px;" required>
                        <span style="font-size: 13px; color: var(--text-tertiary);">
                            I agree to the <a href="#" style="color: var(--primary-blue);">Terms of Service</a> and 
                            <a href="#" style="color: var(--primary-blue);">Privacy Policy</a>
                        </span>
                    </label>
                </div>
                
                <button type="submit" name="create" class="btn btn-primary w-full btn-lg">
                    <i class="fas fa-user-plus"></i> Create Account
                </button>
            </form>
            
            <div class="divider">
                <span>OR</span>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <button class="btn btn-secondary w-full">
                    <i class="fab fa-google"></i> Sign up with Google
                </button>
                <button class="btn btn-secondary w-full">
                    <i class="fab fa-facebook"></i> Sign up with Facebook
                </button>
            </div>
            
            <div class="auth-footer">
                Already have an account? <a href="login.php">Login here</a>
            </div>
        </div>
    </div>
    
    <script src="assets/js/main.js"></script>
    <!-- <script>
        function handleRegister(event) {
            event.preventDefault();
            
            if (!validateForm('registerForm')) {
                showNotification('Please fill in all fields', 'danger');
                return false;
            }
            
            showNotification('Creating your account...', 'info');
            
            // Mock registration - redirect to user dashboard
            setTimeout(function() {
                showNotification('Account created successfully!', 'success');
                setTimeout(function() {
                    window.location.href = 'user/dashboard.php';
                }, 1500);
            }, 1500);
            
            return false;
        }
    </script> -->
</body>
</html>

<?php
if (isset($_POST['create'])) {

    $fullname = $_POST['fullname'];
    $email    = $_POST['email'];
    $phone    = $_POST['phonenumber'];
    $password = $_POST['password'];

    // 1. Insert user
    $sql = "INSERT INTO signup (fullname,email,phone,passwords)
            VALUES ('$fullname','$email','$phone','$password')";

    if (mysqli_query($conn, $sql)) {

        // 2. Get new user id
        $user_id = mysqli_insert_id($conn);

        // 3. Generate wallet id
        $wallet_id = rand(1000000000, 9999999999);

        // 4. Insert wallet
        $wallet_sql = "INSERT INTO wallet (user_id, wallet_id)
                       VALUES ('$user_id', '$wallet_id')";

        if (mysqli_query($conn, $wallet_sql)) {

            // 5. Save session correctly
            $_SESSION['user_id'] = $user_id;
            $_SESSION['wallet_id'] = $wallet_id;
            $_SESSION['user_name'] = $fullname;

            echo "Account and wallet created successfully!";
        } else {
            echo "Wallet creation failed!";
        }

    } else {
        echo "Account creation failed!";
    }
}
?>
