<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../public/css/style.css" />

    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="auth-form-container">
            <div>
                <h1 class="text-center">Login</h1>
            </div>
            <div class="error-message <?php
                                        if (!empty($error)) echo 'show';
                                        else echo 'hide'
                                        ?>"><?php echo $error; ?></div>
            <form action="/auth/login" method="POST" class="auth-form">
                <input type="email" name="email" placeholder="example@email.com" required>
                <input type="password" name="password" required>
                <div class="text-center">
                    <button type="submit">Login</button>
                </div>
            </form>
            <div class="text-center">
                Don't have an account? <a href="/auth/register">Register</a>
            </div>

        </div>

    </div>
</body>

</html>