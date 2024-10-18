<?php include '../include/session.php'; ?>
<?php
$id= $_GET['id'];
$title = "produit"; 
include '../include/connexion.php';
$req = $bd->prepare('delete from produits where id=?');
$req->execute([$id]);
header('location: /Jajoguapyv2/admin/productos/index.php?msg=deleted');