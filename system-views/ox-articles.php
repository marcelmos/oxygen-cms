<?php
$data = include(__DIR__ . './../src/config.php');
// include_once dirname(__FILE__) . './../src/databaseActions.php';
// $conn = new oxdb;
$conn = new mysqli($data['host'], $data['username'], $data['password'], $data['database']);
?>

<h1 class="ox-title">Articles</h1>

<section class="ap-container">
    <article class="ox-article">
        <button class="btn btn-submit" onClick="displayModal()"><i class="fas fa-plus"></i> New Article</button>

        <form method="POST">
            <table class="ap-pages-articles">
                <tr>
                    <th><input type="checkbox"></th>
                    <th>Title</th>
                    <th>Author</th>
                    <th><i class="fas fa-comment-alt"></i></th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                <!-- AUTO CONTENT INPUT -->
                <?php
                $sql = "SELECT * FROM ".$data['prefix']."articles";
                $result = $conn->query($sql);

                if($result->num_rows > 0){
                    print_r($result);
                    while($row = $result->fetch_assoc()){
                        echo (
                            '<tr>
                                <td><input type="checkbox" name="element-id" value='.$row["id"].'"></td>
                                <td><a href="/?action=post&id='.$row["id"].'" class="link">'.$row["title"].'</a></td>
                                <td>'.($row["author"] == 1 ? "Admin" : "Other").'</td>
                                <td>'.$row["comments"].'</td>
                                <td>'.$row["date"].'</td>
                                <td>'.($row["status"] ? "Public" : "Hidden").'</td>
                            </tr>');
                    }
                }else{
                    echo (
                        '<tr>
                            <td class="app-no-data" colspan="6">No articles</td>
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
                    <th>Status</th>
                </tr>
            </table>

            <button type="submit" name="remove" class="btn btn-danger">Remove</button>
        </form>
    </article>
</section>

<!-- OPEN FILE MODAL -->
<div class="modal" aria-hidden="true">
    <button class="close" onClick="displayModal()">
        <i class="fas fa-times"></i>
    </button>

    <div id="editor-container">
        <div class="tool-bar">
            <!-- TITLE INPUT FIELD -->
            <input type="text" class="article-title" required placeholder="Article title">

            <div class="editor-functions-btn">
                <button class="btn btn-actions" title="Save file" onClick="saveFile()">
                    <i class="fas fa-save"></i>
                </button>
                <button class="btn btn-actions" title="Open file" onClick="displayModal()">
                    <i class="fas fa-folder-open"></i>
                </button>
                <select class="btn btn-actions " onClick="transform('formatBlock', this.value)">
                    <option value="H1">H1</option>
                    <option value="H2">H2</option>
                    <option value="H3">H3</option>
                    <option value="H4">H4</option>
                    <option value="H5">H5</option>
                    <option value="H6">H6</option>
                </select>
                <button class="btn btn-actions" title="Bold (Ctrl+B)" onClick="transform('bold', null)">
                    <i class="fas fa-bold"></i>
                </button>
                <button class="btn btn-actions" title="Italics (Ctrl+I)" onClick="transform('italic', null)">
                    <i class="fas fa-italic"></i>
                </button>
                <button class="btn btn-actions" title="Ordered List" onClick="transform('insertOrderedList', null)">
                    <i class="fas fa-list-ol"></i>
                </button>
                <button class="btn btn-actions" title="Unordered List" onClick="transform('insertUnorderedList', null)">
                    <i class="fas fa-list-ul"></i>
                </button>
            </div>
        </div>

        <!-- EDITOR FIELD -->
        <div id="editor" contenteditable>
            Test
        </div>

        <div class="action-btn">
            <input type="button" class="btn" value="Close" onClick="displayModal()">
            <input type="button" class="btn" value="Save as scratch" onClick="sendArticle()">
            <input type="button" class="btn btn-submit" value="Publish" onClick="sendArticle(true)">
        </div>
    </div>
</div>


<?php
    if(isset($_POST['article-title'])){
        if($_POST['submit-type'] == "publish"){
            $sql = "INSERT INTO ".$data['prefix']."articles (title, content, author, "."date".", status) VALUES ('".$_POST['article-title']."', '".$_POST['editor']."', 1, '".date('Y-m-d')."', 1)";
        }else{
            $sql = "INSERT INTO ".$data['prefix']."articles (title, content, author, "."date".", status) VALUES ('".$_POST['article-title']."', '".$_POST['editor']."', 1, '".date('Y-m-d')."', 0)";
        }

        $conn->query($sql);
        echo "Article published! Refresh for update article list.";
    }

    if(isset($_POST['remove'])){
        if(isset($_POST['element-id'])){
            $sql = "DELETE FROM ".$data['prefix']."articles WHERE '".$data['prefix']."articles'.'id' = ".$_POST['element-id'];
            $conn->query($sql);
        }
    }

$conn->close();
