<?php

namespace App\Session;

class Login{

    private static function init(){

        if(session_status() !== PHP_SESSION_ACTIVE){

            session_start();
        }
    }

    public static function getusuarioLogado(){

        self::init();
        return self::isLogged() ? $_SESSION['usuario'] : null;

    }

    public static function login($obUsuario){
        self::init();

        //Sessão de Usuário
        $_SESSION['usuario'] = [
            'id'=> $obUsuario->id,
            'nome' => $obUsuario->nome,
            'user_login' => $obUsuario->user_login
        ];
       
            header('location: index.php');
            exit;

    }

    //Deslogar o usuário;

    public static function logout(){

        self::init();

        unset($_SESSION['usuario']);

        header('location: login.php');
        exit;
    }

    //Método de verficação se estar logado o usuário

    public static function isLogged(){

        self::init();

        //Validação da Sessão
        return isset($_SESSION['usuario']['id']);

    }

    public static function requireLogin() {

        //Método que obriga o usuário executar o login.

        if(!self::isLogged()){
            header('Location: login.php');
            exit;
        }
    }

    public static function requireLogout() {

        //Método que obriga o usuário estar deslogado para acessar.

        if(self::isLogged()){
            header('Location: index.php');
            exit;
        }
    }

   
}


?>