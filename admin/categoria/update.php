<?php include '../include/session.php'; ?>
<?php include '../include/connexion.php'; ?>
<?php
$id= $_GET['id'];
$req = $bd->prepare('select * from categories where id=:id');
$req->execute(['id' => $id]);
$data = $req->fetch();

if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $req = $bd->prepare("UPDATE categories SET nom=? WHERE  id=?");
    $req->execute([$nom,$id]);
    header('location: /Jajoguapyv2/admin/categoria/index.php?msg=updated');
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
            <h3>Modificar Categoria</h3>
            <br />
            <div class="card">
                <div class="card-body">
                    <form method="post" >
                        <div class="form-group">
                            <label for="nom">Nombre</label>
                            <input value="<?= $data['nom'] ?>" type="text" name="nom" id="nom" class="form-control" placeholder=""
                                aria-describedby="nom">
                        </div>
                        <div class="form-group">
                            <button name="submit" class="btn btn-warning btn-block">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>


        <!-- Footer -->
        <footer class="main">

        &copy; 2024 <strong>JajoguaPy</strong> | Panel Admin

        </footer>
    </div>
</div>

<?php include '../include/footer.php'; ?>