<?php

namespace Controller;

use Model\ToDo;

require_once('controllers/BaseController.php');
require_once('models/ToDo.php');

class ToDoController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'todo';
    }

    public function index()
    {
        $todos = ToDo::all();
        $data = array('todos' => $todos);
        $this->render('index', $data);
    }

    public function create()
    {
        $task_name = $_POST['task_name'] ?? null;
        $start_date = $_POST['start_date'] ?? null;
        $end_date = $_POST['end_date'] ?? null;
        $status = $_POST['status'] ?? null;
        $todo = ToDo::create([$task_name, $start_date, $end_date, $status]);
        if ($todo) {
            header('Location: ' . '/');
            exit(1);
        }
        echo 'create item false!';
    }

    public function update()
    {
        if (!empty($_GET['id'])) {
            $todo = ToDo::findById($_GET['id']);
            $_SESSION['todo'] = $todo;
            if ($todo) {
                header('Location: ' . '/');
                exit(1);
            }
            return;
        }
        $id = $_POST['id'] ?? null;
        $task_name = $_POST['task_name'] ?? null;
        $start_date = $_POST['start_date'] ?? null;
        $end_date = $_POST['end_date'] ?? null;
        $status = $_POST['status'] ?? null;
        $todo = ToDo::update([$task_name, $start_date, $end_date, $status, $id]);
        if ($todo) {
            header('Location: ' . '/');
            exit(1);
        }
        echo 'update item false !';
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        $todo = ToDo::delete($id);
        if ($todo) {
            header('Location: ' . '/');
            exit(1);
        }
        echo 'delete item false !';
    }

}