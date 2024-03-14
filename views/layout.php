<?php
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)){
        $inicio = false;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
    <script src="https://kit.fontawesome.com/7badbd514e.js" crossorigin="anonymous"></script>
    
</head>
<body>

    <div class="barra">
        <div class="mobile-menu">
            <img src="../build/img/barras.svg" alt="icono menu responsive">
        </div>
    </div> 
    <div class="navegacion">
        <div class="navegacion-left">
            <a href="/" class="box-logo-enlace">
                <img src="../build/img/logo.png"   alt="Logotipo de Bienes Raices" >
            </a>
        </div>
        <ul class="navegacion-medio">
            <li><a href="/nosotros">Nosotros</a></li>
            <li><a href="/propiedades">Anuncios</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/contacto">Contacto</a></li>
            <li><a href="/login">Iniciar Sesión</a></li>
            <li>
                <?php  if($auth):?>
                    <a href="/logout">Cerrar Sesión</a>
                <?php endif;?>
            </li>
        </ul>
        <div class="navegacion-right">
            <img src="../build/img/dark-mode.svg" alt="dark mode" class="dark-mode-boton">
        </div>
    </div>
      

    <?php if($inicio) {?>
        <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
            <div class="contenedor contenido-header">
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo </h1>
                <div class=" contenedor header-resumen">
                    <div class="header-resumen-box">
                        <h2 class="header-resumen-title">650</h2>
                        <p class="header-resumen-paragraph">Productos Premium</p>
                    </div>
                    <div class="header-resumen-box">
                        <h2 class="header-resumen-title">+2500</h2>
                        <p class="header-resumen-paragraph">Clientes Felices</p>
                    </div>
                    <div class="header-resumen-box">
                        <h2 class="header-resumen-title">12</h2>
                        <p class="header-resumen-paragraph" >Años Vendiendo</p>
                    </div>
                </div>
                <div class="header-box">
                    <button class="header-box-button">
                        <img src="../build/img/flecha.svg" alt="flecha">
                    </button>
                </div>
            </div>
        </header> 
    <?php }?>
     

    <?php echo $contenido; ?>

    <footer class="footer">

        <div class="footer-line">
            <div>
                <div class="footer-line-box">
                    <h3>Contacto</h3>
                    <p class="footer-email">BienesRacies25@hotmail.com</p>
                    <p class="footer-email">+54 2215892245</p>
                </div>
                <div class="footer-line-box2">
                    <p class="footer-parrafo"><a href="/"></a><img src="build/img/logo-twitter.png" class="footer-img"/></p>
                    <p class="footer-parrafo"><a href="/"></a><img src="build/img/logo-facebook.png" class="footer-img"/></p>
                    <p class="footer-parrafo"><a href="/"></a><img src="build/img/logo-youtube.png" class="footer-img"/></p>
                    <p class="footer-parrafo"><a href="/"></a><img src="build/img/logo-instagram.png" class="footer-img"/></p>
                </div>
                
                
            </div>

            <div>
                <h3>Nosotros</h3>
                <nav class="navegacion-footer">
                    <a href="/nosotros.php">Nosotros</a>
                    <a href="/anuncios.php">Anuncios</a>
                    <a href="/blog.php">Blog</a>
                    <a href="/contacto.php">Contacto</a>
                </nav>
            </div>

            <div>
                <h3>Legal</h3>
                <p>Temas & Condiciones</p>
                <p>Politica y Privacidad</p>
            </div>
        </div>

    </footer>
    <div class="contenedor-footer">
            
        <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>
    </div>

    <script src="../build/js/bundle.min.js"></script>

</body>
</html>