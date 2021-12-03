<main>

    <h2 class="mt-3"><?=TITLE?></h2>

    <form method="post">
    <div class="form-group">
      <label>Nome Completo</label><hr>
      <input type="text" name="campNome"  value="<?=$obCrud->nome?>">
    </div>
    <br><br>

    <div class="form-group">
      <label>LINK</label> <hr>
      
      <input type="link" name="campLink" value="<?=$obCrud->link?>">
    </div>
    <br>


    </div>

        <div class="form-group" style="margin-top: 30px;margin-left: -8px">
        <button type="submit" class="btn btn-sucess" style="background: darkblue;font-weight:bold; margin-top: 14px; margin-left: 125px;color:bisque"> Enviar</button>

        <a href="index.php" >
            <input style="background: white;font-weight:bold; padding: 2.5px; width: 90px" type="button" value="Voltar"></a>
        </div>
    </form>

</main>