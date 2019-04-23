<?php

include_once "../config/database.php";
include_once "../model/post.php";
include_once "../controller/post.php";

if(isset($_POST['post'])) {
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    if(empty($message)) {
        echo json_encode(array("success"=>false, "msg"=>"Os dados inseridos estão incompletos. Por favor, tente novamente!"));
        exit;
    }

    $database = new Database();
    $conn = $database->getConn();
    
    $post = new Post($message);
    $postController = new PostController();
    if($postController->save($post, $conn)) {
        echo json_encode(array("success"=>true));
        exit;
    } else {
        echo json_encode(array("success"=>false, "msg"=>"Houve uma falha ao tentar salvar sua história. Tente novamente mais tarde!"));
        exit;
    }
} else {
    header("location: ../../");
}


?>