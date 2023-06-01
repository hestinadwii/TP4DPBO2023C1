<?php
include_once("connection.php");
include_once("models/Divisi.php");
include_once("views/Divisi.view.php");
include_once("views/insertDivisi.view.php");
include_once("views/updateDivisi.view.php");

class DivisiController {
  private $divisi;

  function __construct(){
    $this->divisi = new Divisi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->divisi->open();
    $this->divisi->getDivisi();
    $data = array();
    while($row = $this->divisi->getResult()){
      array_push($data, $row);
    }

    $this->divisi->close();

    $view = new DivisiView();
    $view->render($data);
  }
  
  function add($data){
    $this->divisi->open();
    $this->divisi->add($data);
    $this->divisi->close();
    
    header("location:divisi.php");
  }

  function update($id, $data){
    $this->divisi->open();
    $this->divisi->update($id, $data);
    $this->divisi->close();
    
    header("location:divisi.php");
  }

  function delete($id){
    $this->divisi->open();
    $this->divisi->delete($id);
    $this->divisi->close();
    
    //header("location:divisi.php");
  }

  function formInsert()
  {
    $this->divisi->open();
    $this->divisi->getDivisi();
    $data = array();
    while ($row = $this->divisi->getResult()) {
      array_push($data, $row);
    }
    $this->divisi->close();
    $view = new insertView();
    $view->render($data);
  }

  function formUpdate($id) 
  {
    $this->divisi->open();
    $this->divisi->getDivisiById($id);
    $dataDivisi = array();
    while ($temp = $this->divisi->getResult()) {
      array_push($dataDivisi, $temp);
    }
    $this->divisi->close();
    $view = new UpdateView();
    $view->render($dataDivisi);
  }
}