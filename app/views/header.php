<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP_NOTE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary justify-content-between">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="?c=home">Home</a></li>
            </ul>


            <ul class="navbar-nav">
            <?php if (isset($_SESSION['email'])) { ?>
                <li class="nav-item">
                    <a class="btn btn-outline-dark" href="?c=signOut">Sign Out</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="btn btn-outline-dark" href="?c=signUpUser">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-dark" href="?c=signInUser">Sign In</a>
                </li>
            <?php } ?>  
        </ul>
        </nav>
    </header>