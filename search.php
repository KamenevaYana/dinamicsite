<?php 
    include 'app/include/header.php'; 
    include "app/controllers/topics.php";
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])) {
        $posts = searchInTitleAndContent($_POST['search-term'], 'posts', 'users');
    }
     ?>
<!-- блок main START -->
<!-- блок main -->
    <div class="container">
        <div class="container row">
            <!-- main контент -->
            <div class="main-content col-12">
                <h2>Результаты поиска</h2>
                <?php foreach ($posts as $post): ?>
                    <div class="post row">
                    <div class="img col-12 col-md-4">
                        <img src="<?='http://localhost/dinamicsite/images/posts/' . $post['img'] ?>" alt="<?=$post['title'] ?>" class="img-thumbnail">
                    </div>
                    <div class="post_text col-12 col-md-8">
                        <h2>
                            <a href="<?='http://localhost/dinamicsite/' . 'single.php?post=' . $post['id'] ?>"><?=substr($post['title'], 0, 100) ?></a>
                        </h2>
                        <i class="fa-solid fa-marker"><?=$post['user_name']; ?></i>
                        <i class="fa-regular fa-calendar"><?=$post['created_date']; ?></i>
                        <p class="preview-text">
                            <?=mb_substr($post['content'], 0, 150, 'UTF-8') . '...' ?>
                        </p>
                    </div> 
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<!-- блок main END -->
    <?php include 'app/include/footer.php'; ?>