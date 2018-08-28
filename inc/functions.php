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

    $sql = 'SELECT t.task_id as task_id, t.title as title, t.date as dates,
            t.time as time , p.title as projects FROM tasks as t 
             JOIN projects as p ON  
             p.project_id = t.project_id';

    try {
        return $db->query($sql);
    } catch (Exception $e) {
        echo 'Error ' . $e->getMessage() . "<br>";
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

function add_task($project_id, $title, $date, $time) {
    include 'connection.php';

    $sql = 'INSERT INTO tasks(project_id, title, date, time) VALUES (?, ?, ?, ?)';

    try {
        $results = $db->prepare($sql);
        $results->bindParam(1, $project_id, PDO::PARAM_INT);
        $results->bindParam(2, $title, PDO::PARAM_STR);
        $results->bindParam(3, $date, PDO::PARAM_STR);
        $results->bindParam(4, $time, PDO::PARAM_INT);
        $results->execute();
    } catch (Exception $e) {
        echo 'Error '. $e->getMessage();
        return false;
    }
    return true;

}