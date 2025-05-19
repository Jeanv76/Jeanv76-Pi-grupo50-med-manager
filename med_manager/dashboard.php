<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';
$uid=$_SESSION['user_id'];
$count=$conn->query("SELECT COUNT(*) c FROM medicines WHERE user_id=$uid")->fetch_assoc()['c'];
$expiring=$conn->query("SELECT COUNT(*) c FROM medicines WHERE user_id=$uid AND expiry_date<=DATE_ADD(CURDATE(), INTERVAL 30 DAY)")->fetch_assoc()['c'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard | Gestão</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container-fluid">
<a class="navbar-brand" href="dashboard.php">Gestão de Medicamentos</a>
<div class="d-flex"><a class="btn btn-outline-light" href="logout.php"><i class="bi bi-box-arrow-right"></i> Sair</a></div>
</div>
</nav>
<div class="container py-5">
<h2 class="mb-4">Resumo</h2>
<div class="row g-4">
<div class="col-md-4"><div class="card text-center shadow"><div class="card-body"><h5>Total de Medicamentos</h5><p class="display-6"><?= $count ?></p></div></div></div>
<div class="col-md-4"><div class="card text-center shadow"><div class="card-body"><h5>Vencendo em 30 dias</h5><p class="display-6 text-danger"><?= $expiring ?></p></div></div></div>
</div>
<a class="btn btn-success mt-4" href="add_medicine.php"><i class="bi bi-plus-circle"></i> Adicionar</a>
<a class="btn btn-secondary mt-4" href="list_medicine.php"><i class="bi bi-list-ul"></i> Ver Listagem</a>
</div>
</body>
</html>