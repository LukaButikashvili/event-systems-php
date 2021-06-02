<?php

const EVENT_FILE_CHANGED = 'file_changed';
const EVENT_USER_CREATED = 'user_created';

$event_listners = [
    EVENT_FILE_CHANGED => []
];


function add_listner($event, callable $callback, int $weight = 0) { 

    global $event_listners;

    if(!isset($event_listners[$event])) {
        die("Event $event doesn't exist");
    }

    $event_listners[$event][] = ['callbacks' => $callback, 'weight' => $weight];

}


function dispatch_Event($event, $data) {
    global $event_listners;

    $array = $event_listners[$event];

    //sorting Arrays
    usort($array, function ($item1, $item2) {
        return $item2['weight'] <=> $item1['weight'];
    });

    //invoking functions
    foreach ($array as $callback) {
        $callback['callbacks']($data);
    }

    //if weight is bigger then ivoke it first
}
