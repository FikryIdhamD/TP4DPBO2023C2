<?php

class Pals extends DB
{
    function getPals()
    {
        $query = "SELECT * FROM pals";
        return $this->execute($query);
    }

    function getPalsbyId($id)
    {
        $query = "SELECT * FROM pals WHERE id_pal = $id";
        return $this->execute($query);
    }

    function add($data)
    {
        $pal_name = $data['pal_name'];
        $id_member = $data['id_member'];


        $query = "insert into pals values ('', '$pal_name', '$id_member')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM pals WHERE id_pal = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($id, $data)
    {
        $pal_name = $data['pal_name'];
        $query = "UPDATE pals SET pal_name='$pal_name' WHERE id_pal=$id";
        return $this->execute($query);
    }
}
