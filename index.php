<?php 
    include 'app/include/header.php'; 
    include "app/controllers/topics.php";
    
    $page = isset($_GET['page']) ? intval($_GET['page']) :1;
    $limit = 2;
    $offset = $limit * ($page - 1);
    $total_pages = round(countRow('posts') / $limit, 0);
    $posts = sellectAllFromPostsWithUsersOnIndex('posts', 'users', $limit, $offset);
     ?>
    <!-- блок карусели из Bootstrap START -->
    <div class="container">
        <div class="row">
            <h2 class="slider-title">Добро пожаловать в мир путешествий!</h2>
        </div>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/img_1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                        <h5><a href="">Путешествуй</a></h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/img_2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                        <h5><a href="">Вдохновляйся</a></h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/img_3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                        <h5><a href="">Живи ярко</a></h5>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- блок карусели из Bootstrap END -->

    <!-- блок main START -->
    <!-- блок main -->
    <div class="container">
        <div class="container row">
            <!-- main контент -->
            <div class="main-content col-md-9 col-12">
                <h2>Последние новости</h2>
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
                <!-- подключаем навигацию (пагинацию) -->
                <?php include 'app/include/pagination.php'; ?>
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