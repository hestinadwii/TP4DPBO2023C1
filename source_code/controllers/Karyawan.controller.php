<?php
include_once("Connection.php");
include_once("models/Divisi.php");
include_once("models/Karyawan.php");
include_once("views/Karyawan.view.php");
include_once("views/insert.view.php");
include_once("views/update.view.php");

class KaryawanController {
  private $karyawan;
  private $divisi;

  function __construct(){
    $this->karyawan = new Karyawan(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->divisi = new Divisi(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->karyawan->open();
    $this->karyawan->getKaryawanJoin();
    $data = array();
    while($row = $this->karyawan->getResult()){
      array_push($data, $row);
    }

    $this->karyawan->close();

    $view = new KaryawanView();
    $view->render($data);
  }
  
  function add($data){
    $this->karyawan->open();
    $this->karyawan->add($data);
    $this->karyawan->close();
    
    header("location:index.php");
  }

  function update($id, $data){
    $this->karyawan->open();
    $this->karyawan->update($id, $data);
    $this->karyawan->close();
    
    header("location:index.php");
  }

  function delete($id){
    $this->karyawan->open();
    $this->karyawan->delete($id);
    $this->karyawan->close();
    
    //header("location:index.php");
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
    $view = new InsertView();
    $view->render($data);
  }
  
  function formUpdate($id) 
  {
    $this->divisi->open();
    $this->divisi->getDivisi();

    $dataDivisi = array();
    while ($row = $this->divisi->getResult()) {
      array_push($dataDivisi, $row);
    }
    $this->divisi->close();

    $this->karyawan->open();
    $this->karyawan->getKaryawanById($id);
    $dataKaryawan = array();
    while ($temp = $this->karyawan->getResult()) {
      array_push($dataKaryawan, $temp);
    }
    $this->karyawan->close();
    $view = new UpdateView();
    $view->render($dataDivisi, $dataKaryawan);
  }
}