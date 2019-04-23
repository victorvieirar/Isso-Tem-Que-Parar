<?php
include_once "../config/database.php";
include_once "../controller/post.php";
include_once "../model/post.php";

if(isset($_POST['page'])) {
    $page = $_POST['page'];

    $database = new Database();
    $conn = $database->getConn();

    $postController = new PostController();
    $posts = $postController->getPostsWithPagination($conn, $page);

    if(!empty($posts)) {
        echo json_encode(array("success"=>true, "posts"=>$posts));
    } else {
        echo json_encode(array("success"=>false, "msg"=>"Não há mais postagens"));
    }
}
?>