<?php

class UpdateView
{
    public function render($dataDivisi)
    {
        $dataForm = null;
        $dataForm = '
            <input type="hidden" name="id" value="' . $dataDivisi[0]['id_divisi'] . '" >

            <label for="nama">Nama Divisi</label>
            <input type="text" id="nama_divisi" name="nama_divisi" value="' . $dataDivisi[0]['nama_divisi'] . '" required>
            
            <button type="submit" class="btn btn-info text-white" name="btn-update" id="btn-submit" style="margin-top: 15px;">Submit</button>';

        $view = new Template("templates/insert.html");
        $view->replace("DATA_LINK", "insertDivisi.php");
        $view->replace("DATA_TITLE", "Divisi");
        $view->replace("DATA_JENIS", "Update");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }
}