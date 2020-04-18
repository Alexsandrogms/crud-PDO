<?php

require_once 'Connection.php';
require_once 'Fornecedor.php';

class FornecedorDao {
    //* Criando um método para adicionar os dados ao banco de dados
    public function create(Fornecedor $p) {
        try {
            //* Comando sql para adicionar
            $sql = 'INSERT INTO fornecedor(nome, email, cnpj, status) VALUES (?, ?, ?, ?)';
            //* Instanciando método da classe Connection para conectar no banco de dados e preparar a consulta '$sql' para o banco
            $stmt = Connection::getConn()->prepare($sql);
            //* Pegando valores que foram setados na classe Fornecedor para inserir no banco
            $stmt->bindValue(1, $p->getNome());
            $stmt->bindValue(2, $p->getEmail());
            $stmt->bindValue(3, $p->getCnpj());
            $stmt->bindValue(4, $p->getStatus());
            //* Executando a consulta no banco de dados
            $stmt->execute();
            //* Tratando os possiveis erros. 
        } catch (\PDOException $e) {
            echo $e->getMessage();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
    //* Criando um método para listar os dados ao banco de dados
    public function read() {
        try {
            //* Comando sql para listar
            $sql = 'SELECT * FROM fornecedor';
            //* Instanciando método da classe Connection para conectar no banco de dados e preparar a consulta '$sql' para o banco
            $stmt = Connection::getConn()->prepare($sql);
            //* Executando a consulta no banco de dados
            $stmt->execute();
            //* Varificando a quantidades de linhas no banco de dados
            if($stmt->rowCount()) {
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            } else {
                return [];
            }
            //* Tratando os possiveis erros. 
        } catch (\PDOException $e) {
            echo $e->getMessage();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }  
    }
    //* Criando um método para atualizar dados no banco de dados
    public function update(Fornecedor $p) {
        try {
            //* Comando sql para atualizar registro especifico no banco de dados.
            $sql = 'UPDATE fornecedor SET nome = ?, email = ?, cnpj = ?, status = ? WHERE cod = ?';
            //* Instanciando método da classe Connection para conectar no banco de dados e preparar a consulta '$sql' para o banco
            $stmt = Connection::getConn()->prepare($sql);
            //* Pegando valores que foram setados na classe Fornecedor para inserir no banco
            $stmt->bindValue(1, $p->getNome());
            $stmt->bindValue(2, $p->getEmail());
            $stmt->bindValue(3, $p->getCnpj());
            $stmt->bindValue(4, $p->getStatus());
            $stmt->bindValue(5, $p->getCod());
            //* Executando a consulta no banco de dados
            $stmt->execute();
            //* Tratando os possiveis erros.
        } catch (\PDOException $e) {
            echo $e->getMessage();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
        

    }
    //* Criando um método para deletar dados no banco de dados
    public function delete(Fornecedor $p) {
        try {
            //* Comando sql para deletar registro especifico no banco de dados.
            $sql = 'DELETE FROM fornecedor WHERE cod = ?';
            //* Instanciando método da classe Connection para conectar no banco de dados e preparar a consulta '$sql' para o banco
            $stmt =Connection::getConn()->prepare($sql);
            //* Pegando valores que foram setados na classe Fornecedor para inserir no banco
            $stmt->bindValue(1, $p->getCod());
            //* Executando a consulta no banco de dados
            $stmt->execute();
            //* Tratando os possiveis erros.
        } catch (\PDOException $e) {
            echo $e->getMessage();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
        //* Criando um método para listar dados especificos no banco de dados
        public function readWhere($id) {
            try {
                //* Comando sql para listar
                $sql = 'SELECT * FROM fornecedor WHERE cod = ?';
                //* Instanciando método da classe Connection para conectar no banco de dados e preparar a consulta '$sql' para o banco
                $stmt = Connection::getConn()->prepare($sql);
                //* Pegando valor passando como parametro do método
                $stmt->bindValue(1, $id);
                //* Executando a consulta no banco de dados
                $stmt->execute();
                //* Varificando a quantidades de linhas no banco de dados
                if($stmt->rowCount()) {
                    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    return $resultado;
                } else {
                    return [];
                }
                //* Tratando os possiveis erros. 
            } catch (\PDOException $e) {
                echo $e->getMessage();
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }  
        }
}