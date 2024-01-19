
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css"/>
</head>
<body>
    <div class="login_card">
        <h2>Login</h2>
        <h3>Enter your credentials</h3>
        <form action="" class="login_form">
            <input class="control" type="text" placeholder="username" name="username"/>
            <div class="password">
            <input class="control" id="password" type="password" placeholder="Password" name="password"/>
            <button class="toggle" type="button" onclick="togglePassword(this)"></button>
        </div>
        <button class="control">Login</button>
        </form>
    </div>
    <script type="text/javascript" src="main.js">
    </script>
</body>
</html>