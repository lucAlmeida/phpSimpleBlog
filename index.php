<?php
    require('config/config.php');
    require('config/db.php');

    $query = 'SELECT * FROM posts ORDER BY created_at DESC';

    // Get Result
    $result = mysqli_query($conn, $query);

    // Fetch Data
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free Result
    mysqli_free_result($result);

    // Close Connection
    mysqli_close($conn);
?>
<?php include('inc/header.php') ?>
        <div class="container">
            <h1>Posts</h1>
            <?php foreach($posts as $post): ?>
                <div class="well">
                    <h3><?php echo $post['title']; ?></h3>
                    <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
                    <p><?php echo $post['body']; ?></p>
                    <a class="btn btn-default" href="post.php?id=<?php echo $post['id']; ?>">Read More</a>
                </div>
            <?php endforeach; ?>
        </div>
<?php include('inc/footer.php') ?>
