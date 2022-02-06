<?php
$errors = [];
$error_txt = '';

$web_title = $_POST['WebTitle'];
$username = $_POST['Username'];
$password = $_POST['Password'];
$email = $_POST['Email'];

$db_host = $_POST['DbHost'];            // Host
$db_username = $_POST['DbUsername'];    // Username
$db_pass = $_POST['DbPassword'];        // Password
$db_name = $_POST['DbName'];            // Database Table

$prefix = $_POST['TablePrefix'];

$tableArticles = 'CREATE TABLE '. $prefix .'articles (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title text NOT NULL,
    content longtext NOT NULL,
    tags text NOT NULL,
    author int(11) NOT NULL,
    date date NOT NULL,
    comments int(11) NOT NULL,
    status tinyint(1) NOT NULL
    )';

$tableUsers = 'CREATE TABLE '. $prefix .'users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username varchar(30) NOT NULL,
    mail varchar(40) NOT NULL,
    password varchar(40) NOT NULL,
    name varchar(30) NOT NULL,
    role int(11) NOT NULL
    )';

$tableSettings = 'CREATE TABLE '. $prefix .'settings (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ox_hook varchar(40) NOT NULL,
    ox_content varchar(40) NOT NULL
    )';

$tables = [$tableArticles, $tableUsers, $tableSettings];


// Create connection
$conn = new mysqli($db_host, $db_username, $db_pass);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE " . $db_name;
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully <br>";

  $conn = new mysqli($db_host, $db_username, $db_pass, $db_name);

  foreach($tables as $t => $sql) {
    $query = @$conn->query($sql);

    if(!$query)
       $errors[] = "Table $t: Creation failed ($conn->error)";
    else
       $errors[] = "Table $t: Creation done";
  }

  if(!file_exists(__DIR__ . '/../src/config.php')){
      $config = fopen(__DIR__ . '/../src/config.php', 'a');
      $data = '<?php'. PHP_EOL .'return ['. PHP_EOL .' "host" => "'. $db_host .'",'. PHP_EOL .' "username" => "'. $db_username .'",'. PHP_EOL .' "password" => "'. $db_pass .'",'. PHP_EOL .' "database" => "'. $db_name .'", '. PHP_EOL .' "prefix" => "'. $prefix .'", '. PHP_EOL .'];';
      fwrite($config, $data);
      fclose($config);
  }

} else {
  echo "Error creating database: " . $conn->error;
  $error_txt = "Error creating database: " . $conn->error;
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup</title>
    <link rel="stylesheet" href="./../public/styles/css/style.css">
    <link rel="stylesheet" href="./../public/styles/css/btnStyle.css">
    <link rel="stylesheet" href="./../public/styles/css/oxSystemStyle.css">
</head>
<body>
    <main class="setup-content">
        <div>
            <h1>Installation status:</h1>

            <pre>
                <?php
                    echo $error_txt;

                    foreach($errors as $msg) {
                        echo "$msg <br>";
                    }
                ?>
            </pre>

            <a href="/" class="btn btn-submit">Go to Homepage</a>
        </div>
    </main>
</body>
</html>