<?php include 'include/sess.php'; ?>
<?php include 'include/connexion.php' ?>
<?php 
if(isset($_POST['submit'])){
	$user = $_POST['user'];
	$email = $_POST['email'];
	$pass = md5($_POST['pass']);
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$tele = $_POST['tele'];
	$image = basename($_FILES['ig']['name']);
  $path = 'img/'.$image;
  $file = $_FILES['ig']['tmp_name'];
  move_uploaded_file($file,$path);
	$ville = $_POST['ville'];
	$req = $bd->prepare("insert into users(user,pass,email,role,nom,prenom,tele,image,ville_id) values(?,?,?,?,?,?,?,?,?)");
	$req->execute([$user,$pass,$email,"cliente",$nom,$prenom,$tele,$image,$ville]);
	header('location: /Jajoguapyv2/admin/login.php');
}
?>
<?php include 'include/header2.php'; ?>

<style>
	.ic{
		font-size: 2.3em; 
		color:#fff; 
		margin:20px;
		position: absolute;
    top: 0px;
    z-index: 1000;
    right: 0px;
	}
</style>

<script type="text/javascript">
var baseurl = '';
</script>

<div class="login-container">
<a class="ic" href="/Jajoguapyv2/">
          <i class="entypo-cancel"></i>
         </a>
	<div class="login-header login-caret">
		
		<div class="login-content">
			
			<a href="" class="logo">
				<img src="/Jajoguapyv2/assets/logoW.png" width="300" alt="" />
			</a>
		
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content">
			
			<div class="form-login-error">
				<h3>Inicio de Sesion Fallido</h3>
				
			</div>
			
			<form method="post" enctype="multipart/form-data">
				   
			<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						<input required type="text" class="form-control" name="nom" id="nom" placeholder="Nombre" autocomplete="off" />
					</div>
					
				</div>
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="text" class="form-control" name="prenom" id="prenom" placeholder="Apodo" autocomplete="off" />
					</div>
					
				</div>

				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-phone"></i>
						</div>
						
						<input type="number" class="form-control" name="tele" id="tele"  placeholder="Numero de Celular" autocomplete="off" />
					</div>
					
				</div>
       
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-list"></i>
						</div>
						<select name="ville" id="ville" class="form-control" placeholder="Ciudad" aria-describedby="ville">
                <?php $qer=$bd->query("select * from ville");
                      while($dt = $qer->fetch()):
                ?>
                <option value="<?= $dt['id']?>"><?= $dt['nomv']?></option>
                <?php endwhile;?>
              </select>
					</div>
					
				</div>
			<!--  -->
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-user"></i>
						</div>
						
						<input type="text" class="form-control" name="user" id="user" placeholder="Usuario" autocomplete="off" />
					</div>
					
				</div>

				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-gplus-circled"></i>
						</div>
						
						<input type="email" class="form-control" name="email" id="email" placeholder="Correo" autocomplete="off" />
					</div>
					
				</div>
				
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-key"></i>
						</div>
						
						<input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña" autocomplete="off" />
					</div>
				
				</div>
				<div class="form-group">
					
					<div class="input-group">
						<div class="input-group-addon">
							<i class="entypo-picture"></i>
						</div>
						<input type="file" class="form-control" name="ig" id="ig" placeholder="ig" autocomplete="off" />
					</div>
				
				</div>
				<div  class="form-group">
					<button name="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						 <a  href="login.php">Registrate</a>
					</button>
				</div>
				
				<div class="form-group">
					<a href="login.php">Iniciar Sesion</a>
				</div>
				
			</form>
			
			
			<div class="login-bottom-links">
				<a href="extra-forgot-password.html" class="link">Olvidaste tu constraseña?</a>
				<br />
			</div>
		</div>
	</div>
</div>


<style>
	#ville option {
    background-color: black;
    color: white;
}

</style>
<?php include 'include/footer2.php'; ?>