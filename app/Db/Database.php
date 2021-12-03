<?php

namespace App\Db;

    use \PDO;
    use \PDOException;

class Database {

        const HOST = 'localhost';
        const NAME = 'db_widepay';
        const USER = 'root';
        const PASS = "";

        private $table;

        private $connection;

        public function __construct($table = null){
            $this->table = $table;
            $this->setConnection();
          }

          private function setConnection(){
            try{
              $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
              $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
              die('ERROR: '.$e->getMessage());
            }
          }

          public function execute($query,$params = []){
            try{
              $statement = $this->connection->prepare($query);
              $statement->execute($params);
              return $statement;
            }catch(PDOException $e){
              die('ERROR: '.$e->getMessage());
            }
          }

          public function insert($values){
            //DADOS DA QUERY
            $fields = array_keys($values);
            $binds  = array_pad([],count($fields),'?');
        
            //MONTA A QUERY
            $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        
            //EXECUTA O INSERT
            $this->execute($query,array_values($values));
        
            //RETORNA O ID INSERIDO
            return $this->connection->lastInsertId();
          }

       public function select($where = null, $order = null, $limit = null, $fields = '*'){
            //DADOS DA QUERY
            $where = strlen($where) ? 'WHERE '.$where : '';
            $order = strlen($order) ? 'ORDER BY '.$order : '';
            $limit = strlen($limit) ? 'LIMIT '.$limit : '';

            //MONTA A QUERY
            $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

            //EXECUTA A QUERY
            return $this->execute($query);
  }

    //Metodo responsavel por executar a atualização do Cadastro no Banco

    public function update($where,$values){
        //DADOS DA QUERY
        $fields = array_keys($values);
    
        //MONTA A QUERY
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
    
        //EXECUTAR A QUERY
        $this->execute($query,array_values($values));
    
        //RETORNA SUCESSO
        return true;
      }

    //Metodo responsavel por executar a a remoção do Cadastro no Banco

    public function delete($where) {

        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        $this->execute($query);

        return true;
 
    }

}

?>