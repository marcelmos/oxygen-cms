<h1 class="ox-title">Pages</h1>

<section class="ap-container">
    <article class="ox-article">
        <button class="btn btn-submit" onClick="displayModal()"><i class="fas fa-plus"></i> New Page</button>

        <table class="ap-pages-articles">
            <tr>
                <th><input type="checkbox"></th>
                <th>Title</th>
                <th>Author</th>
                <th><i class="fas fa-comment-alt"></i></th>
                <th>Date</th>
            </tr>
            <!-- AUTO CONTENT INPUT -->
            <?php
            $sql = "SELECT * FROM ox_users";
            $result = $conn->query($sql);

            if($result != null && $result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo (
                        '<tr>
                            <td><input type="checkbox"></td>
                            <td>'.$row["username"].'</td>
                            <td>'.$row["name"].'</td>
                            <td>'.$row["mail"].'</td>
                            <td>'.$row["role"].'</td>
                        </tr>');
                }
            }else{
                echo (
                    '<tr>
                        <td class="app-no-data" colspan="5">No pages</td>
                    </tr>');
            }



            ?>
            <!-- AUTO CONTENT INPUT END -->
            <tr>
                <th><input type="checkbox"></th>
                <th>Title</th>
                <th>Author</th>
                <th><i class="fas fa-comment-alt"></i></th>
                <th>Date</th>
            </tr>
        </table>
    </article>
</section>
<?php
$conn->close();
?>