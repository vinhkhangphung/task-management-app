<?php

namespace Views\Todo;

class TodoView
{
    private $data;

    public function showDetail($viewData): void
    {
        $this->data = $viewData[0];
        require_once("views/Todo/detail.php");
    }

    public function showList($viewData): void
    {
        $this->data = $viewData;
        require_once("views/Todo/list.php");
    }

    public function showEdit($viewData): void
    {
        $this->data = $viewData[0];
        require_once("views/Todo/edit.php");
    }

    public function showNew(): void
    {
        require_once("views/Todo/new.php");
    }

//    public function send($data)
//    {
//        var_dump($data);
//    }
}
