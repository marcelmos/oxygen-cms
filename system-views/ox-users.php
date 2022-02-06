<h1 class="ox-title">Users</h1>

<section class="ap-container">
    <article class="ox-article">
    <button class="btn btn-submit" onClick="displayModal()"><i class="fas fa-plus"></i> New User</button>

        <table>
            <tr>
                <th><input type="checkbox"></th>
                <th>Username</th>
                <th>Name</th>
                <th>Mail</th>
                <th>Role</th>
                <th>Posts</th>
            </tr>
            <!-- AUTO CONTENT INPUT -->
            <?php
            $sql = "SELECT * FROM ox_users";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo (
                        '<tr>
                            <td><input type="checkbox"></td>
                            <td>'.$row["username"].'</td>
                            <td>'.$row["name"].'</td>
                            <td>'.$row["mail"].'</td>
                            <td>'.$row["role"].'</td>
                            <td>0</td>
                        </tr>');
                }
            }else{
                echo (
                    '<tr>
                        <td class="app-no-data" colspan="6">No users</td>
                    </tr>');
            }

            $conn->close();

            ?>
            <!-- AUTO CONTENT INPUT END -->
            <tr>
                <th><input type="checkbox"></th>
                <th>Username</th>
                <th>Name</th>
                <th>Mail</th>
                <th>Role</th>
                <th>Posts</th>
            </tr>
        </table>
    </article>
</section>