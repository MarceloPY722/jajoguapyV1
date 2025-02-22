<?php include '../include/session.php'; ?>
<?php include '../include/connexion.php'; ?>
<?php
$title = "produit"; 
$id=$_GET['id'];
$req = $bd->prepare('select * from produits where id=?');
$req->execute([$id]);
$data = $req->fetch();
if(isset($_POST['sub'])){
$image = basename($_FILES['image']['name']);
$path = '../img/'.$image;
$file = $_FILES['image']['tmp_name'];
move_uploaded_file($file,$path);
$libelle = $_POST['libelle'];
$details = $_POST['details'];
$PrixAchat =$_POST['PrixAchat'];
$PrixVente =$_POST['PrixVente'];
$Quantite =$_POST['Quantite'];
$cat = $_POST['cat'];
$rq = $bd->prepare("update produits set libelle=?,prix_achat=?,prix_vente=?,qte_stock=?,cat_id=?,details=? where id=?");
$rq->execute([$libelle,$PrixAchat,$PrixVente,$Quantite,$cat,$details,$id]);
header('location: /Jajoguapyv2/admin/productos/index.php?msg=updated');
}

?>
<?php include '../include/header.php'; ?>


<div class="page-container">

  <!-- Start Sidebar -->
  <?php include '../include/sidebar.php'; ?>
  <!-- End Sidebar -->
  <div class="main-content">

    <!-- Start Menu -->
    <?php include '../include/menu.php'; ?>
    <!-- End Menu -->
    <hr />


    <div class="row">
      <h3>Modifica un Producto</h3>
      <br />
      <div class="card">
        <div class="card-body">
          <form method="post"  enctype="multipart/form-data">
            <div class="form-group">
              <label for="image">Imagen</label>
              <input value="c:/<?=$data['image']?>"  type="file" name="image" id="image" class="form-control" placeholder="" aria-describedby="image">
            </div>
            <div class="form-group">
              <label for="libelle">Producto</label>
              <input value="<?=$data['libelle']?>" type="text" name="libelle" id="libelle" class="form-control" placeholder=""
                aria-describedby="libelle">
            </div>
            <div class="form-group">
              <label for="details">Detalles</label>
              <textarea  class="form-control" name="details" id="details" cols="30" rows="5"><?=$data['details']?></textarea>
            </div>
            <div class="form-group">
              <label for="PrixAchat">Precio de Compra</label>
              <input value="<?=$data['prix_achat']?>" type="number" name="PrixAchat" id="PrixAchat" class="form-control" placeholder=""
                aria-describedby="paPrixAchatss">
            </div>
            <div class="form-group">
              <label for="PrixVente">Precio de Venta</label>
              <input value="<?=$data['prix_vente']?>" type="number" name="PrixVente" id="PrixVente" class="form-control" placeholder=""
                aria-describedby="PrixVente">
            </div>
            <div class="form-group">
              <label for="Quantite">Cantidad</label>
              <input value="<?=$data['qte_stock']?>" type="number" name="Quantite" id="Quantite" class="form-control" placeholder=""
                aria-describedby="Quantite">
            </div>
            <div class="form-group">
              <label for="cat">Categoria</label>
              <select name="cat" id="cat" class="form-control" placeholder="" aria-describedby="cat">
                <?php $qer=$bd->query("select * from categories");
                      foreach($qer as $dt):
                ?>
                <option <?=($data['cat_id']==$dt['id'])?'selected':''?> value="<?= $dt['id']?>"><?= $dt['nom']?></option>
                <?php endforeach;?>
              </select>
            </div>
            <div class="form-group">
              <button name="sub" class="btn btn-warning btn-block">Modificar</button>
            </div>
          </form>
        </div>
      </div>


    </div>

  </div>



</div>

<?php include '../include/footer.php'; ?>