<?php
session_start();
include '../include/db.php';

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_email'] = $user['email'];
            $_SESSION['admin_name'] = explode('@', $user['email'])[0];
            $_SESSION['success_message'] = "تم تسجيل الدخول بنجاح!";

            header("Location: dashboard/index.php");
            exit;
        } else {
            $error = "كلمة المرور غير صحيحة.";
        }
    } else {
        $error = "البريد الإلكتروني غير موجود.";
    }
}
?>
<!-- هنا كود نموذج تسجيل الدخول مع طباعة $error إذا موجود -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login | Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />

  <style>
    body {
      background: linear-gradient(135deg, #f3f4f6, #ffffff);
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background: #ffffff;
      padding: 3rem 2.5rem;
      border-radius: 16px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
      max-width: 500px;
      width: 100%;
      transition: all 0.3s ease-in-out;
    }

    .brand-logo {
      font-size: 2rem;
      font-weight: 600;
      color: #0d6efd;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .brand-logo i {
      margin-right: 8px;
    }

    .form-label {
      font-weight: 500;
      font-size: 1.1rem;
    }

    .form-control {
      padding: 0.75rem 1rem;
      font-size: 1.05rem;
      border-radius: 10px;
    }

    .btn-primary {
      font-size: 1.1rem;
      padding: 0.75rem;
      border-radius: 12px;
    }

    .btn-primary:hover {
      background-color: #0b5ed7;
    }

    .login-footer {
      margin-top: 1.5rem;
      font-size: 0.95rem;
    }

    .login-footer a {
      text-decoration: none;
      color: #6c757d;
    }

    .login-footer a:hover {
      color: #0d6efd;
    }
  </style>
</head>
<body>

<?php if (isset($_SESSION['success_message'])): ?>
  <div class="alert alert-success text-center mt-3">
    <?= htmlspecialchars($_SESSION['success_message']) ?>
  </div>
  <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<?php if ($error): ?>
  <div class="alert alert-danger text-center mt-3"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<div class="login-box">
  <div class="text-center mb-4">
    <div class="brand-logo"><i class="fas fa-anchor"></i> BRAND</div>
    <p class="text-muted">Login to continue to your dashboard</p>
  </div>

  <form action="" method="post">
    <div class="mb-4">
      <label for="email" class="form-label">Email Address</label>
      <input
        type="email"
        class="form-control"
        id="email"
        name="email"
        placeholder="you@example.com"
        required
      />
    </div>

    <div class="mb-4">
      <label for="password" class="form-label">Password</label>
      <input
        type="password"
        class="form-control"
        id="password"
        name="password"
        placeholder="••••••••"
        required
      />
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="remember" />
        <label class="form-check-label" for="remember">Remember me</label>
      </div>
      <a href="#" class="text-muted">Forgot password?</a>
    </div>

    <div class="d-grid">
      <button type="submit" class="btn btn-primary">Sign In</button>
    </div>
  </form>

  <div class="login-footer text-center">
    <p class="text-muted mt-4">
      Don't have an account? <a href="#">Create one</a>
    </p>
  </div>

  <?php if ($error): ?>
    <div class="alert alert-danger text-center mt-3"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
