<?php
	
require_once 'class/Cliente.php';
require_once 'class/Administrador.php';
require_once 'controller/ControllerUsuario.php';
require_once 'controller/ControllerCliente.php';

if(!isset($_SESSION)) session_start();
if(isset($_SESSION['idcliente']))   $id = $_SESSION['idcliente'];
if(isset($_SESSION['idadmin']))     $id = $_SESSION['idadmin'];
if(isset($_SESSION['idfisico']))    $id = $_SESSION['idfisico'];
if(isset($_SESSION['idjuridico']))  $id = $_SESSION['idjuridico'];

// caso receba dados via POST ou GET
if( isset($_POST) && !empty($_POST) || isset($_GET) && !empty($_GET)){

    if((isset($_FILES['foto']['size']) && $_FILES['foto']['size'] != 0) || (isset($_FILES['logo']['size']) && $_FILES['logo']['size'] != 0)){
        $aFile = $_FILES;
    } else {
        $aFile = null;
    }

    $dados  = $_POST;

    $classe = $dados['classe'];

    $metodo = $dados['metodo'];

    $nameController = "Controller".$classe;

    $controller = new $nameController;

    switch ($metodo) {

        case 'listar':

            $controller->listar();
            
            break;

        case 'salvar':

            $controller->cadastrar($dados, $aFile);


            break;

        case 'editar':

            $controller->editar($dados, $id, $aFile);

            break;

        case 'desativar':

            $controller->desativar($id);

            break;

        case 'realizarLogin':

            $controller->realizarLogin($dados['login'], $dados['senha']);

            break;

        default:

            $msg = "Método não encontrado";

            echo $msg;

            break;
    }


}
