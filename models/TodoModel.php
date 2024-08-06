<?php

namespace Models;

use DB\DbConnection;

class TodoModel extends DbConnection
{
    private function query($stmt, $return = true, ...$bind_vars)
    {
        $sql = $this->connect()->prepare($stmt);
        if ($bind_vars) {
            $sql->execute([...$bind_vars]);
        } else {
            $sql->execute();
        }

        if ($return) {
            return $sql->fetchAll();
        }
    }

    protected function readAll()
    {
        return $this->query("SELECT * FROM activity ORDER BY prio, create_time");
    }

    protected function readByID($id)
    {
        return $this->query("SELECT * FROM activity WHERE id = ?", true, $id);
    }

    protected function create($title, $content, $prio)
    {
        $this->query(
            "INSERT INTO activity (title, content, prio) VALUES (?, ?, ?)",
            false,
            $title,
            $content,
            $prio
        );
    }

    protected function update($id, $title, $content, $prio)
    {
        // create time -> update time
        $this->query(
            "UPDATE activity SET title=?, content=?, 
            prio=? WHERE id=?",
            false,
            $title,
            $content,
            $prio,
            $id
        );
    }

    protected function delete($id)
    {
        $this->query("DELETE FROM activity WHERE id = ?", false, $id);
    }
}
