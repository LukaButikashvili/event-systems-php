<?php

function add_user($student, $dataName) {
    $file_path = "data/" . $dataName . ".json";

    $students = json_decode(file_get_contents($file_path), true);
    $students[$dataName][] = $student;

    file_put_contents($file_path, json_encode($students));
}