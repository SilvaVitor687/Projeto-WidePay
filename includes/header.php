<?php

use \App\Session\Login;

$usuarioLogado = Login::getUsuarioLogado();

$usuario = $usuarioLogado ? 
  $usuarioLogado ['nome']. ' <a href="logout.php" class="text-light font-weight-bold ml-2" > Sair </a>': 
  ' Visitante <a href="login.php" class="text-light font-weight-bold ml-2 "> Entrar </a>';

?>

<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/Style.css">
    <link rel="stylesheet" href="/css/footer-white.css">

    <title>Projeto Wide PAY</title>
  </head>
  <body>
    

  <div style="margin-top:10px" class="container">
        <div class="jumbotron">
            <h1>PROJETO WidePAY</h1>
           <hr class="border-light">

           <div class="d-flex justify-content-start">
             <?=$usuario?>
           </div>

        </div>
        

