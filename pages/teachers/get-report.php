<?php

session_start();
if (isset($_SESSION['username']) && isset($_SESSION['teacher_role'])) {

    require_once '../../controls/connection.php';
    $tableData = $_POST['arr'];
    // $grade = $_POST['grade'];
    // $term = $_POST['term'];

    $nonEmptyElements = array_filter($tableData, function ($element) {
        return !empty($element);
    });

    $imp = implode(", ", $nonEmptyElements);
    $newArray = explode(", ", $imp);
    foreach ($newArray as $na) {
        if (is_numeric($na)) {
            echo $na . "\n";
        } else {
            continue;
        }
    }

}