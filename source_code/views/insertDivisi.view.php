<?php

class InsertView
{
    public function render($data)
    {
        $dataForm = null;
        $dataForm = '
            <label for="nama_divisi">Nama Divisi</label>
            <input type="text" id="nama_divisi" name="nama_divisi" required>

            
            <button type="submit" class="btn btn-info text-white" name="btn-submit" id="btn-submit" style="margin-top: 15px;">Submit</button>';

        $view = new Template("templates/insert.html");
        $view->replace("DATA_LINK", "insertDivisi.php");
        $view->replace("DATA_TITLE", "Divisi");
        $view->replace("DATA_JENIS", "Add");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }
}