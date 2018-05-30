<?php 
    class db{
        
        //host
        private $host = 'localhost';
        
        //usuario
        private $usuario = 'root';
        
        //senha
        private $senha = '';
        
        //banco
        private $database = 'twitter_clone';
        
        
        function conecta_mysql(){
            
            //criar a conexao
            $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
            
            //ajustar charset de comunicacao entre a aplicacao e o banco
            mysqli_set_charset($con, 'utf-8');
            
            //verifica erro conexao
            if(mysqli_connect_errno()){
                echo 'erro ao tentar se conectar com o mySQL: '.mysqli_connect_error();
            }
            
            return $con;
        }
    }


?>