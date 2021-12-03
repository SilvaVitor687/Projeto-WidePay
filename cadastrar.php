<?php

    require __DIR__.'/vendor/autoload.php';

    //Constante para mudar o Titulo da tela de cadastro...
    define('TITLE','Cadastrar Vaga');

    use \App\Entity\Crud;
    use \App\Session\Login;

        //Obriga o usuário estar logado;
        Login::requireLogin();
    $obCrud = new Crud;

    if(isset($_POST['campNome'], $_POST['campLink'])) {
        
        $obCrud->nome  = $_POST['campNome'];
        $obCrud->link = $_POST['campLink'];
        $obCrud->cadastrar();

        header('location: index.php?status=success');
        exit;
        
    }

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';

?>