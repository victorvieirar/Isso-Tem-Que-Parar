<?php 
include_once "php/config/database.php";
include_once "php/model/post.php";
include_once "php/controller/post.php";

$database = new Database();
$conn = $database->getConn();

$postController = new PostController();
$posts = $postController->getPostsWithPagination($conn, 1);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/qanelas.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <title>#IssoTemQueParar</title>
  </head>
  <body>
    <div id="landing">
        <div id="sidebar-left">
            <a href="#"><img class="logo" src="assets/logo-white.svg" alt=""></a>
            <a href="http://www.spm.gov.br/ligue-180" target="_blank"><img class="logo-180" src="assets/logo-180.svg" alt=""></a>
            <p class="copy"><span class="semibold">Isso tem que parar.</span> <span class="ultralight">Uma campanha da </span> <a href="http://instagram.com/atworkagenciadigital" target="_blank" rel="noopener noreferrer"><img class="logo-atwrk" src="assets/logo-atwrk.svg" alt=""></a></p>
        </div>
        <div id="sidebar-right">
            <form id="publish-form">
                <div class="form-group col-10">
                    <button type="button" name="btn-message" id="btn-message" class="col-12" >você tem algo pra contar?</button>
                </div>
            </form>
            <button id="btn-posts" class="bold">veja as histórias de outras pessoas</button>
        </div>
    </div>

    <div id="tell" class="active">
        <form method="post" id="submit-form">
            <div class="form-group col-12">
                <textarea name="message" id="message" class="col-12 regular" placeholder="Conte sua história..." maxlength="500"></textarea>
            </div>
        </form>
        <button type="button" id="btn-submit" title="Enviar" alt="enviar mensagem"><i class="far fa-paper-plane"></i></button>
        <i class="fas fa-times"></i>
    </div>

    <div id="posts">
        <div class="container card-columns">
            <?php
                foreach ($posts as $post) {
            ?>
            <div>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text"><?php echo $post->getMessage(); ?></p>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/functions.js" type="text/javascript"></script>
  </body>
</html>