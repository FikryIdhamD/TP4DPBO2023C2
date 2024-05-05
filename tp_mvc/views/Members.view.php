<?php
class MembersView
{
    public function render($data)
    {
        $no = 1;
        $dataMembers = null;
        foreach ($data as $val) {
            list($id, $nama, $email, $phone, $join_date) = $val;
            $dataMembers .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $nama . "</td>
                    <td>" . $email . "</td>
                    <td>" . $phone . "</td>
                    <td>" . $join_date . "</td>
                    <td>
                    <a href='index.php?id_edit=" . $id .  "' class='btn btn-success''>Edit</a>
                    <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger''>Delete</a>
                    </td>
                    </tr>";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("DATA_TABEL", $dataMembers);
        $tpl->write();
    }
    public function renderedit($data)
    {
        foreach ($data as $val) {
            list($id, $nama, $email, $phone, $join_date) = $val;
            $urlid = "'index.php?id=" . $id . "'";
            $name = "<input type='text' name='name' class='form-control' value='" . $nama . "' required> <br>";
            $email = "<input type='text' name='email' class='form-control' value='" . $email . "' required> <br>";
            $phone = "<input type='text' name='phone' class='form-control' value='" . $phone . "' required> <br>";
        }

        $tpl = new Template("templates/edit.html");
        $tpl->replace("INPUT1", $name);
        $tpl->replace("INPUT2", $email);
        $tpl->replace("INPUT3", $phone);
        $tpl->replace("ACTION", $urlid);
        $tpl->write();
    }
}
