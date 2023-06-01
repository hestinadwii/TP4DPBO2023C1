<?php

class InsertView
{
    public function render($data)
    {
        $dataOption = '<option value="">Pilih Divisi</option>';
        foreach ($data as $temp) {
            $dataOption .= '<option value="' . $temp['id_divisi'] . '">' . $temp['nama_divisi'] . '</option>';
        }

        $dataForm = null;
        $dataForm = '
            <label for="name">Nama</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" required>
            
            <label for="jabatan">Jabatan</label>
            <input type="text" id="jabatan" name="jabatan" required>

            <label for="id_divisi">Nama Divisi</label>
            <select id="id_divisi" name="id_divisi" required>' . $dataOption .
            '</select>
            
            <button type="submit" class="btn btn-info text-white" name="btn-submit" id="btn-submit" style="margin-top: 15px;">Submit</button>';

        $view = new Template("templates/insert.html");
        $view->replace("DATA_LINK", "insert.php");
        $view->replace("DATA_TITLE", "Karyawan");
        $view->replace("DATA_JENIS", "Add");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }
}