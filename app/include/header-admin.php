<?php  //include_once '../../app/database/controllers/users.php';
session_start();?>
<!doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- иконки Font awesome -->
    <script src="https://kit.fontawesome.com/380801b10b.js" crossorigin="anonymous"></script>
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonimus">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- стили CSS -->
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <title>Клуб путешественников</title>
</head>

<body>

    <header class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h1>
                        <a href="<?php echo 'index.php' ?>">Блог о путешевствиях</a>
                    </h1>
                </div>
                <nav class="col-8">
                    <ul>
                        <li>
                            <a href="registration.php">
                            <i class="fa-solid fa-mug-hot"></i>
                            <?php echo $_SESSION['login']; ?></a>
                        </li>
                        <li>
                            <a href="../../../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Выход</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>