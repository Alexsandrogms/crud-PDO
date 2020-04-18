<?php

require_once 'Connection.php';

//* Criando o banco de dados para qual será usado
class Database {
    public static function CreateDb() {
        try {
            //* Nome do banco de dados
            $dbname = 'crud_pdo';
            //* Estabelecendo conexão ao servidor do banco
            $connection = Connection::getConn();        
            
            //* Comando sql para criação do banco de dados
            $verify = $connection->exec(
                "CREATE DATABASE IF NOT EXISTS `$dbname`;
                CREATE TABLE IF NOT EXISTS `$dbname`.`fornecedor` (
                    cod INT(11) NOT NULL AUTO_INCREMENT,
                    nome VARCHAR(80) NOT NULL,
                    email VARCHAR(80) NOT NULL,
                    cnpj VARCHAR(14) NOT NULL,
                    status INT(1) NOT NULL,
                    PRIMARY KEY (cod)
                )"
            );
    
            //* Verificamos se a base de dados foi criada com sucesso
            if ($verify) {
                echo 'Comandos MySQL executados com sucesso!';
                $_SESSION['sucess'] = '';
            } else {
                echo 'Verifique se o banco já existe!';
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
        } catch (\PDOStatement $e) {
            echo $e;
        }
    }
}

$create = Database::CreateDb();
if (isset($_SESSION['sucess'])) {
    header('Location: ../../index.php');
}
?>
