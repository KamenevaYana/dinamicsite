<?php include 'app/include/header.php'; ?>

    <!-- блок main START -->
    <!-- блок main -->
    <div class="container">
        <div class="container row">
            <!-- main контент -->
            <div class="about-content col-md-9 col-12">
                <div class="about row">
                    <div class="about_text col-12">
                        <div class="p-3 mb-2 bg-white text-dark">
                            <h2>О творческом объединении группы единомышленников в клуб путешественников</h2>
                        </div>
                    </div>
                </div>
                <div class="about row">
                    <div class="about_text col-12">

                        <!-- блок карусели из Bootstrap START -->
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/about_1.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/about_2.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/about_3.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Предыдущий</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Следующий</span>
                            </button>
                        </div>
                        <!-- блок карусели из Bootstrap END -->
                        <div class="p-3 mb-2 bg-white text-dark">
                            <h2>
                                История создания
                            </h2>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua.</p>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                nulla
                                pariatur.</p>
                            <h2>
                                Дальнейшие планы и цели Клуба
                            </h2>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                anim id est laborum.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                commodo consequat.</p>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                nulla
                                pariatur.</p>
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                anim id est laborum.</p>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint
                                occaecati
                                cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi,
                                id est laborum et dolorum fuga.</p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- sidebar main контент -->
            <div class="sidebar col-md-3 col-12">
                <div class="section search_about">
                    <h3>Поиск по сайту</h3>
                    <form action="/" method="post">
                        <input type="text" name="search-term" class="text-input" placeholder="Поиск...">
                    </form>
                </div>
                <div class="section topics">
                    <h3>Категории</h3>
                    <ul>
                        <li><a href="#">Страны</a></li>
                        <li><a href="#">Правила въезда</a></li>
                        <li><a href="#">Аффирмации</a></li>
                        <li><a href="#">Лайфхаки для путешествий</a></li>
                        <li><a href="#">Выездные мероприятия клуба</a></li>
                        <li><a href="#">Фотоотчет</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- блок main END -->
    <?php include 'app/include/footer.php'; ?>