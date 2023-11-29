<?php 
    include 'app/include/header.php'; 
    include "app/controllers/topics.php";
    $posts = selectAll('posts', ['id_topic' => $_GET['id']]);   
    $category = selectOne('topics', ['id' => $_GET['id']]);
    $autors = selectOne('users', ['user_name']);
    //tt($autors);
     ?>

    <!-- блок main START -->
    <!-- блок main -->
    <div class="container">
        <div class="container row">
            <!-- main контент -->
            <div class="main-content col-md-9 col-12">
                <h2>Публикации категории: <?=$category['name']; ?></h2>
                <?php foreach ($posts as $post): ?>
                    <div class="post row">
                    <div class="img col-12 col-md-4">
                        <img src="<?='http://localhost/dinamicsite/images/posts/' . $post['img'] ?>" alt="<?=$post['title'] ?>" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h2>
                            <a href="<?='http://localhost/dinamicsite/' . 'single.php?post=' . $post['id'] ?>"><?=substr($post['title'], 0, 100) ?></a>
                        </h2>
                        <i class="fa-solid fa-marker"><?=$autors['user_name']; ?></i>
                        <i class="fa-regular fa-calendar"><?=$post['created_date']; ?></i>
                        <p class="preview-text">
                            <?=mb_substr($post['content'], 0, 150, 'UTF-8') . '...' ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- sidebar main контент -->
            <div class="sidebar col-md-3 col-12">
                <div class="section search">
                    <h3>Поиск по сайту</h3>
                    <form action="search" method="post">
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