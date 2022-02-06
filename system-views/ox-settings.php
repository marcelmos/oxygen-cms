<h1 class="ox-title">Settings</h1>

<!-- GENERAL -->
<section class="ap-container">
    <h3 class="ox-title">General</h3>
    <article class="ox-article">
        <form action="">
            <label>Site Title <input type="text" placeholder="My Own Website"></label>

            <button type="submit">Save</button>
        </form>
    </article>
</section>
<!-- GENERAL END -->

<!-- GENERAL -->
<section class="ap-container">
    <h3 class="ox-title">Theme</h3>
    <article class="ox-article">
        <table class="ap-pages-articles">
            <tr>
                <th>Preview</th>
                <th>Name</th>
                <th>Description</i></th>
                <th>Version</th>
                <th>Status</th>
            </tr>
            <?php
    // $stylesArr = scandir('./styles/css', 1);

    // foreach($stylesArr as $item => $value){
    //     if(strpos($value, '.css')){
    //         echo "<link rel='stylesheet' href='/styles/css/$value'>";
    //     }
    // }
    ?>
            <!-- AUTO CONTENT INPUT -->
            <?php
            $themeArr = scandir('../contents/themes', 1);

            foreach($themeArr as $item => $value){

                if($value){
                    $json = file_get_contents('../contents/themes/'.$value.'/theme.json');
                    $jsonData = json_decode($json);

                    echo $jsonData->name;

                }

                // while($row = $result->fetch_assoc()){
                    // echo (
                    //     '<tr>
                    //         <td>'.$row["username"].'</td>
                    //         <td>'.$row["name"].'</td>
                    //         <td>'.$row["mail"].'</td>
                    //         <td>'.$row["role"].'</td>
                    //     </tr>');
                // }
            }
            // }else{
            //     echo (
            //         '<tr>
            //             <td class="app-no-data" colspan="5">No themes found</td>
            //         </tr>');
            // }
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
<!-- GENERAL END -->

<!--
<section class="ap-container">
    <h3 class="ox-title">General</h3>
    <article class="ox-article">
        <form action="">
            <label>Site Title <input type="text" placeholder="My Own Website"></label>

            <button type="submit">Save</button>
        </form>
    </article>
</section> -->