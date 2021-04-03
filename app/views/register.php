<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../public/css/style.css" />


    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="auth-form-container">
            <div>
                <h1 class="text-center">Register</h1>
            </div>
            <form action="/auth/register" method="POST" class="auth-form">
                <div class="error-message <?php
                                            if (!empty($error)) echo 'show';
                                            else echo 'hide'
                                            ?>"><?php echo $error; ?></div>
                <input type="text" name="name" placeholder="Username" required>
                <input type="email" name="email" placeholder="example@email.com" required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="text-center">
                    <button type="submit">Register</button>
                </div>
            </form>
            <div class="text-center">
                Already have an account? <a href="/auth/login">Login</a>
            </div>
        </div>

    </div>
</body>

</html>