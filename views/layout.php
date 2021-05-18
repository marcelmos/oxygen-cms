<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if($this->action == 'index'){echo 'Home';} else{echo ucwords($this->action);} ?></title>
    <?php
    $stylesArr = scandir('./styles', 1);

    foreach($stylesArr as $item => $value){
        if(strpos($value, '.css')){
            echo "<link rel='stylesheet' href='./styles/$value'>";
        }
    }
    ?>
</head>

<body>
    <header>
        <nav class="navigation">
            <ul class="nav-list">
                <li class="nav-item"><a href="/" class="nav-link <?php if($this->action == 'index') echo 'active'?>">Home</a></li>
                <li class="nav-item"><a href="/?action=blog" class="nav-link <?php if($this->action == 'blog' || $this->action == 'post') echo 'active'?>">Blog</a></li>
                <li class="nav-item"><a href="/?action=about" class="nav-link <?php if($this->action == 'about') echo 'active'?>">About</a></li>
                <li class="nav-item"><a href="/?action=contact" class="nav-link <?php if($this->action == 'contact') echo 'active'?>">Contact</a></li>
                <li class="nav-item"><a href="/?action=faq" class="nav-link <?php if($this->action == 'faq') echo 'active'?>">FAQ</a></li>
            </ul>
        </nav>
    </header>

    <?php
        require_once APP_DIR . "/../views/" . $template . ".php";
    ?>

    <footer class="footer">
        <div class="container">
            <div class="footer-row">
                <div class="footer-block">
                    <h3>Template Text</h3>
                    <hr>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo suscipit corrupti, quidem aperiam, numquam cupiditate dolore alias, doloribus illo iure dignissimos ab excepturi accusamus! Reprehenderit perferendis placeat minus eius laboriosam?</p>
                </div>
                <div class="footer-block">
                    <h3>Template Text</h3>
                    <hr>
                    <ul>
                        <li>Template List Text</li>
                        <li>Template List Text</li>
                        <li>Template List Text</li>
                        <li>Template List Text</li>
                        <li>Template List Text</li>
                    </ul>
                </div>
                <div class="footer-block">
                    <h3>Template Text</h3>
                    <hr>
                    <ul>
                        <li>Template List Text</li>
                        <li>Template List Text</li>
                        <li>Template List Text</li>
                        <li>Template List Text</li>
                        <li>Template List Text</li>
                    </ul>
                </div>
            </div>
        </div>
        <section class="copyright">
            Copyright © Oxygen 2021
        </section>
    </footer>
</body>
</html>