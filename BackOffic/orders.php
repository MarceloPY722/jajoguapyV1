<?php include './include/head.php'?>
<?php include './include/cnx.php'?>
<?php include './include/menu.php'?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Carro de la compra</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.php">Inicio</a>
                            <span>Carro de Compras</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
        <div class="container">
        <div class="row">
      <div class="col-md-12">
        <?php if(isset($_GET['msg']) && $_GET['msg']=='deleted'): ?>
        <div class="alert alert-danger">Eliminado exitosamente
          <span data-dismiss="alert" class="close" style="cursor: pointer;">&times;</span>
        </div>
        <?php endif; ?>
      </div>
    </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
					                $id= $_SESSION['id'];
					                $req =  $bd->query("SELECT c.qte,m.id ,p.libelle,p.prix_vente,p.image,u.user FROM
                                            cmds_prods c,produits p,commandes m,users u
                                            WHERE c.prod_id=p.id AND c.cmd_id=m.id AND m.iduser=u.id
														                AND u.id=$id");
					                while($data = $req->fetch()):
				                ?>
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic" style="width: 150px;">
                                            <img src="../admin/img/<?= $data['image'] ?>" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h5><?= $data['libelle'] ?></h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div >
                                                <h6><?= $data['qte'] ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ <?= $data['prix_vente'] ?></td>
                                    <td class="cart__close"><a href="DeleteOrder.php?id=<?= $data['id'] ?>"><i class="fa fa-close"></i></a></td>
                                </tr>
                                <?php endwhile;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continuar Comprando</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Payment :</h6>
                        <a href="checkout.php" class="primary-btn">Proceder con el Pago</a>
                    </div>
                </div>
            </div>
        </div>
</section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="img/footer-logo.png" alt=""></a>
                        </div>
                        <p>The customer is at the heart of our unique business model, which includes design.</p>
                        <a href="#"><img src="img/payment.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Clothing Store</a></li>
                            <li><a href="#">Trending Shoes</a></li>
                            <li><a href="#">Accessories</a></li>
                            <li><a href="#">Sale</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="footer__widget">
                        <h6>Shopping</h6>
                        <ul>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Delivary</a></li>
                            <li><a href="#">Return & Exchanges</a></li>
                        </ul>
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
                            Todos los Derechos Reservados| JajoguaPy
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
    <!-- Search End -->

    <!-- Js Plugins -->
    <?php include './include/footer.php'?>