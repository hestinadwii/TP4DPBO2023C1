<?php
include_once("models/Template.php");
include_once("models/DB.php");
include_once("controllers/Karyawan.controller.php");

$karyawan = new KaryawanController();

if (isset($_POST['btn-submit'])) {
    $karyawan->add($_POST);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $karyawan->formUpdate($id);
    }
} else if (isset($_POST['btn-update'])) {
    $id = $_POST['id'];
    $karyawan->update($id, $_POST);
} else {
    $karyawan->formInsert();
}