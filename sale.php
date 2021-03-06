
<?php
require_once 'Credenziali.php';

$id=checkAuth();
?>

<html>
    <head>
    <link rel="stylesheet" href="Spotify&RandomIMG.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Chango&family=Syne+Mono&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="SpotifyAPI.js" defer></script>
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
                <a href="profilo.php">Il tuo profilo</a>
                <a href="logout.php">logout</a>
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
    <p>In che sala vorresti pranzare o cenare?</p>
        <section id="sezione2" >

        <button class='button1' id='botton5' value='Reggaeton 2021'>Sala Silvia</button>
        <button class='button2' id='botton5' value='Anni 90'>Sala Preziosa</button> 
        <button class='button3' id='botton5' value='Top 50 italia'>Sala Sinfonia</button>
            
        </section>

        <div id='fotoSale'></div>

        <div id='testo2'></div>
        <div id="immagini"></div>

        

    <footer>
            <h1 id="powered"> Il Ristorante "Pulvirenti"</h1>
            <h1 id="nome">Powered by Paolo Pulvirenti O46002175</h1>
    </footer>
</body>
</html>