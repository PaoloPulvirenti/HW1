<?php
require_once 'Credenziali.php';

$id=checkAuth();
$error=array();
if (!empty($_POST["vecchia"]) && !empty($_POST["nuova"]) && !empty($_POST["conferma"]))
    {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));


        if($_SESSION["tipo"]=="Utente")
        {
        $query="select utenti.password from utenti where utenti.id='".$_SESSION['accesso']."'";
        $res=mysqli_query($conn,$query);
        $passwordDataBase=mysqli_fetch_assoc($res);
        }
        if($_SESSION["tipo"]=="Direttore")
        {
        $query="select direttore.password from direttore where direttore.CF='".$_SESSION['accesso']."'";
        $res=mysqli_query($conn,$query);
        $passwordDataBase=mysqli_fetch_assoc($res);
        }
        if(!password_verify($_POST['vecchia'], $passwordDataBase['password'])){
            $error[] = "Password vecchia errata!!";
            $errore="Password vecchia errata!!";
            }
        if (strlen($_POST["nuova"]) < 8) {
            $error[] = "Caratteri password insufficienti";
            $errore="Password con carratteri insufficienti";
            }
        
        if (strcmp($_POST["nuova"], $_POST["conferma"]) != 0) {
                $error[] = "Le password non coincidono";
                $errore="Le password non coincidono";
            }

            if (count($error) == 0)
            {
                $errore="Password Modificata con successo";
                $passwordNuova=password_hash($_POST["nuova"], PASSWORD_BCRYPT);
                $query="UPDATE utenti SET Password ='$passwordNuova'  WHERE ID ='".$_SESSION['accesso']."'";
                $res=mysqli_query($conn,$query);
                echo "<script type='text/javascript'>alert('$errore');</script>";
            }
            else
            {               
                echo "<script type='text/javascript'>alert('$errore');</script>";
            }

    }



?>
<html>
    <head>
    <link rel="stylesheet" href="css home.css">
    <link rel="stylesheet" href="profilo.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="profilo.js" defer></script>
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
                <a href="cosa mangio.php">Cosa mangio?</a>
                <a href="sale.php">Sale</a>
                <a href="logout.php">Logout</a>
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
            </div>
    </header>
        <section > 
        </section>
    <footer>
            <h1 id="powered"> Il Ristorante "Pulvirenti"</h1>
            <h1 id="nome">Powered by Paolo Pulvirenti O46002175</h1>
    </footer>
</body>
</html>

