<?php

class PalsView
{
    public function render($data)
    {
        $no = 1;
        $dataPals = null;
        $dataMembers = null;
        foreach ($data['pals'] as $val) {
            list($id_pal, $pal_name, $id_member) = $val;
            $dataPals .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $pal_name . "</td>";
            foreach ($data['members'] as $val) {
                list($id, $nama, $email, $phone, $join_date) = $val;
                if ($id == $id_member) {
                    $dataPals .= "<td>" . $nama . "</td>";
                }
            }
            $dataPals .= "<td>
            <a href='pals.php?id_edit=" . $id_pal .  "' class='btn btn-success' '>Edit</a>
            <a href='pals.php?id_hapus_pal=" . $id_pal . "' class='btn btn-danger' '>Delete</a>
          </td></tr>";
        }

        foreach ($data['members'] as $val) {
            list($id, $nama, $email, $phone, $join_date) = $val;
            $dataMembers .= "<option value='" . $id . "'>" . $nama . "</option>";
        }
        $form = '<form action="pals.php" method="POST">
        <div class="form-row">
          <div class="form-group col">
            <label for="pal_name">Nama Pal</label>
            <input type="text" class="form-control" name="pal_name" required />
          </div>
        </div>


        <div class="form-row">
          <div class="form-group col">
            <label for="id_member">Members</label>
            <select class="custom-select form-control" name="id_member">
              <option selected>*Pilih Pemilik*</option>
              OPTION
            </select>
          </div>
        </div>


        <button type="submit" name="add" class="btn btn-primary mt-3">Add</button>
      </form>';
        $tpl = new Template("templates/pals.html");
        $tpl->replace("FORM", $form);
        $tpl->replace("OPTION", $dataMembers);
        $tpl->replace("DATA_TABEL", $dataPals);
        $tpl->write();
    }
    public function renderedit($data, $data2)
    {
        $no = 1;
        $dataPals = null;
        $dataMembers = null;
        foreach ($data['pals'] as $val) {
            list($id_pal, $pal_name, $id_member) = $val;
            $dataPals .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $pal_name . "</td>";
            foreach ($data['members'] as $val) {
                list($id, $nama, $email, $phone, $join_date) = $val;
                if ($id == $id_member) {
                    $dataPals .= "<td>" . $nama . "</td>";
                }
            }
            $dataPals .= "<td>
            <a href='pals.php?id_edit=" . $id_pal .  "' class='btn btn-success' '>Edit</a>
            <a href='pals.php?id_hapus_pal=" . $id_pal . "' class='btn btn-danger' '>Delete</a>
          </td></tr>";
        }

        foreach ($data['members'] as $val) {
            list($id, $nama, $email, $phone, $join_date) = $val;
            $dataMembers .= "<option value='" . $id . "'>" . $nama . "</option>";
        }
        foreach ($data2 as $val) {
            list($id, $nama, $member_id) = $val;
            $namatemp = $nama;
        }
        $form = '<form action="pals.php?id=' . $id . '" method="POST">
        <div class="form-row">
          <div class="form-group col">
            <label for="pal_name">Nama Pal</label>
            <input type="text" class="form-control" name="pal_name" value = "' . $namatemp . '" required />
          </div>
        </div>
        <br>
        <button class="btn btn-success" type="submit" name="submit"> Edit </button><br>

      </form>';
        $tpl = new Template("templates/pals.html");
        $tpl->replace("FORM", $form);
        $tpl->replace("OPTION", $dataMembers);
        $tpl->replace("DATA_TABEL", $dataPals);
        $tpl->write();
    }
}
