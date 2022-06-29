<?php include ('header.php') ?>
<?php include ('db.php')?>
<?php

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = :id";
$statement = $connection->prepare($sql);
$statement->bindParam(':id', $id);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$post = $statement->fetch();


$sql = "SELECT * FROM comments WHERE post_id = :id";
$statement = $connection->prepare($sql);
$statement->bindParam(':id', $id);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$comments = $statement->fetchAll();


?>

<div class="blog-post">
            <h2 class="blog-post-title"><a href="./single-post.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
            <p class="blog-post-meta"><?php echo $post['created_at']; ?> by <a href="#"><?php echo $post['author']; ?></a></p>
            <p><?php echo $post['Body']; ?> </p>
</div>


<?php
foreach ($comments as $comment){
    ?>
    <ul class="comments">
            <li><?php echo $comment['author']; ?></li>
            <li><?php echo $comment['text']; ?></li>
            <hr>
    </ul>

<?php
}

?>
<?php include ('sidebar.php') ?>
<?php include ('footer.php') ?>