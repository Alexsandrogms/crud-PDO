<?php

class Fornecedor
{
  private $name;
  private $email;
  private $cnpj;
  private $state;
  private $img_url;

  public function getName()
  {
    return $this->name;
  }

  public function setName(string $name)
  {
    $this->name = $name;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail(string $email)
  {
    $this->email = $email;
  }

  public function getCNPJ()
  {
    return $this->cnpj;
  }

  public function setCNPJ(int $cnpj)
  {
    $this->cnpj = $cnpj;
  }

  public function getState()
  {
    return $this->state;
  }

  public function setState(int $state)
  {
    $this->state = $state;
  }

  public function getImgUrl()
  {
    return $this->img_url;
  }

  public function setImgUrl(string $url)
  {
    $this->img_url = $url;
  }
}
