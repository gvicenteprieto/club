<?php
require_once 'dbConfig.php';
//$_POST = json_decode(file_get_contents('php://input'), true);


$jsonStr = file_get_contents('php://input');
$jsonObj = json_decode($jsonStr);

if ($jsonObj->request_type == 'addEvent') {
    $start = $jsonObj->start;
    $end = $jsonObj->end;
    $event_data = $jsonObj->event_data;
    $eventTitle = !empty($event_data[0]) ? $event_data[0] : '';
    $eventDesc = !empty($event_data[1]) ? $event_data[1] : '';
    $eventURL = !empty($event_data[2]) ? $event_data[2] : '';

    if (empty($eventTitle)) {
        $sqlQ = "INSERT INTO eventos (title,description,url,start,end) VALUES (?,?,?,?,?)";
        $stmt = $db->prepare($sqlQ);
        $stmt->bind_param("sssss", $eventTitle, $eventDesc, $eventURL, $start, $end);
        $insert= $stmt->execute();

        if ($insert) {
            $output = [
                'status' => 1
            ];
            echo json_encode($output);
        } else {
            echo json_encode(['error' => 'Event add failed']);
        }
    }
}
