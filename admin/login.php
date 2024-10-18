<?php include 'include/sess.php'; ?>
<?php include 'include/connexion.php' ?>
<?php 
if(isset($_POST['submit'])){
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
	$req = $bd->query("SELECT COUNT(*) FROM users WHERE USER='$user' AND pass='$pass'");
	$res = $req->fetchColumn();
	$rq = $bd->query("SELECT * FROM users WHERE USER='$user' AND pass='$pass'");
	if($res == '1'){
		$res1 = $rq->fetch();
	$_SESSION['role']=$res1['role'];
  }
	if($res == '1' && $_SESSION['role']== 'admin'){
		$_SESSION['user'] = $res1['user'];
		header('location: /jajoguapyv2/admin/index.php');
	}else if($res == '1' && $_SESSION['role'] == 'cliente'){
		$_SESSION['id'] = $res1['id'];
		header('location: /jajoguapyv2/BackOffic/index.php');
	}
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
				<img src="/jajoguapyv2/assets/logoW2.png" />
			</a>
			
			
		</div>
	</div>
	<div class="login-progressbar">
		<div></div>
	</div>
	<div class="login-form">
		<div class="login-content">
			<div class="form-login-error">
				<h3>Inicio de Sesion Fallido</h3>
				<p>Email o Constraseña Invalida.</p>
			</div>
			<form method="post" role="form">
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
							<i class="entypo-key"></i>
						</div>
						<input type="password" class="form-control" name="pass" id="pass" placeholder="Constraseña" autocomplete="off" />
					</div>
				</div>
				<div class="form-group">
					<button  name="submit" class="btn btn-primary btn-block btn-login">
						<i class="entypo-login"></i>
						Iniciar Sesion
					</button>
				</div>
				<div class="form-group">
					<em>-</em>
				</div>
				<div class="form-group">
					<a href="signup.php">Registrate</a>
				</div>	
			</form>
			
			<div class="login-bottom-links">
				<a href="#" class="link">Olvidaste tu Contraseña?</a>
				<br />
				
			</div>
		</div>
	</div>
</div>
<?php include 'include/footer2.php'; ?>