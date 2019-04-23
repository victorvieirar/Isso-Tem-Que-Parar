<?php

class PostController {

    public function save($post, $conn) {
        $sql = "INSERT INTO ".PostEntries::TBNAME."(".PostEntries::MSG.") VALUES (:message)";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":message", $post->getMessage());
        return $stmt->execute();
    }

    public function getAll($conn) {
        $sql = "SELECT ".PostEntries::MSG." FROM ".PostEntries::TBNAME;
        $stmt = $conn->prepare($sql);

        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Post", array(PostEntries::MSG));
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPostsWithPagination($conn, $page) {
        $limit = $page * 10;
        $initial = (($page-1) * 10) + 1;

        $sql = "SELECT ".PostEntries::MSG." FROM ".PostEntries::TBNAME." LIMIT ".$limit." OFFSET ".$initial;
        $stmt = $conn->prepare($sql);

        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "Post", array(PostEntries::MSG));
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

class PostEntries {
    const TBNAME = "post";
    const ID = "id";
    const MSG = "message";
}

?>