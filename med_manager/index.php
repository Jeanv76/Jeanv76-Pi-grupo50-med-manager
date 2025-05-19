<?php
session_start();
require_once 'includes/db.php';
$err='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $email=trim($_POST['email']);
    $pass=trim($_POST['password']);
    $stmt=$conn->prepare('SELECT id,password FROM users WHERE email=?');
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows===1){
        $stmt->bind_result($uid,$hash);
        $stmt->fetch();
        if(password_verify($pass,$hash)){
            $_SESSION['user_id']=$uid;
            header('Location: dashboard.php');
            exit();
        }
    }
    $err='E‑mail ou senha inválidos.';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login | Gestão de Medicamentos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="d-flex flex-column justify-content-center align-items-center vh-100 login-page">
<div class="card p-4 shadow" style="min-width:320px">
<h3 class="text-center mb-3">Gestão de Medicamentos</h3>
<?php if($err): ?><div class="alert alert-danger"><?= $err ?></div><?php endif; ?>
<form method="post">
<div class="mb-3">
<label class="form-label">E-mail</label>
<input type="email" name="email" class="form-control" required>
</div>
<div class="mb-3">
<label class="form-label">Senha</label>
<input type="password" name="password" class="form-control" required>
</div>
<button class="btn btn-primary w-100">Entrar</button>
</form>
<p class="mt-3 text-center"><a href="register.php">Criar conta</a></p>
</div>
</body>
</html>