<?php
require_once('../../functions/helpers.php');
require_once('../../functions/pdo_connection.php');
require_once('../../functions/check-login.php');

global $pdo;

if (isset($_GET['post_id']) && $_GET['post_id'] !== '') {
    $query = 'SELECT * FROM `posts` WHERE id=?';
    $statement = $pdo->prepare($query);
    $statement->execute([$_GET['post_id']]);
    $post = $statement->fetch();

    if ($post !== false) {
        $status = ($post->status == 1) ? 0 : 1;
        $query = 'UPDATE `posts` SET status=? ,updated_at =NOW() WHERE id=?;';
        $statement = $pdo->prepare($query);
        $statement->execute([$status, $_GET['post_id']]);
    }

    redirect('panel/post');
}