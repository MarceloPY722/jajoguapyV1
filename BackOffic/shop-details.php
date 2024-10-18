<?php include './include/head.php'?>
<?php include './include/cnx.php'?>
<?php include './include/menu.php'?>
<?php 
$idu= $_SESSION['id'];
$id=$_GET['id'];
$date = date("Y-m-d");
$req=$bd->query("select * from produits where id=$id");
$data=$req->fetch();
$cat=$data['cat_id'];
if(isset($_POST['sub'])){
  $Q=$_POST['qte'];
$qr=$bd->prepare("BEGIN;
                    insert into commandes(date,iduser) VALUES(?,?);
                    insert into cmds_prods(prod_id,cmd_id,qte) VALUES(?,LAST_INSERT_ID(),?);
                    COMMIT;");
  $qr->execute([$date,$idu,$id,$Q]);
  header('location: orders.php');
}
?>
    <!-- Shop Details Section Begin -->
    <section class="shop-details">
    
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="./index.php">Inicio</a>
                            <span>Detalles del producto</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="../admin/img/<?=$data['image']?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form method="post">
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4><?=$data['libelle']?></h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span> - 5 Reviews</span>
                            </div>
                            <h3>$<?=$data['prix_vente']?><span><?=$data['prix_vente']-100?></span></h3>
                            <div class="product__details__cart__option">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input name="qte" type="text" value="1">
                                    </div>
                                </div>
                                <a href=""><button class="primary-btn" name="sub">Añadir al carrito</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5"
                                    role="tab">Descripcion</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        <p>
                                        <?=$data['details']?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        
    </section>
   
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">Producto relacionados</h3>
                </div>
            </div>
            <div class="row">
            <?php
					$qer =  $bd->prepare("SELECT * FROM produits WHERE cat_id=? LIMIT 4");
                    $qer->execute([$cat]);
					while($data=$qer->fetch()):
				?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../admin/img/<?=$data['image']?>">
                            <span class="label">Nuevo</span>
                        </div>
                        <div class="product__item__text">
                            <h6><?=$data['libelle']?></h6>
                            <a href="shop-details.php?id=<?= $data['id']?>" class="add-cart">+ Añadir al Carrito</a>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5><?=$data['prix_vente']?>₲</h5>
                        </div>
                    </div>
                </div>
                <?php endwhile;?>
            </div>
        </div>
    </section>
  
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="/jajoguapyv2/assets/logoW2.png" alt=""></a>
                        </div>
                        <p>Tu futuro tecnologico .</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            Todos lo Derechos Reservados | JajoguaPy 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    


    <?php include './include/footer.php'?>