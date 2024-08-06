<?php
function getController($query_string)
{
    $className = "Controllers\\" . ucfirst($query_string["controller"]) . "Controller";
    return new $className();
}

$query_string = array();
foreach (explode("&", $_SERVER['QUERY_STRING']) as $pair) {
    $couple_array = explode("=", $pair);
    $query_string[$couple_array[0]] = $couple_array[1];
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (array_key_exists("controller", $query_string)) {

        // Construct new Controller, no include needed -> autoload
        $control = getController($query_string);

        // app/ -> list
        // app/new -> create page
        // app/detail/{id} -> detail
        // app/edit/{id} -> edit page
        if (array_key_exists("action", $query_string)) {
            if (array_key_exists("id", $query_string)) {
                $control->showDetail((int)$query_string["id"], $query_string["action"]);
            } else {
                // have action but no id -> new or list
                if ($query_string["action"] === "new") {
                    $control->showNew();
                }
            }
        } else {
            $control->showAll();
            // no action -> default -> list
        }
    } else {
        $control = new Controllers\ErrorController();
        $control->showError("no controller provided 0");
    }

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (array_key_exists("controller", $query_string)) {
        $control = getController($query_string);
        $control->new();
    } else {
        $control = new Controllers\ErrorController();
        $control->showError("no controller provided 1");
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
    if (array_key_exists("controller", $query_string)) {
        $control = getController($query_string);
        $control->edit();
    } else {
        $control = new Controllers\ErrorController();
        $control->showError("no controller provided 2");
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if (array_key_exists("controller", $query_string) and array_key_exists("id", $query_string)) {
        $control = getController($query_string);
        $control->remove($query_string["id"]);
    } else {
        $control = new Controllers\ErrorController();
        $control->showError("delete: no controller or no ID provided");
    }
} else {
    echo "invalid method";
    // PUT not supported
}
