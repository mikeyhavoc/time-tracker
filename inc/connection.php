<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 8/27/18
 * Time: 10:23 PM
 */

$database = 'timetracker';
$user = '';
$pass = '';

try {
    $db = new PDO('mysql:host=localhost;dbname='.$database.';port=3306,',$user, $pass);

} catch(Exception $e) {
    echo 'connection not working';
    exit;
}
