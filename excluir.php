<?php

require __DIR__.'/vendor/autoload.php';

use App\Entity\Crud;
use \App\Session\Login;

    //Obriga o usuário estar logado;
    Login::requireLogin();

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
  }
  
  //CONSULTA A Cadastro
  $obCrud = Crud::getCruds($_GET['id']);
  
  //VALIDAÇÃO DA Cadastro
  if(!$obCrud instanceof Crud){
    header('location: index.php?status=error');
    exit;
  }
  
  //VALIDAÇÃO DO POST
  if(isset($_POST['excluir'])){
  
    $obCrud->excluir();
  
    header('location: index.php?status=success');
    exit;
  }
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';

?>