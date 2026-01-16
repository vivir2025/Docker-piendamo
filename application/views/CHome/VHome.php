<!-- View of the home page where it welcomes the blogged user -->
<MARQUEE> 
    <h4  id=mover style="color:#FFFFFF";>Bienvenido: <?= $this->session->userdata('nom_user'); ?></h4>
</MARQUEE>

<div class="centra">
    
    <img class="contenedor" width= 85% height="550" src="<?= base_url("assets/img/foooo.png"); ?>"> 
    <div class="barra"></div>
</div>

<style>
     @media (max-width: 767px) {
      /* Ocultar .mit cuando el ancho de la pantalla sea menor a 768px */
      .contenedor {
        display: none;
      }
      /* Ajustar el ancho de .mit1 para ocupar toda la pantalla */
      .centra {
        flex: 1 100%;
        background: linear-gradient(20deg, #2a327d, #2a327d, #166a28, #166a28, #2a327d, #2a327d);
        
       
        
      }
    }
.centra {
  display: flex;
 justify-content: center;
 align-content: center;
   

    }
.contenedor {
        
border: 2px solid white;
box-shadow: 2px 2px 4px 4px;
border-radius: 10px;
padding-bottom: 5px;


}

#mover:hover { 
    -webkit-transform:scale(1.3);transform:scale(1.1);
   overflow:hidden;

 
} 

</style>


