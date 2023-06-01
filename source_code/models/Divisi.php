<?php

class Divisi extends DB
{
    function getDivisi()
    {
        $query = "SELECT * FROM divisi";
        return $this->execute($query);
    }

    function getDivisiById($id)
    {
        $query = "SELECT * FROM divisi WHERE id_divisi = $id";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama_divisi = $data['nama_divisi'];

        $query = "INSERT INTO divisi VALUES('', '$nama_divisi')";
        
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $nama_divisi = $data['nama_divisi'];

        $query = "UPDATE divisi SET nama_divisi='$nama_divisi' WHERE id_divisi = '$id'";
        
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM divisi WHERE id_divisi = '$id'";
        return $this->execute($query);
    }
}
