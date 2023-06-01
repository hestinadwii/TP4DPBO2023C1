<?php

  class DivisiView {
    public function render($data){
        $no = 1;
        $dataDivisi = null;
        foreach($data as $val){
            $dataDivisi .= "<tr>
            <td>" . $no++ . "</td>
            <td>" . $val['nama_divisi'] . "</td>
            <td style='font-size: 22px;'>
                <a href='#' title='coba'></a>
                <a href='insertDivisi.php?id=" . $val['id_divisi'] . "'><button type='button' class='btn btn-success text-white'>Update</button></a>
                <a href='divisi.php?hapus=" . $val['id_divisi'] . "'><button type='button' class='btn btn-danger'>Delete</button></a>
            </td>
            </tr>";
        }

      $header = "<tr>
      <th> No </th>
              <th> Divisi </th>
              <th> Action </th>
              </tr>";

      $view = new Template("templates/tabel.html");

      $view->replace("DATA_TABEL", $dataDivisi);
      $view->replace("DATA_MAIN_TITLE", "Divisi");
      $view->replace("DATA_HEADER", $header);
      $view->write(); 
    }
  }
?>