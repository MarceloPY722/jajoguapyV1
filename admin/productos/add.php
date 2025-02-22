<?php include '../include/session.php'; ?>
<?php include '../include/connexion.php'; ?>
<?php
$title = "add produit"; 
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
$rq = $bd->prepare("insert into produits(libelle,prix_achat,prix_vente,image,qte_stock,cat_id,details) values(?,?,?,?,?,?,?)");
$rq->execute([$libelle,$PrixAchat,$PrixVente,$image,$Quantite,$cat,$details]);
header('location: /Jajoguapyv2/admin/productos/index.php?msg=added');
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
      <h3>Agregar Productos</h3>
      <br />
      <div class="card">
        <div class="card-body">
          <form method="post"  enctype="multipart/form-data">
            <div class="form-group">
              <label for="image">Imagen</label>
              <input type="file" name="image" id="image" class="form-control" placeholder="" aria-describedby="image">
            </div>
            <div class="form-group">
              <label for="libelle">Nombre</label>
              <input type="text" name="libelle" id="libelle" class="form-control" placeholder=""
                aria-describedby="libelle">
            </div>
            
            <div class="form-group">
              <label for="details">Detalles</label>
              <textarea  class="form-control" name="details" id="details" cols="30" rows="5"></textarea>
            </div>
            <div class="form-group">
              <label for="PrixAchat">Precio de Compra</label>
              <input type="number" name="PrixAchat" id="PrixAchat" class="form-control" placeholder=""
                aria-describedby="paPrixAchatss">
            </div>
            <div class="form-group">
              <label for="PrixVente">Precio de Venta</label>
              <input type="number" name="PrixVente" id="PrixVente" class="form-control" placeholder=""
                aria-describedby="PrixVente">
            </div>
            <div class="form-group">
              <label for="Quantite">Cantidad</label>
              <input type="number" name="Quantite" id="Quantite" class="form-control" placeholder=""
                aria-describedby="Quantite">
            </div>
            <div class="form-group">
              <label for="cat">Categoria</label>
              <select name="cat" id="cat" class="form-control" placeholder="" aria-describedby="cat">
                <?php $qer=$bd->query("select * from categories");
                      while($dt = $qer->fetch()):
                ?>
                <option value="<?= $dt['id']?>"><?= $dt['nom']?></option>
                <?php endwhile;?>
              </select>
            </div>
            <div class="form-group">
              <button name="sub" class="btn btn-primary btn-block">Agregar</button>
            </div>
          </form>
        </div>
      </div>


    </div>


    <!-- Footer -->
    <footer class="main">

     

    </footer>
  </div>



</div>

<?php include '../include/footer.php'; ?>