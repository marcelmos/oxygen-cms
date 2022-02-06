<?php
$data = include(__DIR__ . './../src/config.php');
// include_once dirname(__FILE__) . './../src/databaseActions.php';
// $conn = new oxdb;
$conn = new mysqli($data['host'], $data['username'], $data['password'], $data['database']);

$post_id = $_GET['id'];

$result = $conn->query("SELECT * FROM ". $data['prefix'] ."articles WHERE id = $post_id");

while($row = $result->fetch_assoc()){
    echo (
        '<main class="main-content">
            <section class="hero">
                <h1 class="page-header">'.$row["title"].'</h1>
            </section>

            <section class="container">
                <article class="ox-article">
                    <h2 class="ox-title">'.$row["title"].'</h2>
                    <h4 class="article-date">'.$row["date"].'</h4>
                    <p class="article-prev">'.$row["content"].'</p>
                </article>
            </section>
        </main>');
}


$conn->close();