<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 8/27/18
 * Time: 10:23 PM
 */

$database = '';
$user = '';
$pass = '';

$db = new PDO('mysql:host=localhost;dbname='.$database.';port=3306,',$user, $pass);