<?php

class Karyawan extends DB
{
    function getKaryawanJoin()
    {
        $query = "SELECT * FROM karyawan JOIN divisi ON karyawan.id_divisi=divisi.id_divisi ORDER BY karyawan.id";

        return $this->execute($query);
    }

    function getKaryawan()
    {
        $query = "SELECT * FROM karyawan";
        return $this->execute($query);
    }

    function getKaryawanById($id)
    {
        $query = "SELECT * FROM karyawan JOIN divisi ON karyawan.id_divisi=divisi.id_divisi WHERE id = $id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $jabatan = $data['jabatan'];
        $id_divisi = $data['id_divisi'];

        $query = "INSERT INTO karyawan VALUES('', '$name', '$email', '$phone', '$jabatan', '$id_divisi')";
        
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $jabatan = $data['jabatan'];
        $id_divisi = $data['id_divisi'];

        $query = "UPDATE karyawan SET name ='$name', email='$email', phone='$phone', jabatan='$jabatan', id_divisi='$id_divisi' WHERE id = '$id'";
        
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM karyawan WHERE id = '$id'";
        return $this->execute($query);
    }
}
