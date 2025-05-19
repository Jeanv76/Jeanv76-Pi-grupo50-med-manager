<?php
require_once 'includes/auth.php';
require_once 'includes/db.php';
$uid=$_SESSION['user_id'];
$id=intval($_GET['id']??0);
$stmt=$conn->prepare('DELETE FROM medicines WHERE id=? AND user_id=?');
$stmt->bind_param('ii',$id,$uid);
$stmt->execute();
header('Location: list_medicine.php');
exit();
?>