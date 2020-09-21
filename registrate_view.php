<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/style.css"></link>
</head>

<body>
    <div class="contenedor">
        <h1 class="titulo">Regístrate</h1>
        <hr class="border"> 
        <br>
        <form action="login.php" method="post" class="formulario" name="login">
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i>
                <input type="text" name="usuario" class="usuario" placeholder="usuario"></input>
            </div>
            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i>
                <input type="password" name="password" class="password" placeholder="password"></input>
                <br>
                <!--<p class="texto-registrate">
                    
                    <a href="inicio.php">Login</a>
                </p>-->
            </div>
            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i>
                <input type="submit" value="Ingresar"></input>
            </div><!--
            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i>
                <input type="password" name="password2" class="password_btn" placeholder="repetir password"></input>
                <br>
               
                <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>-->
        </form><!--
        <p class="texto-registrate">
            ¿ya tienes cuenta?
            <a href="login.php"></a>
        </p>-->
    </div>
</body>