<?php
 $tsesion= $_SESSION['correo']['id_tipo_usuario'];
$user=$_SESSION['correo']['nombre_corto'];

$usuario = !empty($_SESSION["user_name"]) ? $_SESSION["user_name"] : 'Usuario';

$navbar_admin = '<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <span class="navbar-brand">Sarx</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Gestión</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Inventario</a>
                    <a class="dropdown-item" href="#">Ingresos</a>
                    <a class="dropdown-item" href="#">Egresos</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Clases</a>
            </li>                      
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">'.$user.'</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Perfil</a>
                        <a class="dropdown-item" href="int7/salir.php">Salir</a>                        
                    </div>
                </li>                                
            </ul>
        </form>
    </div>
</nav>';

$navbar_clientes = '<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Sarx</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">            
            <li class="nav-item">
                <a class="nav-link" href="#">Clases</a>
            </li>                      
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">'.$user.'</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Perfil</a>
                        <a class="dropdown-item" href="int7/salir.php">Salir</a>                        
                    </div>
                </li>                                
            </ul>
        </form>
    </div>
</nav>';

//$navbar = 1 == 1 ? $navbar_admin : $navbar_clientes;

//echo $navbar;



if(isset($_SESSION['correo'])){
    
    if($_SESSION['correo']['id_tipo_usuario'] == "1"){
     echo $navbar_admin;  
        
    }else{
        echo $navbar_clientes; 
    }
    
}else{
   header('Location: ../index.php');   
}

?>