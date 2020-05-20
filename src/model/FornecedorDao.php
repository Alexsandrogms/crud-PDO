<?php

require_once 'Connection.php';
require_once 'Fornecedor.php';

class FornecedorDao
{
  public function createUser(Fornecedor $f)
  {
    $query = 'INSERT INTO fornecedor SET nome = ?, email = ?, cnpj = ?, status = ?, img_url = ?';

    $stmt = Connection::getConnection()->prepare($query);
    $stmt->bindValue(1, $f->getName());
    $stmt->bindValue(2, $f->getEmail());
    $stmt->bindValue(3, $f->getCNPJ());
    $stmt->bindValue(4, $f->getState());
    $stmt->bindValue(5, $f->getImgUrl());
    $stmt->execute();
  }

  public function getUser($id = null)
  {
    $query = "";

    $id ? $query = 'SELECT * FROM fornecedor WHERE cod = ?'
      : $query = 'SELECT * FROM fornecedor';

    $stmt = Connection::getConnection()->prepare($query);
    $id ? $stmt->bindValue(1, $id) : false;
    $stmt->execute();

    if ($stmt->rowCount()) {
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    } else {
      return [];
    }
  }

  public function updateUser(Fornecedor $f, int $id)
  {
    $query = 'UPDATE fornecedor SET nome = ?, email = ?, cnpj = ?, status = ?, img_url = ? WHERE cod = ?';

    $stmt = Connection::getConnection()->prepare($query);
    $stmt->bindValue(1, $f->getName());
    $stmt->bindValue(2, $f->getEmail());
    $stmt->bindValue(3, $f->getCNPJ());
    $stmt->bindValue(4, $f->getState());
    $stmt->bindValue(5, $f->getImgUrl());
    $stmt->bindValue(6, $id);
    $stmt->execute();
  }
  public function deleteUser(int $id)
  {
    $query = 'DELETE FROM fornecedor WHERE cod = ?';

    $stmt = Connection::getConnection()->prepare($query);
    $stmt->bindValue(1, $id);
    $stmt->execute();
  }
}
