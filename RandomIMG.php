<?php

  $key = "4809006e91064a3aa64c8d8ceabd554a";
  $tipo=$_GET['t'];

  if($tipo=="Prodotti")
  {
  $ch = curl_init();

  $contenuto=$_GET['c'];
  $nProdotti=$_GET['p'];
  
  curl_setopt($ch, CURLOPT_URL, 'https://api.spoonacular.com/recipes/complexSearch?query='.$contenuto.'&number='.$nProdotti.'&apiKey='.$key);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  curl_setopt($ch, CURLOPT_HEADER, 0);

  $res = curl_exec($ch);

  curl_close($ch);

  echo $res;
}
 if($tipo=="Random")
 {
    $ch = curl_init();

    $contenuto=$_GET['c'];
    
    curl_setopt($ch, CURLOPT_URL, 'https://foodish-api.herokuapp.com/api/images/'.$contenuto);
  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  
    curl_setopt($ch, CURLOPT_HEADER, 0);
  
    $res = curl_exec($ch);
  
    curl_close($ch);
  
    echo $res;

 }
?>