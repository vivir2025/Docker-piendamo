<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IPS FNPV | INICIO DE SESION</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bootstrap/css/medi.css"); ?>">
  <link rel="shortcut icon" href="<?= base_url("assets/img/icino.png"); ?>" type="image/x-icon">
  <style>
    body, html {
      height: 100%;
      margin: 0;
    }
    .global {
      height: 100%;
      display: flex;
    }
    .mit, .mit1 {
      flex: 1;
      height: 100%;
    }
    .mit {
      background: linear-gradient(20deg, #2a327d, #2a327d, #166a28, #166a28, #2a327d, #2a327d);
      display: flex;
      justify-content: center;
      align-items: flex-end;
      border: none;
      position: relative; /* Añadimos posición relativa para establecer un contexto */
    
    }
    .mit1 {
     background-color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      padding-left: 70px; /* Ajusta el ancho de la imagen más un margen */
      position: relative; /* Añadimos posición relativa para establecer un contexto */
    }
    .img {
      width: 100%; /* La imagen no excederá el ancho del contenedor */
      height: auto;
    }
    .img2 {
      position: absolute; /* Establecemos posición absoluta */
      top: 10px; /* Ajusta la distancia desde el borde superior */
      left: 50%; /* Centramos la imagen horizontalmente */
      transform: translateX(-50%); /* Ajustamos para centrar la imagen */
      width: 120px;
      height: 150px;
     
    
    }
    @media (max-width: 767px) {
      /* Ocultar .mit cuando el ancho de la pantalla sea menor a 768px */
      .mit {
        display: none;
      }
      /* Ajustar el ancho de .mit1 para ocupar toda la pantalla */
      .mit1 {
        flex: 1 100%;
        background: linear-gradient(20deg, #2a327d, #2a327d, #166a28, #166a28, #2a327d, #2a327d);
      }
    }
    .login{
      border: 3px solid #166a28;
      border-radius: 10px;
      width: 270px;
      height: 350px;
      background-color: white;
      box-shadow: 10px 40px 40px rgba(0, 0, 0, 0.5);
     /* Ajustes de posición para el contenedor de login */
   
      position: relative; /* Posición relativa para ajustar la imagen */
      z-index: 1; /* Asegura que el contenido esté delante de la imagen */
    

    }
    .text{
      text-align: center;
      margin-top: 5px;
    }
    .login1 {
      display: flex;
      justify-content: center;
      flex-direction: column;
     margin-left: 20px;
     margin-right: 20px;
     padding-top: 30px;
    }
    input {
      padding-left: 10px;
      margin-top: 10px;
      border-radius: 10px;
     
      height: 30px;
    }
    .ov-btn-slide-left {
  background: #fff; /* color de fondo */
  color: #0A37BA; ; /* color de fuente */
  border: 2px solid #4741d7; /* tamaño y color de borde */
  padding: 12px 15px;
  border-radius: 15px; /* redondear bordes */
  position: relative;
  z-index: 1;
  overflow: hidden;
  display: inline-block;
}
.ov-btn-slide-left:hover {
  color: #fff; /* color de fuente hover */
}
.ov-btn-slide-left::after {
  content: "";
  background: #4741d7; /* color de fondo hover */
  position: absolute;
  z-index: -1;
  padding: 16px 20px;
  display: block;
  top: 0;
  bottom: 0;
  left: -100%;
  right: 100%;
  -webkit-transition: all 0.35s;
  transition: all 0.35s;
}
.ov-btn-slide-left:hover::after {
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  -webkit-transition: all 0.35s;
  transition: all 0.35s;
}
button {
  margin-top: 40px;
  
  
}
.lado {
  width: 130px;
      height: 300px;
      display: flex;
      /* Ajustes de posición */
      position: absolute;
      top: 50%;
      left: 0;
      margin-left: -100px; /* Ajuste para mover la imagen hacia la izquierda */
      transform: translateY(-50%);
     
    }
    .lados {
     width: 100px;
      height: 180px;
      display: flex;
      /* Ajustes de posición */
      position: absolute;
     bottom: -10%;
      margin-left: -1px; /* Ajuste para mover la imagen hacia la izquierda */
      transform: translateY(-1%);
      transform: translateX(189%);
     
    }
    h1{

      font-size: 24px;
      padding: 10px;
    }
  </style>
  <!-- view the login to enter the system and grab your life restriction according to the role ... -->
</head>
<body>
  <div class="global">
    <div class="mit">
      <img class="img" src="<?= base_url("assets/img/footer.png"); ?>">     
      <img class="img2" src="<?= base_url("assets/img/icino.png"); ?>">     
    </div>
    <div class="mit1">
    <?php echo form_open_multipart('CLogin/login'); ?>                                                             
        <?php if (isset($msg)) { ?>
          <!-- Presentacion del mensajes de error--><br>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong> Error !</strong> <?= $msg ?>
          </div>
        <?php } ?> 
      
     <div class="login">
      <div >
    
      </div>
      <h1 class="text" >Inició de sesion</h1>
      <img class="lado" src="<?= base_url("assets/img/buena-8.png"); ?>" alt="Don buena">
      <img class="lados" src="<?= base_url("assets/img/medis1-removebg-preview (1).png"); ?>" alt="Don buena">
      <div class="login1">
       
        <label for="login">Usuario</label>
        <input type="text" placeholder="Usuario" required="required"  id="login" name="log">
        <label for="pwd">Contraseña</label>
        <input type="password" placeholder="Contraseña" required="required"  id="pwd" name="pwd">
        <button type="submit" class="ov-btn-slide-left">Ingresar al Sistema</button>

      </div>
  
     </div>
 
    </div>
  </div>
</body>
</html>
