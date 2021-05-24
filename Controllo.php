<?php
    require_once 'Credenziali.php';

    if (!isset($_GET["em"])) {
        echo "Pagina non corretta!!";
        exit;
    }

    $id=checkAuth();

    header('Content-Type: application/json');

    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

    $tipo=mysqli_real_escape_string($conn, $_GET["t"]);

    if($tipo=="Email")
    {
        $email = mysqli_real_escape_string($conn, $_GET["em"]);
        $query = "SELECT email FROM utenti WHERE email = '$email'";
        $res[0] = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $query = "SELECT email FROM direttore WHERE email = '$email'";
        $res[1] = mysqli_query($conn, $query) or die(mysqli_error($conn));
        echo json_encode(array('exists0' => mysqli_num_rows($res[0]) > 0 ? true : false,
                               'exists1' => mysqli_num_rows($res[1]) > 0 ? true : false));
    }

    if($tipo=="Username")
    {
        $username=mysqli_real_escape_string($conn, $_GET["em"]);
        $query = "SELECT username FROM utenti WHERE Username = '$username'";
        $res[0] = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $query = "SELECT username FROM direttore WHERE username = '$username'";
        $res[1] = mysqli_query($conn, $query) or die(mysqli_error($conn));
        echo json_encode(array('exists0' => mysqli_num_rows($res[0]) > 0 ? true : false,
                               'exists1' => mysqli_num_rows($res[1]) > 0 ? true : false));
    }
    if($tipo=="Codice")
    {
        $codice=mysqli_real_escape_string($conn, $_GET["em"]);
        $query = "select ID_ristorante from ristorante where id_ristorante='$codice'";
        $res[0] = mysqli_query($conn, $query) or die(mysqli_error($conn));
        echo json_encode(array('exists0' => mysqli_num_rows($res[0]) > 0 ? true : false));
    }

    if($tipo=="Dati")
    {
        $query="select * from piatto";
        $res = mysqli_query($conn, $query);
        $results = array();
        $results1 = array();
        $results2= array();
        while($line = mysqli_fetch_array($res, MYSQLI_ASSOC)){    
        $results[] = $line;
        }
        if ($res) {

            $array=['item'=>$results];
            $query=" select piatto.ID,count(fk_piatto)  as n_like from dati_like right join piatto on dati_like.fk_piatto=piatto.id group by piatto.id";
            $res = mysqli_query($conn, $query);
            while($line = mysqli_fetch_array($res, MYSQLI_ASSOC)){    
                $results1[] = $line;
                }
                if($res)
                {
                    $array=$array+['piatti' =>$results1];
                    $query="select fk_piatto,utenti.id from utenti join dati_like on utenti.id=dati_like.fk_utente where fk_utente='".$_SESSION['accesso']."'";
                    $res = mysqli_query($conn, $query);
                        if($res)
                        {
                            while($line = mysqli_fetch_array($res, MYSQLI_ASSOC)){    
                                $results2[] = $line;
                                }
                            $array=$array+['utente' =>$results2];
                            if(!empty($_SESSION['tipo']))
                            if($_SESSION['tipo']=="Direttore")
                            {
                                $array=$array+['TIPO' =>"Direttore"];
                            }
                            echo json_encode($array);
                        }
                        else
                        {   
                            $results2 = "NULL";

                            $array=$array+['utente' =>$results2];
                            if(!empty($_SESSION['tipo']))
                            if($_SESSION['tipo']=="Direttore")
                            {
                                $array=$array+['TIPO' =>"Direttore"];
                            }
                            echo json_encode($array);
                        }
            }
        }
    }

    if($tipo=="Like")
    {
        $results = array();
        $piatto=mysqli_real_escape_string($conn, $_GET["em"]);
        $query="insert into dati_like values ('',".$piatto.",".$_SESSION['accesso'].");";
        $res = mysqli_query($conn, $query);
        echo json_encode(array('utente' =>$piatto));
    }

    if($tipo=="UnLike")
    {
        $results = array();
        $piatto=mysqli_real_escape_string($conn, $_GET["em"]);
        $query="DELETE FROM dati_like WHERE fk_piatto= ".$piatto." and fk_utente='".$_SESSION['accesso']."'";        
        $res = mysqli_query($conn, $query);
        echo json_encode(array('utente' =>$piatto));
    }

    if($tipo=="Mostra")
    {
        $piatto=mysqli_real_escape_string($conn, $_GET["em"]);
        $query="select * from piatto where id='$piatto'";
        $results5 = array();
        $res = mysqli_query($conn, $query);
        while($line = mysqli_fetch_array($res, MYSQLI_ASSOC)){    
            $results5[] = $line;
            }
            if($res)
            {
                $array1=['item'=>$results5];
                    echo json_encode($array1);
            }
    }

    if($tipo=="Recensioni")
    {
        $cancella=mysqli_real_escape_string($conn, $_GET["p"]);
                if($cancella=="cancella")
                {
                    $idRec=mysqli_real_escape_string($conn, $_GET["c"]);
                    $query="DELETE FROM dati_recensioni WHERE dati_recensioni.ID='$idRec'";
                    $res = mysqli_query($conn, $query);
                }
        $data = date('Y-m-d H:i:s');
        $piatto=mysqli_real_escape_string($conn, $_GET["em"]);
        $query= "select * from dati_recensioni where fk_piatto='$piatto'";
        $query2= "select utenti.* from dati_recensioni join utenti on dati_recensioni.fk_utente=utenti.ID where fk_piatto='$piatto' order by dati_recensioni.ID;"; 
        $query3="select * from utenti where ID='".$_SESSION['accesso']."'";
        $res = mysqli_query($conn, $query); 
        $results6 = array();
        $results7 = array();
        $results8= array();
        $res2 = mysqli_query($conn, $query2);
        $res3 = mysqli_query($conn, $query3);
                while($line = mysqli_fetch_array($res, MYSQLI_ASSOC)){    
                    $results6[] = $line;
                }
                while($line = mysqli_fetch_array($res2, MYSQLI_ASSOC)){    
                    $results7[] = $line;
                }
                while($line = mysqli_fetch_array($res3, MYSQLI_ASSOC)){    
                    $results8[] = $line;
                }
                $array2=['recensione'=>$results6,'utente'=>$results7,'piatto'=> $piatto,'data'=>$data];
                if($res3)
                {
                $array2=$array2+['utenteAccesso'=>$results8];
                }
                if($_SESSION["tipo"]=="Direttore")
                {
                    $array=$array2+['TIPO'=>'Direttore'];
                        echo json_encode($array);
                }
                else
                {
                    $array=$array2+['TIPO'=>'Utente'];
                    echo json_encode($array);
                }


                
            

                
    }

    if($tipo=="ADDRecensioni")
    {
        $data = date('Y-m-d H:i:s');
        $testo=mysqli_real_escape_string($conn, $_GET["em"]);
        $utente=mysqli_real_escape_string($conn, $_GET["u"]);
        $piatto=mysqli_real_escape_string($conn, $_GET["p"]);
        $results10=array();
        $query="insert into dati_recensioni values ('','$piatto','$utente','$testo','$data')";
        $res = mysqli_query($conn, $query);
        $query="select utenti.nome,utenti.cognome from utenti where utenti.id='$utente'";
        $res = mysqli_query($conn, $query);
        while($line = mysqli_fetch_array($res, MYSQLI_ASSOC)){    
            $results10[] = $line;
        }

        echo json_encode(array('recensione' =>['piatto' =>$piatto,'utente' =>$utente,'testo' =>$testo,'data' =>$data],'utenteAccesso'=>$results10));

    }

    if($tipo=="Profilo")
    {
        if($_SESSION["tipo"]=="Utente")
        {
       $query= "select * from utenti where id='".$_SESSION['accesso']."'";
       $query2="select piatto.img from dati_like join utenti on utenti.ID=dati_like.FK_utente join piatto on piatto.ID=dati_like.FK_piatto where utenti.id='".$_SESSION['accesso']."'";
       $query3=" select piatto.img,dati_recensioni.commento from dati_recensioni join utenti on utenti.ID=dati_recensioni.FK_utente join piatto on piatto.ID=dati_recensioni.FK_piatto where utenti.id='".$_SESSION['accesso']."'";
       $resultsProf= array();
       $resultsLike=array();
       $resultsRecen=array();
       $res=mysqli_query($conn, $query);
       $res2=mysqli_query($conn, $query2);
       $res3=mysqli_query($conn, $query3);
       while($line = mysqli_fetch_array($res, MYSQLI_ASSOC)){    
        $resultsProf[] = $line;
        }
        
        while($line = mysqli_fetch_array($res2, MYSQLI_ASSOC)){    
            $resultsLike[] = $line;
            }

            while($line = mysqli_fetch_array($res3, MYSQLI_ASSOC)){    
                $resultsRecen[] = $line;
                }
       
            $array=['TIPO'=>'Utente','DatiProfilo'=>$resultsProf];
            $array=$array+['Piatto'=>$resultsLike];
            $array=$array+['Recensione'=>$resultsRecen];
            
        echo json_encode($array);
        }

            if($_SESSION["tipo"]=="Direttore")
            {
                $query= "select * from direttore where CF='".$_SESSION['accesso']."'";
                $res=mysqli_query($conn, $query);
                while($line = mysqli_fetch_array($res, MYSQLI_ASSOC)){    
                    $resultsProf[] = $line;
                    }
                    $array=['TIPO'=>'Direttore','DatiProfilo'=>$resultsProf];
                    echo json_encode($array);
            }

    }

    if($tipo=="Elimina")
    {
        $piatto=mysqli_real_escape_string($conn, $_GET["em"]);
        $query="delete from dati_like where dati_like.FK_piatto='$piatto'";
        $query2="delete from dati_recensioni where dati_recensioni.FK_piatto='$piatto'";
        $query3="delete from piatto where id='$piatto'";
        $res=mysqli_query($conn,$query);
        $res2=mysqli_query($conn,$query2);
        $res3=mysqli_query($conn,$query3);
    
        echo json_encode(array('piatto' => $piatto));

    }

    if($tipo=="caricaPiatto")
    {
      $img=mysqli_real_escape_string($conn, $_GET["em"]);
      $titolo=mysqli_real_escape_string($conn, $_GET["tit"]);
      $desc=mysqli_real_escape_string($conn, $_GET["desc"]);

      $query="insert into piatto  value ('','$img','$titolo','$desc')";
      $res=mysqli_query($conn,$query);

      echo json_encode('ok');

    }




    // Chiudo la connessione
    mysqli_close($conn);
?>