<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function getMemberbyId($id)
    {
        $query = "SELECT * FROM members WHERE id = $id";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = date('Y-m-d');

        $query = "insert into members values ('', '$name', '$email', '$phone', '$join_date')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($data, $id)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $query = "UPDATE members SET name='$name', email = '$email', phone = '$phone' WHERE id=$id";
        return $this->execute($query);
    }

    function statusAuthor($id)
    {
        $status = "Senior";
        $query = "update author set status = '$status' where id_author = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
