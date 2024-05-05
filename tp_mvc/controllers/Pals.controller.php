<?php
include_once("conf.php");
include_once("models/Pals.class.php");
include_once("models/Members.class.php");
include_once("views/Pals.view.php");

class PalsController
{
    private $pals;
    private $members;

    function __construct()
    {
        $this->pals = new Pals(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->pals->open();
        $this->members->open();
        $this->pals->getPals();
        $this->members->getMembers();

        $data = array(
            'pals' => array(),
            'members' => array()
        );
        while ($row = $this->pals->getResult()) {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
            array_push($data['pals'], $row);
        }
        while ($row = $this->members->getResult()) {
            array_push($data['members'], $row);
        }
        $this->pals->close();
        $this->members->close();

        $view = new PalsView();
        $view->render($data);
    }
    public function indexedit($id)
    {
        $this->pals->open();
        $this->members->open();
        $this->pals->getPals();
        $this->members->getMembers();

        $data = array(
            'pals' => array(),
            'members' => array()
        );
        while ($row = $this->pals->getResult()) {
            // echo "<pre>";
            // print_r($row);
            // echo "</pre>";
            array_push($data['pals'], $row);
        }
        while ($row = $this->members->getResult()) {
            array_push($data['members'], $row);
        }
        $this->pals->close();
        $this->members->close();

        $this->pals->open();
        $this->pals->getPalsbyId($id);
        $data2 = array();
        while ($row = $this->pals->getResult()) {
            array_push($data2, $row);
        }
        $this->pals->close();

        $view = new PalsView();
        $view->renderedit($data, $data2);
    }


    function add($data)
    {
        $this->pals->open();
        $this->pals->add($data);
        $this->pals->close();

        header("location:pals.php");
    }

    function edit($id, $data)
    {
        $this->pals->open();
        $this->pals->edit($id, $data);
        $this->pals->close();

        header("location:pals.php");
    }

    function delete($id)
    {
        $this->pals->open();
        $this->pals->delete($id);
        $this->pals->close();

        header("location:pals.php");
    }
}
