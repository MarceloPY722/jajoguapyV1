<?php include '../include/session.php'; ?>
<?php include '../include/connexion.php'; ?>
<?php
$title = "add fournisseur"; 
if(isset($_POST['submit'])){
$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$req = $bd->prepare("insert into fournisseurs(nomf,adresse,email,telephone) values(?,?,?,?)");
$req->execute([$nom,$adresse,$email,$telephone]);
header('location: /Jajoguapyv2/admin/proveedor/index.php?msg=added');
}

?>
<?php include '../include/header.php'; ?>

<div class="page-container">
  <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

  <!-- Start Sidebar -->
  <?php include '../include/sidebar.php'; ?>
  <!-- End Sidebar -->
  <div class="main-content">

    <!-- Start Menu -->
    <?php include '../include/menu.php'; ?>
    <!-- End Menu -->
    <hr />


    <div class="row">
      <h3>Agregar Proveedor</h3>
      <br />
      <div class="card">
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <label for="nom">Nombre</label>
              <input type="text" name="nom" id="nom" class="form-control" placeholder="" aria-describedby="nom">
            </div>
            <div class="form-group">
              <label for="adresse">Direccion</label>
              <input type="text" name="adresse" id="adresse" class="form-control" placeholder="" aria-describedby="adresse">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="email">
            </div>
            <div class="form-group">
              <label for="telephone">Celular</label>
              <input type="tel" name="telephone" id="telephone" class="form-control" placeholder="" aria-describedby="telephone">
            </div>
            <div class="form-group">
              <button name="submit" class="btn btn-primary btn-block">Agregar</button>
            </div>
          </form>
        </div>
      </div>


    </div>


    <!-- Footer -->
    <footer class="main">

      &copy; 2022 <strong>SHOPUP</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>

    </footer>
  </div>



</div>


<?php include '../include/footer.php'; ?>