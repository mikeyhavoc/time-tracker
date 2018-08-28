<?php
//application functions
function get_project_list() {
    include 'connection.php';

    try {
      return  $db->query('SELECT project_id, title, category FROM projects');
    } catch (Exception $e) {
        echo 'Error' . $e->getMessage() . "<br>";
        return array();
    }

}

function get_task_list() {
    include 'connection.php';

    $sql = 'SELECT t.task_id, t.title, t.date, t.time, p.title FROM tasks '
            . ' JOIN tasks as t ON projects as p '
            . ' p.projects_it = t.project_id';

    try {

    } catch (Exception $e) {
        echo 'Error' . $e->getMessage() . "<br>";
        return array();
    }

}

function add_project($title, $category) {
    include 'connection.php';

    $sql = 'INSERT INTO projects (title, category) VALUES (? , ?)';

    try {
        $results = $db->prepare($sql);
        $results->bindParam(1, $title, PDO::PARAM_STR);
        $results->bindParam(2, $category, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo 'Error '. $e->getMessage();
        return false;
    }
    return true;

}