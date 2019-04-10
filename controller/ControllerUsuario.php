<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerUsuario
 *
 * @author Neturno
 */
require_once 'model/dao/UsuarioDao.php';

class ControllerUsuario{

    public function realizarLogin($usuario, $pass){
            
        $login = $usuario;

        $senha = base64_encode($pass);

        $usuarioDao = new UsuarioDao();

        $result = $usuarioDao->realizarLogin($login, $senha);

        if(!$result){

            echo "<script>alert('Login e/ou senha incorretos!');</script>";

            echo "<script>window.location = 'index.php';</script>";
            
        }else{
            
            if(!isset($_SESSION)) session_start();
            
            if($result[7] == 1){

                $_SESSION['idadmin']    = $result[0];

                echo "<script>alert('Login realizado com sucesso!');</script>";

                echo "<script>window.location = 'view/admin/home.php';</script>";

            }elseif($result[7] == 2){

                $_SESSION['idcliente']    = $result[0];
                

                echo "<script>alert('Login realizado com sucesso!');</script>";

                echo "<script>window.location = 'view/cliente/home.php';</script>";					

            }elseif($result[7] == 3){

                $_SESSION['idprofissional']    = $result[0];

                echo "<script>alert('Login realizado com sucesso!');</script>";

                echo "<script>window.location = 'view/profissional/home.php';</script>";					

            }

        }

    }

}
