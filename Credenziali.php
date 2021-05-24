<?php

    $dbconfig = [
        'host'     => '127.0.0.1',
        'name'     => 'dbristorante',
        'user'     => 'root',
        'password' => ''
    ];

    session_start();

    function checkAuth() {
        // Se esiste già una sessione, la ritorno, altrimenti ritorno 0
        if(isset($_SESSION['accesso'])) 
        {
            return $_SESSION['accesso'];
            
        } else 
        {
            $_SESSION['accesso']=-1;
            $_SESSION['tipo']="NULL";
            return $_SESSION['accesso'];
        }
    }
?>