<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['title'] ?></title>

    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../fonts/Barlow-Light.ttf">
</head>
<body>

    <div class="container-header">
        <div class="enterprise-area">
            <a href="" ><img class="tag-icon" src="../images/icons/about.png" alt=""></a>
            <a href="" ><img class="tag-icon" src="../images/icons/email.png" alt=""></a>
            <a href="" ><img class="tag-icon" src="../images/icons/joinus.png" alt=""></a>
        </div>
        <div class="div-logo">
            <a href=""  href="index.html">
                <img class="logo" src="../images/logo/logotipo.png">
            </a>
        </div>
        <div class="client-area">
            <a href="" ><img class="tag-icon" src="../images/icons/tag.png" alt=""></a>
            <a href="" ><img class="tag-icon" src="../images/icons/cart.png" alt=""></a>
            <a href="" ><img class="tag-icon" src="../images/icons/login.png" alt=""></a>
        </div>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide my-4 mx-4" data-ride="carousel">
        <!--my: margem superior-->
        
        <div class="carousel-inner" role="listbox">
            
            <div class="carousel-item active">
            <!--active: essa imagem que começa rodando-->
        
            <img class="d-block img-fluid" src="../images/banners/banner1.jpg" alt="First slide">
            <!--d-block: aparece em todas as resoluções de tela; img-fluid: ocupa todo o tamanho do espaço da div-->
        
            </div>
        
            <!--ARRUMAR RESOLUÇÃO DAS IMAGENS PARA OCUPAR A TELA 1366x400-->
            <div class="carousel-item">
            <img class="d-block img-fluid" src="../images/banners/banner2.jpg" alt="Second slide">
            </div>

            <div class="carousel-item">
            <img class="d-block img-fluid" src="../images/banners/banner3.jpg" alt="Third slide">
            </div>

        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>

        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>

        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

    </div> 

    <div class="groups">
        <ul class="nav nav-tabs">
            
            <li class="nav-item">
                <a href="#frutas" class="nav-link active" role="tab" data-toggle="tab">
                    <img class="groups-icon" src="../images/icons/fruits.png">
                </a>
            </li>

            <li class="nav-item">
                <a href="#verduras" class="nav-link" role="tab" data-toggle="tab">
                    <img class="groups-icon" src="../images/icons/greens.png">
                </a>
            </li>

            <li class="nav-item">
                <a href="#legumes" class="nav-link" role="tab" data-toggle="tab">
                    <img class="groups-icon" src="../images/icons/vegetables.png">
                </a>
            </li>

            <li class="nav-item">
                <a href="#graos" class="nav-link" role="tab" data-toggle="tab">
                    <img class="groups-icon" src="../images/icons/grains.png">
                </a>
            </li>

            <li class="nav-item">
                <a href="#temperos" class="nav-link" role="tab" data-toggle="tab">
                    <img class="groups-icon" src="../images/icons/condiment.png">
                </a>
            </li>

            <li class="nav-item">
                <a href="#granja" class="nav-link" role="tab" data-toggle="tab">
                    <img class="groups-icon" src="../images/icons/egg.png">
                </a>
            </li>

        </ul>

        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="frutas">1</div>
            <div role="tabpanel" class="tab-pane fade" id="verduras">2</div>
            <div role="tabpanel" class="tab-pane fade" id="legumes">3</div>
            <div role="tabpanel" class="tab-pane fade" id="graos">4</div>
            <div role="tabpanel" class="tab-pane fade" id="temperos">5</div>
            <div role="tabpanel" class="tab-pane fade" id="granja">6</div>
        </div>
    </div>


    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper.js/dist/umd/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
