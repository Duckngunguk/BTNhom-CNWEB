<?php
require_once "models/Course.php";

$course = new Course();
$courses = $course->getAll();

foreach ($courses as $c) {
    echo $c['title'] . "<br>";
}
