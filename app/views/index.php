<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="../assets/css/animated.css">
    <link rel="stylesheet" href="../assets/css/owl.css">

</head>

<body>

    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="index.php" class="logo">
                            <img src="../assets/images/sysfood_logo_interna.png" alt="Sysfood"
                                style="width: 120px; height: 120px;">
                        </a>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#services">Serviços</a></li>
                            <li class="scroll-to-section"><a href="#pricing">Preços</a></li>
                            <li>
                                <div class="gradient-button"><a id="modal_trigger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><i class="fa fa-sign-in-alt"></i> Entrar</a>
                                </div>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: #0d6efd">Conecte-se</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <section class="">
                        <!-- Social Login -->
                        <div class="social_login">
                            <div class="action_btns">
                                <div class="one_half"><a href="#" id="login_form" class="btn">Acessar</a></div>
                                <div class="one_half last"><a href="site/cadastrar.php" id="register_form" class="btn">Registrar</a>
                                </div>
                            </div>
                        </div>

                        <div class="user_login">
                            <form>

                                <label>Email</label>
                                <input type="text" class="form-control" />


                                <label>Senha</label>
                                <input type="password" class="form-control" />
                                <br>
                                <div class="checkbox">
                                    <input id="remember" type="checkbox" />
                                    <label for="remember">
                                        Lembrar de mim neste computador</label>
                                    <div class="d-flex flex-row-reverse align-items-center">
                                        <a href="#" class="forgot_password">Esqueceu a senha?</a>
                                    </div>
                                </div>

                                <div class="action_btns">
                                    <div class="one_half"><a href="#" class="btn back_btn"><i
                                                class="fa fa-angle-double-left"></i>
                                            Voltar</a></div>
                                    <div class="one_half last"><a href="#" class="btn btn_red">Acessar</a></div>
                                </div>
                            </form>
                        </div>

                        <!--WASN'T THIS SUPOSED TO BE CALLED IN THE REGISTER PHP FILE??? JESUS FUCKING CHRISST <div class="user_register box">
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nome da Empresa</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>CNPJ</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Senha</label>
                                        <input type="password" class="form-control" />
                                    </div>
                                </div>
                                <label for="">Endereço</label>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Rua</label>
                                        <input type="text" class="form-control" />
                                    </div>

                                    <div class="col-md-6">
                                        <label>Bairro</label>
                                        <input type="text" class="form-control" />
                                    </div>

                                    <div class="col-md-6">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" />
                                    </div>

                                    <div class="col-md-6">
                                        <label>Estado</label>
                                        <input type="text" class="form-control" />
                                    </div>

                                    <div class="col-md-6">
                                        <label>CEP</label>
                                        <input type="text" class="form-control" />
                                    </div>

                                    <div class="col-md-6">
                                        <label>Complemento</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div style="margin-bottom: 20px;"></div>

                                <div class="action_btns">
                                    <div class="one_half"><a href="#" class="btn back_btn"><i
                                                class="fa fa-angle-double-left"></i>
                                            Voltar</a></div>
                                    <div class="one_half last"><a href="#" class="btn btn_red">Registrar</a></div>
                                </div>
                            </form>
                        </div>-->
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s"
                                data-wow-delay="1s">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h2 style="font-family: Marker Felt, fantasy">Sysfood</h2>
                                        <p style=" font-family: Marker Felt, fantasy">O sistema de gerenciamento de
                                            pedidos Sysfood é um solução ideal para
                                            pequenos restaurantes que buscam se destacar no mercado altamente
                                            competitivo da gastronomia.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="../assets/images/restaurante.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                        <h4 style="font-family: Marker Felt, fantasy">Quais serviços <em
                                style="font-family: Marker Felt, fantasy">Sysfood</em> tem a oferecer?
                        </h4>
                        <img src=" ../assets/images/heading-line-dec.png" alt="">
                        <p style="font-family: Marker Felt, fantasy">O Sysfood disponibiliza várias ferramentas e
                            funcionalidades, desde o
                            gerenciamento de pedidos até a emissão de relatórios financeiros. Os cards
                            abaixo detalham de forma mais precisa os serviços oferecidos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="service-item first-service">
                        <div class="icon"></div>
                        <h4>App Maintenance</h4>
                        <p>You are not allowed to redistribute this template ZIP file on any other website.</p>
                        <div class="text-button">
                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item second-service">
                        <div class="icon"></div>
                        <h4>Rocket Speed of App</h4>
                        <p>You are allowed to use the Chain App Dev HTML template. Feel free to modify or edit this
                            layout.</p>
                        <div class="text-button">
                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item third-service">
                        <div class="icon"></div>
                        <h4>Multi Workflow Idea</h4>
                        <p>If this template is beneficial for your work, please support us <a rel="nofollow"
                                href="https://paypal.me/templatemo" target="_blank">a little via PayPal</a>. Thank you.
                        </p>
                        <div class="text-button">
                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="service-item fourth-service">
                        <div class="icon"></div>
                        <h4>24/7 Help &amp; Support</h4>
                        <p>Lorem ipsum dolor consectetur adipiscing elit sedder williamsburg photo booth quinoa and
                            fashion axe.</p>
                        <div class="text-button">
                            <a href="#">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="pricing" class="pricing-tables">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="section-heading">
                        <h4>Preços <em>elaborados</em> para <em>ajudar</em> novos empresarios</h4>
                        <img src="../assets/images/heading-line-dec.png" alt="">
                        <p>A seguir, os valores dos planos disponíveis, especialmente
                            elaborados para quem está iniciando no ramo.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-item-regular">
                        <span class="price">R$0</span>
                        <h4>Plano Básico</h4>
                        <div class="icon">
                            <img src="../assets/images/pricing-table-01.png" alt="">
                        </div>
                        <ul>
                            <li>Lorem Ipsum Dolores</li>
                            <li>20 TB of Storage</li>
                            <li class="non-function">Life-time Support</li>
                            <li class="non-function">Premium Add-Ons</li>
                            <li class="non-function">Fastest Network</li>
                            <li class="non-function">More Options</li>
                        </ul>
                        <div class="border-button">
                            <a href="#">Purchase This Plan Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-item-pro">
                        <span class="price">R$19</span>
                        <h4>Plano Padrão</h4>
                        <div class="icon">
                            <img src="../assets/images/pricing-table-01.png" alt="">
                        </div>
                        <ul>
                            <li>Lorem Ipsum Dolores</li>
                            <li>50 TB of Storage</li>
                            <li>Life-time Support</li>
                            <li>Premium Add-Ons</li>
                            <li class="non-function">Fastest Network</li>
                            <li class="non-function">More Options</li>
                        </ul>
                        <div class="border-button">
                            <a href="#">Purchase This Plan Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-item-regular">
                        <span class="price">R$39</span>
                        <h4>Plano Padrão</h4>
                        <div class="icon">
                            <img src="../assets/images/pricing-table-01.png" alt="">
                        </div>
                        <ul>
                            <li>Lorem Ipsum Dolores</li>
                            <li>120 TB of Storage</li>
                            <li>Life-time Support</li>
                            <li>Premium Add-Ons</li>
                            <li>Fastest Network</li>
                            <li>More Options</li>
                        </ul>
                        <div class="border-button">
                            <a href="#">Purchase This Plan Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>Copyright © 2023 Sysfood. All Rights Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/owl-carousel.js"></script>
    <script src="../assets/js/animation.js"></script>
    <script src="../assets/js/imagesloaded.js"></script>
    <script src="../assets/js/popup.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>