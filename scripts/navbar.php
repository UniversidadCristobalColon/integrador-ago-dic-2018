<?php
 $tsesion= $_SESSION['correo']['id_tipo_usuario'];
$user=$_SESSION['correo']['nombre_corto'];

$usuario = !empty($_SESSION["user_name"]) ? $_SESSION["user_name"] : 'Usuario';

$doc_root   = $_SERVER["DOCUMENT_ROOT"];
var_dump($doc_root);
$realpath   = str_replace('\\', '/', realpath ("."));
var_dump($realpath);
$base       = str_replace($doc_root, '', $realpath);
var_dump($base);
$pos        = strpos($base, '/',1);
$base       = substr($base,0, $pos);
var_dump($base);
$base       == '/' ? '' : $base;

$navbar_admin = '<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <span class="navbar-brand">Sarx</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Gestión</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Inventario</a>
                    <a class="dropdown-item" href="'. $base .'/admin/pos/ingresos/">Ingresos</a>
                    <a class="dropdown-item" href="'. $base .'/admin/pos/egresos/">Egresos</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown02" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Catálogos</a>
                <div class="dropdown-menu" aria-labelledby="dropdown02">
                    <a class="dropdown-item" href="'. $base .'/admin/catalogos/clientes/">Clientes</a>
                    <a class="dropdown-item" href="'. $base .'/admin/catalogos/disciplinas/">Disciplinas</a>
                    <a class="dropdown-item" href="'. $base .'/admin/catalogos/rutinas/">Rutinas</a>
                    <a class="dropdown-item" href="'. $base .'/admin/catalogos/usuarios/">Usuarios</a>
                </div>
            </li>
            <li class="nav-item">

                <a class="nav-link" href="'. $base .'/admin/consultas/">Consultas</a>
            </li>                                      
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">'.$user.'</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="'. $base .'/user/perfil/">Perfil</a>
                        <a class="dropdown-item" href="'. $base .'/logout.php">Salir</a>
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
                <a class="nav-link" href="'. $base .'/user/clases/">Clases</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">'.$usuario.'</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="'. $base .'/user/perfil/">Perfil</a>
                        <a class="dropdown-item" href="'. $base .'/logout.php">Salir</a>
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