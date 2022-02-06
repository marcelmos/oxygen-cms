<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oxygen CMS - Install</title>
    <link rel="stylesheet" href="styles/css/style.css">
    <link rel="stylesheet" href="styles/css/btnStyle.css">
    <link rel="stylesheet" href="styles/css/oxSystemStyle.css">
</head>
<body>
    <main class="setup-content">
        <div>
            <h1>Welcome to Oxygen CMS setup installer</h1>

            <form class="ap-setup-form" action="/admin.php/?action=ox_setup" method="POST">
                <h2>Basic data</h2>

                <label>
                    Website title:
                    <input type="text" name="WebTitle">
                </label>

                <label>
                    Username:
                    <input type="text" name="Username">
                </label>

                <label>
                    Password:
                    <input type="password" name="Password">
                </label>

                <label>
                    E-mail:
                    <input type="email" name="Email">
                </label>

                <hr>

                <h2>Database</h2>

                <label>
                    Database Name:
                    <input type="text" name="DbName">
                </label>

                <label>
                    Username:
                    <input type="text" name="DbUsername">
                </label>

                <label>
                    Password:
                    <input type="password" name="DbPassword">
                </label>

                <label>
                    Database Host:
                    <input type="text" name="DbHost">
                </label>

                <label>
                    Table Prefix:
                    <input type="text" name="TablePrefix" value="ox_">
                </label>

                <input type="submit" class="btn btn-submit" value="Install CMS">
            </form>
        </div>
    </main>

</body>
</html>