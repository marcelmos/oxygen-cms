<?php
    include_once dirname(__FILE__) . './../src/databaseActions.php';
    $conn = new oxdb;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if($this->action == 'index'){echo 'Dashboard';} else{echo ucwords(substr($this->action, 3));} ?></title>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/cbb96ef56b.js" crossorigin="anonymous"></script>

    <?php
    $stylesArr = scandir('./styles/css', 1);

    foreach($stylesArr as $item => $value){
        if(strpos($value, '.css')){
            echo "<link rel='stylesheet' href='/styles/css/$value'>";
        }
    }
    ?>
</head>

<body>
    <header>
        <nav class="ap-navigation">
            <ul class="ap-nav-list">
                <li class="ap-nav-item"><a href="/admin.php/" class="nav-link <?php if($this->action == 'index') echo 'active'?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li class="ap-nav-item"><a href="/admin.php/?action=ox_pages" class="nav-link <?php if($this->action == 'ox_pages') echo 'active'?>"><i class="fas fa-images"></i> Pages</a></li>
                <li class="ap-nav-item"><a href="/admin.php/?action=ox_articles" class="nav-link <?php if($this->action == 'ox_articles') echo 'active'?>"><i class="fas fa-newspaper"></i> Articles</a></li>
                <li class="ap-nav-item"><a href="/admin.php/?action=ox_media" class="nav-link <?php if($this->action == 'ox_media') echo 'active'?>"><i class="fas fa-photo-video"></i> Media</a></li>
                <li class="ap-nav-item"><a href="/admin.php/?action=ox_users" class="nav-link <?php if($this->action == 'ox_users') echo 'active'?>"><i class="fas fa-users"></i> Users</a></li>
                <li class="ap-nav-item"><a href="/admin.php/?action=ox_settings" class="nav-link <?php if($this->action == 'ox_settings') echo 'active'?>"><i class="fas fa-cogs"></i> Settings</a></li>
                <li class="ap-nav-item"><a href="/" class="nav-link"><i class="fas fa-home"></i> Return to front page</a></li>
            </ul>
        </nav>
    </header>

    <main class="ap-main-content">
        <?php
            require_once APP_DIR . "/../system-views/" . $template . ".php";
        ?>
    </main>

    <footer class="footer">
        <section class="copyright">
            Copyright © Oxygen 2021
        </section>
    </footer>

<!-- SCRIPTS -->
    <?php
    $stylesArr = scandir('./js', 1);

    foreach($stylesArr as $item => $value){
        if(strpos($value, '.js')){
            echo "<script type='text/javascript' src='/js/$value'></script>";
        }
    }
    ?>
</body>
</html>


