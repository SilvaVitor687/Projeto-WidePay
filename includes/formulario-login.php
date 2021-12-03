<?php

    $alertLogin = strlen($alertLogin) ? '<div class="alert alert-danger">' .$alertLogin.'</div>' : '';

    $alertCadastro = strlen($alertCadastro) ? '<div class="alert alert-danger">' .$alertCadastro.'</div>' : '';

?>



<div class="jumbotron text-dark " style="width: 80%; margin-left: 120px;background: white;border-radius:10px" >
    <div class="row">
        <div class="col">

            <form method="post">

            <h4>Login de Usuário</h4><br>
            <hr>

            <?=$alertLogin?>

            <div class="form-group">
                <label style="color: darkblue;">Login</label>
                <input style="width: 50%;" type="text" name="user_login" class="form-control">
            </div>

            <div class="form-group">
                <label style="color: darkblue;">Senha</label>
                <input style="width: 50%;" type="password" name="senha" class="form-control">
            </div><br>

            <div class="form-group">
                <button type="submit" name="acao" value="logar" class="btn btn-primary">Entrar</button>
            </div>

            </form>

            </div>

            <div class="col">

            <form method="post">

                <h4>Cadastre-se</h4><br>
                <hr>

                <?=$alertCadastro?>

                <div class="form-group">
                    <label style="color: darkblue;">Nome</label>
                    <input style="width: 50%;" type="text" name="nome" class="form-control">
                </div>

                <div class="form-group">
                    <label style="color: darkblue;">Login</label>
                    <input style="width: 50%;" type="text" name="user_login" class="form-control">
                </div>

                <div class="form-group">
                    <label style="color: darkblue;">Senha</label>
                    <input style="width: 50%;" type="password" name="senha" class="form-control">
                </div><br>

                <div class="form-group">
                    <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar</button>
                </div>

                </form>
            </div>

        </div>
    </div>
</div>

