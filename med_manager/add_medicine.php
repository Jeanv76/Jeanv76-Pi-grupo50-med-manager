<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';
$msg='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $name=trim($_POST['name']);$lot=trim($_POST['lot']);$exp=date('Y-m-d',strtotime($_POST['expiry']));$qty=intval($_POST['quantity']);$uid=$_SESSION['user_id'];
    $stmt=$conn->prepare('INSERT INTO medicines (name,lot,expiry_date,quantity,user_id) VALUES (?,?,?,?,?)');
    $stmt->bind_param('sssii',$name,$lot,$exp,$qty,$uid);
    if($stmt->execute()){header('Location: list_medicine.php');exit();}else{$msg='Erro ao adicionar.';}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Adicionar | Gestão</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">
<div class="container py-5">
<h3 class="mb-4">Adicionar Medicamento</h3>
<?php if($msg): ?><div class="alert alert-danger"><?= $msg ?></div><?php endif; ?>
<form method="post" class="row g-3">
<div class="col-md-6"><label class="form-label">Nome</label><input type="text" name="name" class="form-control" required></div>
<div class="col-md-3"><label class="form-label">Lote</label><input type="text" name="lot" class="form-control" required></div>
<div class="col-md-3"><label class="form-label">Quantidade</label><input type="number" name="quantity" min="1" class="form-control" required></div>
<div class="col-md-3"><label class="form-label">Validade</label><input type="date" name="expiry" class="form-control" required></div>
<div class="col-12"><button class="btn btn-success"><i class="bi bi-save"></i> Salvar</button> <a class="btn btn-secondary" href="list_medicine.php">Cancelar</a></div>
</form>
</div>
</body>
</html>