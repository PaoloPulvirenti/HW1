<?php 
    require_once 'Credenziali.php';
    if (!$userid = checkAuth()) {
        header("Location: Login.php");
        exit;
    }
?>
<?php
$campo=$_GET['t'];
$client_id = '15761d5c553c4fd591573ca1fcf74f89'; 
$client_secret = 'ed97a47f5866414e99f7c0e4368513d4'; 

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'https://accounts.spotify.com/api/token' );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST, 1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,'grant_type=client_credentials' ); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret)));
$token=json_decode(curl_exec($ch), true);
curl_close($ch);
if($campo=="Playlist")
{
$id = urlencode($_GET["em"]);
$url = 'https://api.spotify.com/v1/search?type=playlist&q='.$id;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
$res=curl_exec($ch);
curl_close($ch);

echo $res;
}
if($campo=="Musica")
{
$id = urlencode($_GET["em"]);
$url = 'https://api.spotify.com/v1/playlists/'.$id.'/tracks';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
$res=curl_exec($ch);
curl_close($ch);

echo $res;
}

?>