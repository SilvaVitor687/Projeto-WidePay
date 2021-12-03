<?php

require __DIR__.'/vendor/autoload.php';

use App\Entity\Usuario;
use \App\Session\Login;

    //Obriga o usuário a não estar logado;
    Login::requireLogout();


    //Alertas de Mensagens dos cadastros...
    $alertLogin = '';
    $alertCadastro = '';

    // Condição para efetuar o Login
    if(isset($_POST['acao'])){

     
          switch ($_POST['acao']){
            case'logar':
              
             $obUsuario = Usuario::getUsuario($_POST['user_login']);

             if(!$obUsuario instanceof Usuario || password_verify($_POST['senha'],$obUsuario->senha)){
               $alertLogin = 'Login ou Senha Incorreto';
               break;
             }

              Login::login($obUsuario);
              break;

              case'cadastrar':

                

                if(isset($_POST['nome'], $_POST['user_login'], $_POST['senha'])){

                  $obUsuario = Usuario::getUsuario($_POST['user_login']);

                  if($obUsuario instanceof Usuario){
                    $alertCadastro= 'O Login digitado já estar em uso';
                    break;

                  }

                  $obUsuario = new Usuario;
                  $obUsuario->nome = $_POST['nome'];
                  $obUsuario->user_login = $_POST['user_login'];
                  $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                  $obUsuario->cadastrar();
    
                }

                Login::login($obUsuario);
                break;
              
              }
    }

    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/formulario-login.php';
    include __DIR__.'/includes/footer.php';

?>

