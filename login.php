<?php

    require_once 'Credenziali.php';


    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

            $query = "SELECT id, username, password FROM utenti WHERE username = '$username'";
            $res2 = mysqli_query($conn, $query);
            if (mysqli_num_rows($res2) > 0) 
            {
                $entry = mysqli_fetch_assoc($res2);
                if (password_verify($_POST['password'], $entry['password'])) 
                {
                $_SESSION["accesso"] = $entry['id'];
                $_SESSION["tipo"]="Utente";
                header("Location: home.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
                }
    
            }
            else
            {
                $errore1 = "username e password errati.";
            }

            $query = "SELECT CF, username, password FROM direttore WHERE username = '$username'";
            $res2 = mysqli_query($conn, $query);
            if (mysqli_num_rows($res2) > 0) 
            {
                $entry = mysqli_fetch_assoc($res2);
                if (password_verify($_POST['password'], $entry['password'])) 
                {
                $_SESSION["accesso"] = $entry['CF'];
                $_SESSION["tipo"]="Direttore";
                header("Location: home.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
                }
    
            }
            else
            {
                $errore1 = "username e password errati.";
            }

                
             
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $errore1 = "Inserisci username e password.";
    }

?>

<html>
<head>
    <link rel="stylesheet" href="css home.css">
    <link rel="stylesheet" href="CSS/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Chango&family=Syne+Mono&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ristorante "Pulvirenti"</title>
</head>
    <body>
    <header>
        <nav>
            <span class="titolo">
            Il ristorante "Pulvirenti"
            </span>
            <div class="menu">
                <a href="home.php">Home</a>
                <a href="sing up.php">Registrati</a>
                <a href="login.php">Login</a>
            </div>

            <div class="menuApp">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </nav>
            <div class="centrale">
               <strong> Il ristorante più buono d'italia</strong>
               <h1>Vuoi conoscere la nostra storia?</h1>
               <a id="Button2">Clicca qui!</a>
            </div>
    </header>
    <section>
        <div id="Contorno">
            <div id="Login">
                <p>Login</p>
                <h1>Inserisci i tuoi dati</h1>
            </div>
            <form name='login' method="post">
                <div id=flex_column>
                    <div id=flex_row>
                        <p>Username</p>
                        <input name='username' type="text">
                    </div>
                    <div id=flex_row>
                        <p>Password</p>
                        <input name='password' type="password">
                    </div>
                </div>
                <div id='colore'>
            <div id="buttonDiv">
                <button type="submit">Accedi</button>
            </div>
            <?php if(isset($errore1))echo $errore1;?>
            </div>
            </form>
            <div class="signup"><a href="sing up.php">Non sei registrato? Registrati</a>
            </div>
        </div>
    </section>
    </body>
</html>