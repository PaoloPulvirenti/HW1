
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
<script src="RandomImage.js" defer></script>
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
                <a href="sale.php">Sale</a>
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
    <p>Non sai che piatto mangiare oggi?</p>
        <section>            
            <form name ='ricerca' id='ricerca'>
			
                <h1>Seleziona un tipo di piatto e vediamo se potrebbe piacerti!!</h1>
                <select name = 'tipo' id='tipo'>
                    <option value='pasta'>Pasta</option>
                    <option value='rice'>Riso</option>
                    <option value='pizza'>Pizza</option>
                    <option value='burger'>Panini</option>
                    <option value='dessert'>Dessert</option>
                </select>                
                <input class="submit" type='submit' id='botton5' value='Cerca cibo'>                        
            </form>
                
            <div id='foto'>
                    
            </div>
            <p id='testoCibo' class="hidden"></p>

            <div id='prodotto'>
            </div>
            </div>
            

        </section>

    <footer>
            <h1 id="powered"> Il Ristorante "Pulvirenti"</h1>
            <h1 id="nome">Powered by Paolo Pulvirenti O46002175</h1>
    </footer>
</body>
</html>