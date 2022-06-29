<?php

$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$statement = $connection->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$posts = $statement->fetchAll();

?>

<?php
foreach ($posts as $post){
    ?>
    <div class="blog-post">
            <h2 class="blog-post-title"><a href="./single-post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
            <p class="blog-post-meta"><?php echo $post['created_at']; ?> by <a href="#"><?php echo $post['author']; ?></a></p>
            <p><?php echo $post['Body']; ?> </p>
    </div>

<?php
}

?>