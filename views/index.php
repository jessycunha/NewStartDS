<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veg & tal</title>

    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <!-- <link rel="stylesheet" href="../fonts/Barlow-Light.ttf"> -->
    <!-- <script src="../js/cart.js" async></script> -->

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
            <a href="" data-toggle="modal" data-target="#modalCart"><img class="tag-icon" src="../images/icons/cart.png" alt=""></a>
            <a href="login.php" ><img class="tag-icon" src="../images/icons/login.png" alt=""></a>
        </div>
    </div>

    <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Meu carrinho</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
          <div id="itens-cart">
            
          </div>

          </div>
        
          <div class="modal-footer">
            <h6>Escolher veículo e horário</h6>
            <button type="button" class="btn btn-primary">Pagar</button>
          </div>
        

        </div>
      </div>
    </div>

    <div class="carousel">
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
    </div>

    <div class="groups">
        <a href="frutas.php"><img src="../images/icons/fruits.png" alt="Frutas"></a>
        <a href="verduras.php"><img src="../images/icons/greens.png" alt="Verduras"></a>
        <a href="legumes.php"><img src="../images/icons/vegetables.png" alt="Legumes"></a>
        <a href="graos.php"><img src="../images/icons/grains.png" alt="Grãos"></a>
        <a href="temperos.php"><img src="../images/icons/condiment.png" alt="Temperos"></a>
        <a href="granja.php"><img src="../images/icons/egg.png" alt="Granja"></a>
    </div>

    <div class='cards'>
      <div class="row">
      
        <?php include '../database/connection.php'; 
        $sql = "SELECT * FROM produtos";
        $search = mysqli_query($connection, $sql);
        
        while ($array = mysqli_fetch_array($search)){
          $id_produto = $array['id_produto'];
          $produto = $array['produto'];
          $preco_venda = $array['preco_venda'];
          $imagem = $array['imagem'];
        ?>

        <div class="col-lg-3 col-md-4 col-sm-6 col-12" id="card">
          <div class="card h-100 w-120">
            <img class="card-img-top" src="<?php echo $imagem ?>" alt="">
            <!-- <a href="#"><img class="card-img-top" src="<?php //echo $imagem ?>" alt=""></a> -->
            <div class="card-body">
            <input type="" name="id_produto" id="id_produto" value="<?php echo $id_produto ?>"/>
              <h4 class="card-title shop-item-title" id="produto"><?php echo $produto ?></h4>
              <h2 class="card-price shop-item-price" id="preco">R$<?php echo $preco_venda ?><span> /un.</span></h2>
              <div class="card-buttons">
                <!-- <a href="index.php?funcao=add&id=<?php //echo $id_produto ?>">Comprar</a> -->    
                <a class="btn btn-success" onclick="addCart('<?php echo $id_produto ?>')">Comprar</a>
              </div>
            </div>
          </div>
        </div>

        <?php } ?>

      </div>
    </div>

    <script>
      function addCart(id_produto){
        console.log(id_produto);
        event.preventDefault();
        $.ajax({
          url: '../php/cart.php',
          method: 'post',
          data: {id_produto},
          dataType: 'text',
          success: function(produto){
            $('#modalCart').modal('show');
            $('#itens-cart').append(produto);
          }
        });
      }
    </script>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper.js/dist/umd/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
