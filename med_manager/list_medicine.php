<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';
$uid=$_SESSION['user_id'];
$res=$conn->query("SELECT * FROM medicines WHERE user_id=$uid ORDER BY expiry_date");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Medicamentos | Gestão</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">
<div class="container py-5">
<h3 class="mb-4">Lista de Medicamentos</h3>
<a class="btn btn-success mb-3" href="add_medicine.php"><i class="bi bi-plus-circle"></i> Novo</a>
<table class="table table-striped align-middle">
<thead><tr><th>Nome</th><th>Lote</th><th>Validade</th><th>Qtd</th><th>Ações</th></tr></thead>
<tbody>
<?php while($r=$res->fetch_assoc()): $near=strtotime($r['expiry_date'])<=strtotime('+30 days')?'table-danger':''; ?>
<tr class="<?= $near ?>">
<td><?= htmlspecialchars($r['name']) ?></td>
<td><?= htmlspecialchars($r['lot']) ?></td>
<td><?= date('d/m/Y',strtotime($r['expiry_date'])) ?></td>
<td><?= $r['quantity'] ?></td>
<td>
<a class="btn btn-sm btn-primary" href="edit_medicine.php?id=<?=$r['id']?>"><i class="bi bi-pencil"></i></a>
<a class="btn btn-sm btn-danger" href="delete_medicine.php?id=<?=$r['id']?>" onclick="return confirm('Excluir?')"><i class="bi bi-trash"></i></a>
</td>
</tr>
<?php endwhile; ?>
</tbody>
</table>
<a class="btn btn-secondary" href="dashboard.php"><i class="bi bi-arrow-left"></i> Voltar</a>
</div>
</body>
</html>