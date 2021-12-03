<?php

    require __DIR__.'/vendor/autoload.php';

    use \App\Entity\Crud;
    use \App\Session\Login;

    //Obriga o usuário estar logado;
    Login::requireLogin();

    $crud = Crud::getCrud();


    include __DIR__.'/includes/header.php';
    include __DIR__.'/includes/listagem.php';
    include __DIR__.'/includes/footer.php';

?>