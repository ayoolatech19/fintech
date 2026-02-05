<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "fintech";

$conn = mysqli_connect($servername, $username, $password, $database);

if (isset($_POST['login'])) {

    $email  =  $_POST['email'];
    $password =  $_POST['password'];

    // Match phone AND password
    $sql = "SELECT * FROM signup
            WHERE email = '$email' AND passwords = '$password' 
            ";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);
  $role = $user['roles'];
        // Save session
        $_SESSION['user_id']    = $user['id'];
        $_SESSION['user_name']  = $user['fullname'];
        $_SESSION['user_phone'] = $user['phone'];
      
if ($role == 'admin') {
    header("Location: admin/dashboard.php");
        exit();
}
   else {
      header("Location: user/dashboard.php");
        exit();
   }

 } else {
        echo "invalid details";
    }
    }
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FinTech Pro</title>
    
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
                <h1 class="auth-title">Welcome Back</h1>
                <p class="auth-subtitle">Login to your FinTech Pro account</p>
            </div>
            
            <form id="loginForm" method="post">
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password"name="password" class="form-control" placeholder="Enter your password" required>
                </div>
                
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                        <input type="checkbox" style="cursor: pointer;">
                        <span style="font-size: 14px;">Remember me</span>
                    </label>
                    <a href="forgot-password.php" style="color: var(--primary-blue); font-size: 14px; font-weight: 600;">Forgot Password?</a>
                </div>
                
                <button type="submit"name="login" class="btn btn-primary w-full btn-lg">
                    <i class="fas fa-sign-in-alt"></i> Login
                </button>
            </form>
            
            <div class="divider">
                <span>OR</span>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <button class="btn btn-secondary w-full">
                    <i class="fab fa-google"></i> Continue with Google
                </button>
                <button class="btn btn-secondary w-full">
                    <i class="fab fa-facebook"></i> Continue with Facebook
                </button>
            </div>
            
            <div class="auth-footer">
                Don't have an account? <a href="register.php">Sign up here</a>
            </div>
        </div>
    </div>
    
    <script src="assets/js/main.js"></script>
    <!-- <script>
        function handleLogin(event) {
            event.preventDefault();
            
            if (!validateForm('loginForm')) {
                showNotification('Please fill in all fields', 'danger');
                return false;
            }
            
            showNotification('Logging in...', 'info');
            
            // Mock login - redirect to user dashboard
            setTimeout(function() {
                window.location.href = 'user/dashboard.php';
            }, 1500);
            
            return false;
        }
    </script> -->
</body>
</html>

