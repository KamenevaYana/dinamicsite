<?php 
include 'app/database/db.php';
include "app/controllers/topics.php";
include 'app/include/header.php';
$post = sellectPostFromUserForSingle('posts', 'users', $_GET['post']);
//$posts = sellectAllFromPostsWithUsersOnIndex('posts', 'users');

?>
<!-- блок main START -->
<!-- блок main -->
    <div class="container">
        <div class="container row">
            <!-- main контент -->
            <div class="main-content col-md-9 col-12 p-3 mb-2 bg-white text-dark">
                <h1><?php echo $post['title'];?></h1>
                <div class="single_post row">
                    <div class="img col-12">
                        <img src="<?='http://localhost/dinamicsite/images/posts/' . $post['img'] ?>" alt="<?=$post['title'] ?>" class="img-thumbnail">
                    </div>
                    <div class="single_post_text col-12">
                        <div class="info-post">
                            <i class="fa-solid fa-marker"><?=$post['user_name']; ?></i>
                            <i class="fa-regular fa-calendar"><?=$post['created_date']; ?></i>
                        </div>
                        <div class="p-3 mb-2 bg-white text-dark">
                        <?=$post['content'];?>
                        </div>
                        <!-- инклюдим комментарии -->
                    </div>
                    <?php include 'app/include/comments.php';?>
                </div>
            </div>
            <!-- sidebar main контент -->
            <div class="sidebar col-md-3 col-12">
                <div class="section search">
                    <h3>Поиск по сайту</h3>
                    <form action="/" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Поиск...">
                    </form>
                </div>
                <div class="section topics">
                    <h3>Категории</h3>
                    <ul>
                        <?php foreach($topics as $key => $topic): ?>
                            <li><a href="<?='http://localhost/dinamicsite/' . 'category.php?id=' . $topic['id']; ?>"><?= $topic['name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- блок main END -->
    <?php include 'app/include/footer.php'; ?>