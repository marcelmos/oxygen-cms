<?php
$data = include(__DIR__ . './../src/config.php');
// include_once dirname(__FILE__) . './../src/databaseActions.php';
// $conn = new oxdb;
$conn = new mysqli($data['host'], $data['username'], $data['password'], $data['database']);
?>

<main class="main-content">
    <section class="hero">
        <h1 class="page-header">BLOG</h1>
    </section>

    <section class="container blog">
        <!-- ARTICLE POST SECTION -->
        <section class="blog-articles">

            <?php

            $sql = "SELECT * FROM ox_articles";
            $result = $conn->query($sql);

            if($result != null && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    if($row["status"]){
                        echo (
                            '<article class="ox-article">
                                <h2 class="ox-title">'.$row["title"].'</h2>
                                <h4 class="article-date">'.$row["date"].'</h4>
                                <p class="article-prev">'.$row["content"].'</p>
                                <a href="/?action=post&id='.$row["id"].'"><button class="btn btn-submit">Read more...</button></a>
                            </article>');
                    }
                }
            }else{
                echo (
                    '<article class="ox-article">
                        <h2 class="ox-title">Oops... Looks like there is no article yet... :/</h2>
                    </article>');
            }
            ?>

        </section>
        <!-- ARTICLE POST SECTION END -->

        <!-- SIDE BAR -->
        <section class="side-bar">
            <!-- LAST POSTS -->
            <div class="last-post">
                <article class="ox-article">
                    <h2 class="ox-title">Last posts</h2>
                    <ul>
                        <?php
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                if($row["status"]){
                                    echo '<li>'.$row["title"].'</li>';
                                }
                            }
                        }else{
                            echo '<li>No articles found... :/</li>';
                        }
                        ?>
                    </ul>
                </article>
            </div>
            <!-- LAST POSTS END -->
        </section>
        <!-- SIDE BAR END -->
    </section>
</main>
<?php
$conn->close();
?>