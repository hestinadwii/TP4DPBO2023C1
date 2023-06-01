<?php

include_once('models/DB.php');
include_once('models/Template.php');
include_once('controllers/Divisi.controller.php');

$divisi = new DivisiController();
$divisi->index();

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    if ($id > 0) {
        $divisi->delete($id);
    }
}
?>
