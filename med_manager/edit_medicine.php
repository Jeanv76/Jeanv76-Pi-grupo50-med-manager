<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';
$uid=$_SESSION['user_id'];
$id=intval($_GET['id']??0);
$stmt=$conn->prepare('SELECT * FROM medicines WHERE id=? AND user_id=?');
$stmt->bind_param('ii',$id,$uid);
$stmt->execute();
$med=$stmt->get_result()->fetch_assoc();
if(!$med){die('Medicamento não encontrado');}
$msg='';
if($_SERVER['REQUEST_METHOD']==='POST'){
    $name=trim($_POST['name']);$lot=trim($_POST['lot']);$exp=date('Y-m-d',strtotime($_POST['expiry']));$qty=intval($_POST['quantity']);
    $u=$conn->prepare('UPDATE medicines SET name=?,lot=?,expiry_date=?,quantity=? WHERE id=? AND user_id=?');
    $u->bind_param('sssiii',$name,$lot,$exp,$qty,$id,$uid);
    if($u->execute()){header('Location: list_medicine.php');exit();}else{$msg='Erro ao atualizar';}
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Editar | Gestão</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">
<div class="container py-5">
<h3 class="mb-4">Editar Medicamento</h3>
<?php if($msg): ?><div class="alert alert-danger"><?= $msg ?></div><?php endif; ?>
<form method="post" class="row g-3">
<div class="col-md-6"><label class="form-label">Nome</label><input type="text" name="name" class="form-control" value="<?=htmlspecialchars($med['name'])?>" required></div>
<div class="col-md-3"><label class="form-label">Lote</label><input type="text" name="lot" class="form-control" value="<?=htmlspecialchars($med['lot'])?>" required></div>
<div class="col-md-3"><label class="form-label">Quantidade</label><input type="number" name="quantity" class="form-control" value="<?= $med['quantity'] ?>" min="1" required></div>
<div class="col-md-3"><label class="form-label">Validade</label><input type="date" name="expiry" class="form-control" value="<?= $med['expiry_date'] ?>" required></div>
<div class="col-12"><button class="btn btn-primary"><i class="bi bi-save"></i> Atualizar</button> <a class="btn btn-secondary" href="list_medicine.php">Cancelar</a></div>
</form>
</div>
</body>
</html>