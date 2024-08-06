<?php
require_once("components/header.php");

$ordered_list = '';
$function = '
    <script>
        function handleSubmitDelete(id) {
            fetch(`http://localhost/internship-vietlink-be/mvc-oop/khang/todo-app/index.php?controller=todo&id=${id}`, 
            {
            method: "DELETE",
            headers: {"Content-Type": "application/json"},
            })
            .then(() => {
                window.location.replace("http://localhost/internship-vietlink-be/mvc-oop/khang/todo-app/todo");
            });
        }
    </script>
';
$ordered_list = $function . $ordered_list;

for ($i = 0; $i < count($this->data); $i++) {
    $baseHTML = '
    <li>
        <ul>
            <div class="flex">
                <li class="text-xl font-semibold hover:underline">
                    <a href="http://localhost/internship-vietlink-be/mvc-oop/khang/todo-app/index.php?controller=todo&action=detail&id=ID_NUM">task</a>
                </li>
                <button onclick="handleSubmitDelete(ID_NUM)" class="ml-2">
                    <input class="hidden" type="text" value=ID_NUM name=id>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                    </svg>
                </button>
            </div>

            <li class="italic">prio</li>
            <li>Note: note</li>
            <li>ID: ID_NUM</li>
            <li>created</li>
        </ul>
    </li>
    <br>';
    $baseHTML = str_replace("ID_NUM", $this->data[$i]['id'], $baseHTML);
    $baseHTML = str_replace("task", $this->data[$i]['title'], $baseHTML);
    $baseHTML = str_replace("note", $this->data[$i]['content'], $baseHTML);
    $baseHTML = str_replace("prio", $this->data[$i]['prio'], $baseHTML);
    $baseHTML = str_replace("created", $this->data[$i]['create_time'], $baseHTML);
    $ordered_list = $ordered_list . $baseHTML;
}
$ordered_list = '<ol class="py-8 px-12 flex flex-wrap gap-8">' . $ordered_list . '</ol>';


echo $ordered_list;

require_once("components/footer.php");
