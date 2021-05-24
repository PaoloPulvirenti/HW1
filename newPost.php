<?php
require_once 'Credenziali.php';

$id=checkAuth();

?>

<html>
    <head>
    <link rel="stylesheet" href="newPost.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="newPost.js" defer></script>
<title>Ristorante "Pulvirenti"</title>
</head>
<body>
    <header>
        <nav>
            <span class="titolo">
            Il ristorante "Pulvirenti"
            </span>
            <div class="menu">
                <?php 
                if($_SESSION['accesso']>0||$_SESSION['tipo']=="Direttore")
                {
                echo "<a href='home.php'>Home</a> ";
                echo "<a href='profilo.php'>Il tuo profilo</a> ";
                echo "<a href='cosa mangio.php'>Cosa mangio?</a> ";
                echo "<a href='sale.php'>Sale</a> ";
                echo "<a href='logout.php'>Logout</a> ";
                }
                else
                {
                    echo "<a href='login.php'>Login</a>";
                }
                                ?>
                
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