

<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");
$members = new MembersController();

// if (isset($_POST['add'])) {
//   //memanggil add
//   $members->add($_POST);
// }
// //mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
// else if (!empty($_GET['id_hapus'])) {
//   //memanggil add
//   $id = $_GET['id_hapus'];
//   $members->delete($id);
// } else if (!empty($_GET['id_edit'])) {
//   $id = $_GET['id_edit'];
//   $members->indexedit($id);
// } else if (isset($_POST['submit'])) {
//   $id_edit = $_GET['id'];
//   $members->edit($id_edit, $_POST);
// } else {
//   $members->index();
// }

$members->create();
