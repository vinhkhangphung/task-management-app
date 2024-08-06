<?php

namespace Controllers;

use Models\TodoModel;
use Views\todo\TodoView;

class TodoController extends TodoModel
{
    protected $data;
    private $view;

    function __construct()
    {
        $this->view = new TodoView();
    }

//    public function routeAction($action)
//    {
//        switch ($action) {
//            case 'detail':
//                if (isset($_GET['id'])) {
//                    $this->detail($_GET['id']);
//                } else {
//                    echo 'No id provided';
//                };
//                break;
//            case 'edit':
//                if (isset($_GET['id'], $_POST['title'], $_POST['content'], $_POST['prio'])) {
//                    $this->edit($_GET['id'], $_POST['title'], $_POST['content'], $_POST['prio']);
//                } elseif (isset($_GET['id'])) {
//                    $this->detail($_GET['id'], "edit");
//                }
//                break;
//            case 'list':
//                $this->get_all();
//                break;
//            case 'new':
//                if (isset($_POST['title'], $_POST['content'], $_POST['prio'])) {
//                    $this->new($_POST['title'], $_POST['content'], $_POST['prio']);
//                } else {
//                    $this->new();
//                }
//                break;
//            case 'delete':
//                if (isset($_POST['id'])) {
//                    $this->remove($_POST['id']);
//                } else {
//                    echo 'Missing form arguments';
//                };
//                break;
//            default:
//                echo 'Invalid action';
//                break;
//        }
//    }

    /* GET REQUEST*/
    public function showAll(): void
    {
        $this->view->showList($this->readAll());
    }

    public function showDetail($id, $direction): void
    {
        if ($direction == "detail") {
            $this->view->showDetail($this->readByID($id));
        } elseif ($direction == "edit") {
            $this->view->showEdit($this->readByID($id));
        } else {
            (new ErrorController())->showError("Invalid action for GET request");
        }
    }

    public function showNew(): void
    {
        $this->view->showNew();
    }

    /* PATCH REQUEST*/
    public function edit(): void
    {
        $_PATCH = json_decode(file_get_contents('php://input'));
        http_response_code(500);
        if (!isset($_PATCH->id, $_PATCH->title, $_PATCH->content, $_PATCH->prio)) {
            (new ErrorController())->showError("EDIT: Missing arguments in PATCH request");
        }

        $this->update($_PATCH->id, $_PATCH->title, $_PATCH->content, $_PATCH->prio);
//        header("Location: http://localhost/internship-vietlink-be/mvc-oop/khang/todo-app/todo");
    }

    /* POST REQUEST*/
    public function new(): void
    {
        if (!isset($_POST["title"], $_POST["content"], $_POST["prio"])) {
            (new ErrorController())->showError("NEW: Missing arguments in POST request");
        }
        $this->create($_POST["title"], $_POST["content"], $_POST["prio"]);
        header("Location: http://localhost/internship-vietlink-be/mvc-oop/khang/todo-app/todo");
    }

    /* DELETE REQUEST*/
    public function remove($id): void
    {
        $this->delete($id);
        header("Location: http://localhost/internship-vietlink-be/mvc-oop/khang/todo-app/todo");
    }
}
