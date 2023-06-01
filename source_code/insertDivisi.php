<?php
include_once("models/Template.php");
include_once("models/DB.php");
include_once("controllers/Divisi.controller.php");

$divisi = new DivisiController();

if (isset($_POST['btn-submit'])) {
    $divisi->add($_POST);
} else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($id > 0) {
        $divisi->formUpdate($id);
    }
} else if (isset($_POST['btn-update'])) {
    $id = $_POST['id'];
    $divisi->update($id, $_POST);
} else {
    $divisi->formInsert();
}