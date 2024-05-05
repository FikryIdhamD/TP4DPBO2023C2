

<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");
include_once("controllers/Pals.controller.php");
$pals = new PalsController();

if (isset($_POST['add'])) {
    //memanggil add
    $pals->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus_pal'])) {
    //memanggil add
    $id = $_GET['id_hapus_pal'];
    $pals->delete($id);
} else if (!empty($_GET['id_edit'])) {
    $id = $_GET['id_edit'];
    $pals->indexedit($id);
} else if (isset($_POST['submit'])) {
    $id_edit = $_GET['id'];
    $pals->edit($id_edit, $_POST);
} else {
    $pals->index();
}
