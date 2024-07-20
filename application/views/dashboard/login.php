<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link href="<?= base_url('assets/dashboard/') ?>css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f9fa;
    }
    .login-container {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .form-control:focus {
      box-shadow: none;
    }
    .form-check-input:checked {
      background-color: #0d6efd;
      border-color: #0d6efd;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h3 class="text-center mb-4">Login Admin</h3>
    <?= $this->session->userdata("errorLogin"); ?>
    <?php $this->session->unset_userdata("errorLogin"); ?>
    <form method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="email" placeholder="Email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
        <i class="bi bi-eye-slash" id="togglePassword" style="cursor: pointer; position: absolute; right: 25px; top: 42px;"></i>
      </div>
      <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
    </form>
  </div>

  <script src="<?= base_url('assets/dashboard/') ?>js/core/bootstrap.min.js"></script>
</body>
</html>
