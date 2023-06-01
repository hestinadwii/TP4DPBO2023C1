<?php

  class KaryawanView {
    public function render($data){
        $no = 1;
        $dataKaryawan = null;
        $dataDivisi = null;
        foreach($data as $val){
            $dataKaryawan .= "<tr>
            <td>" . $no++ . "</td>
            <td>" . $val['name'] . "</td>
            <td>" . $val['email'] . "</td>
            <td>" . $val['phone'] . "</td>
            <td>" . $val['jabatan'] . "</td>
            <td>" . $val['nama_divisi'] . "</td>
            <td style='font-size: 22px;'>
                <a href='insert.php?id=" . $val['id'] . "'><button type='button' class='btn btn-success text-white'>Update</button></a>
                <a href='index.php?hapus=" . $val['id'] . "'><button type='button' class='btn btn-danger'>Delete</button></a>
            </td>
            </tr>";
        }

      $header = "<tr>
      <th> No </th>
              <th> Nama </th>
              <th> Email </th>
              <th> Phone </th>
              <th> Jabatan </th>
              <th> Divisi </th>
              <th> Action </th>
              </tr>";

      $view = new Template("templates/index.html");

      $view->replace("OPTION", $dataDivisi);
      $view->replace("DATA_TABEL", $dataKaryawan);
      $view->replace("DATA_MAIN_TITLE", "Karyawan");
      $view->replace("DATA_HEADER", $header);
      $view->write(); 
    }
  }
?>