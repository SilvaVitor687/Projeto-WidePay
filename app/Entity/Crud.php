<?php

    namespace App\Entity;

    use \App\Db\Database;
    use \PDO;

    class Crud {
        public $id;
        public $nome;
        public $link;

        //Metodo responsavel por Cadastrar a vaga no Banco

        public function cadastrar(){

            $obDatabase = new Database('crud');
            $this->id = $obDatabase->insert([
                                            'nome'=> $this->nome,
                                            'link' => $this->link
                                            ]);
            return true;
        }

        //Metodo responsavel por atualizar o cadastro no Banco

        public function atualizar(){
            return (new Database('crud'))->update('id = '
            .$this->id,[
                        'nome'    => $this->nome,
                        'link' => $this->link
                                                                        
                        ]);
          }

        // Método responsável por excluir o cadastro do banco 
   
        public function excluir(){
            return (new Database('crud'))->delete('id = '.$this->id);
            }


        public static function getCrud($where = null, $order = null, $limit = null){
            return (new Database('crud'))->select($where,$order,$limit)
                                  ->fetchAll(PDO::FETCH_CLASS,self::class);
            }

        
        public static function getCruds($id){
            return (new Database('crud'))->select('id = '.$id)
                                          ->fetchObject(self::class);
            }
} 

?>