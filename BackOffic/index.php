<?php include './include/head.php'?>
<?php include './include/cnx.php'?>
    
    <?php include './include/menu.php'?>

    <section class="hero">
    <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="/jajoguapyv2/assets/o.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">
                                <h6>Ofertas</h6>
                                <h2>Black Friday</h2>
                                <h3 style="color: yellow">Hasta el 60% De Descuento en Productos Seleccionados.</h3>
                                <p></p>
                                <a href="#" class="primary-btn">Comprar Ya!!</a>
                                <div class="hero__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
  
    <section id="product" class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">----</li>
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
            <?php
					$qer =  $bd->query("SELECT * FROM produits LIMIT 12");
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
    
    <section class="categories spad">
    <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categories__text">
                        <h2>Aprovecha <br /> <span>Esta Oferta por</span> <br /> Tiempo Limitado</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="img/phone1.png" alt="">
                        <div class="hot__deal__sticker">
                            <span>Sale por</span>
                            <h5>₲ 2.500.000</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Descuentos</span>
                        <h2>Iphone 12 | 256 GB </h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <div class="cd-item">
                                <span>3</span>
                                <p>Days</p>
                            </div>
                            <div class="cd-item">
                                <span>1</span>
                                <p>Hours</p>
                            </div>
                            <div class="cd-item">
                                <span>50</span>
                                <p>Minutes</p>
                            </div>
                            <div class="cd-item">
                                <span>18</span>
                                <p>Seconds</p>
                            </div>
                        </div>
                        <a href="" class="primary-btn">Compra Ya!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="blogs" class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Ultimas Noticias</span>
                        <h2>Dispositivos Nuevos</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/workperch-mR3UqBUU9Ts-unsplash.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 16 February 2020</span>
                            <h5></h5>
                            <a href="">Leer más</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/onur-binay-OKjJZNTl004-unsplash.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 21 February 2020</span>
                            <h5></h5>
                            <a href="">Leer más</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/sam-pak-WIeJcQrd3Tw-unsplash.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 28 February 2020</span>
                            <h5></h5>
                            <a href="">Leer más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <footer class="footer">
      <!--Falta footer-->
    </footer>

    <style>
    .categories__hot__deal {
    position: relative;
    padding: 20px;
}

.hot__deal__sticker {
    position: absolute;
    top: -20px;  
    right: -20px; 
    background-color: black;
    color: white;
    border-radius: 50%;
    width: 120px; 
    height: 120px; 
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 10px;
    box-sizing: border-box;
}

.hot__deal__sticker span {
    font-size: 18px; 
    font-weight: bold;
}

.hot__deal__sticker h5 {
    font-size: 20px;  
    margin: 0;
}


.NewProduct{
    text-align: center;
    padding: 20px;
    
}

.NewProduct h4{
    font-family: 'Times New Roman', Times, serif;
    font-size: 2rem;

}
    </style>

    <?php include './include/footer.php'?>

  