<?php 

require_once '../php/config/database.php';
$db = new Database();
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
if ($contentType === "application/json") {
    //Receive the RAW post data.
    $content = trim(file_get_contents("php://input"));
  
    $post = json_decode($content, true);
  
    //If json_decode failed, the JSON is invalid.
    if(! is_array($post)) {
        // print_r($decoded);
    } else {
        $start = date('Y-m-d h:i:s', strtotime($post['start']));
        $end = date('Y-m-d h:i:s', strtotime($post['end']));

        $ins = $db->insertRow('INSERT INTO `events`(`title`, `start`, `ends`) 
        VALUES (?,?,?)', [$post['title'], $start, $end]);
        
            if($ins){
                echo json_encode(['title' => $post['title']]);
            }else {
                echo json_encode(['error' => 'No title posted']);
            }
    }
}
  
// $post = file_get_contents('php://input');

// if(isset($post['title'])){
//     $ins = $db->insertRow('INSERT INTO `events`(`title`, `start`, `ends`) 
//     VALUES (?,?,?)', [$post['title'], $post['start'], $post['end']]);

//     if($ins){
//         echo json_encode(['title' => $post['title']]);
//     }
// } else {
//     echo json_encode(['error' => 'No title posted']);
//     // echo json_encode($post);
// }
// print_r($post->title);