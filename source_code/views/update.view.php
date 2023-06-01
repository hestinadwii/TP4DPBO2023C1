<?php

class UpdateView
{
    public function render($dataDivisi, $dataKaryawan)
    {
        // buat option untuk select
        $dataOption = null;
        foreach ($dataDivisi as $temp) {
            if ($temp['id_divisi'] == $dataKaryawan[0]['id_divisi']) {
                $dataOption .= '<option value="' . $temp['id_divisi'] . '" selected>' . $temp['nama_divisi'] . '</option>';
            } else {
                $dataOption .= '<option value="' . $temp['id_divisi'] . '">' . $temp['nama_divisi'] . '</option>';
            }
        }

        $dataForm = null;
        $dataForm = '
            <input type="hidden" name="id" value="' . $dataKaryawan[0]['id'] . '" >

            <label for="nama">Nama</label>
            <input type="text" id="name" name="name" value="' . $dataKaryawan[0]['name'] . '" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="' . $dataKaryawan[0]['email'] . '" required>
            
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone"  value="' . $dataKaryawan[0]['phone'] . '" required>
            
            <label for="jabatan">Jabatan</label>
            <input type="text" id="jabatan" name="jabatan"  value="' . $dataKaryawan[0]['jabatan'] . '" required>

            <label for="id_divisi">Nama Divisi</label>
            <select id="id_divisi" name="id_divisi" required>' . $dataOption .
            '</select>
            
            <button type="submit" class="btn btn-info text-white" name="btn-update" id="btn-submit" style="margin-top: 15px;">Submit</button>';

        $view = new Template("templates/insert.html");
        $view->replace("DATA_LINK", "insert.php");
        $view->replace("DATA_TITLE", "Karyawan");
        $view->replace("DATA_JENIS", "Update");
        $view->replace("DATA_FORM", $dataForm);
        $view->write();
    }
}