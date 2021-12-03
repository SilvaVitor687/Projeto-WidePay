<?php

    $mensagem = '';
    if(isset($_GET['status'])){
        switch ($_GET['status']) {
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação Executado com Sucesso !</div>';
                break;

            case 'error':
                $mensagem = '<div class="alert alert-danger">Ação não Foi Executada !</div>';
                    break;
        }
    }

    $resutados = '';
    foreach($crud as $crud){

        $resutados .=' <tr ">
                       <td>'.$crud->id.'</td>
                       <td>'.$crud->nome.'</td> 
                       <td>'.$crud->link.'</td>
                       <td>
                            <a href="editar.php?id=' .$crud->id.'">
                            <button type="button" class="btn btn-primary">Editar</button>
                            </a>

                            <a href="excluir.php?id=' .$crud->id.'">
                            <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                       </td>
                       </tr>  
        ';
    }


?>

<main>

<?=$mensagem?>

<section>
<table class="table bg-light mt-3">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome Completo</th>
                <th>Link URls</th>
                <th>Ações</th>
                
            </tr>
        </thead>
        <tbody id="tbody">

            <?=$resutados?>
            
        </tbody>
        
    </table>
</section>
<section>
        <a href="cadastrar.php">
            <button class="btn btn-sucess" style="background: darkblue;font-weight:bold;color:bisque;margin-left: -2px"> Novo Cadastro</button>
        </a>
</section>


</main>