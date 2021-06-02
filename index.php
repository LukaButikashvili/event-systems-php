<?php

require_once "event-system.php";
require_once "file.php";


error_reporting(E_ALL);
ini_set('display_errors', 1);

function notify_all($filename) {
    print "File $filename was changed";
}

// function copy_file($filename) {
//     copy("data/" . $filename, "data/backup/" . $filename . "_bck");
// }

//add_listner(EVENT_FILE_CHANGED, 'notify_all');
//add_listner(EVENT_FILE_CHANGED, 'copy_file');


add_listner(EVENT_FILE_CHANGED, 'notify_all', 4);
add_listner(EVENT_FILE_CHANGED, 'notify_all', 2);
add_listner(EVENT_FILE_CHANGED, 'notify_all', 8);

add_user('student5', 'students');
add_user('teachers5', 'teachers');
dispatch_Event(EVENT_FILE_CHANGED, 'students.json');
dispatch_Event(EVENT_FILE_CHANGED, 'teachers.json');
