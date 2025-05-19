<?php
require_once 'includes/db.php';
session_start();
$msg='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $pass=password_hash(trim($_POST['password']),PASSWORD_DEFAULT);
    $stmt=$conn->prepare('INSERT INTO users (name,email,password) VALUES (?,?,?)');
    $stmt->bind_param('sss',$name,$email,$pass);
    if($stmt->execute()){$_SESSION['user_id']=$stmt->insert_id;header('Location: dashboard.php');exit();}
    else {$msg='Erro ao registrar (e‑mail já existe?)';}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cadastrar | Gestão de Medicamentos</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body class="d-flex flex-column justify-content-center align-items-center vh-100 login-page">
<div class="card p-4 shadow" style="min-width:320px">
<h3 class="text-center mb-3">Criar conta</h3>
<?php if($msg): ?><div class="alert alert-danger"><?= $msg ?></div><?php endif; ?>
<form method="post">
<div class="mb-3"><label class="form-label">Nome</label><input type="text" name="name" class="form-control" required></div>
<div class="mb-3"><label class="form-label">E-mail</label><input type="email" name="email" class="form-control" required></div>
<div class="mb-3"><label class="form-label">Senha</label><input type="password" name="password" class="form-control" required></div>
<button class="btn btn-success w-100">Registrar</button>
</form>
<p class="mt-3 text-center"><a href="index.php">Voltar ao login</a></p>
</div>
</body>
</html>