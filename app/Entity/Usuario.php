<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuario{

    public $id;
    public $nome;
    public $user_login;
    public $senha;

    public function cadastrar(){

        $obDatabase = new Database('usuarios');

        $this->id = $obDatabase->insert([
            'nome' => $this->nome,
            'user_login' => $this->user_login,
            'senha' => $this->senha
        ]);

        return true;
    }

    public static function getUsuario ($user_login){

        return (new Database('usuarios'))->select('user_login = "'.$user_login.'"')->fetchObject(self::class);


    }


}




?>