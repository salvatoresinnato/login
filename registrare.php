<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "login";

    $con = mysqli_connect($host,$user,$password,$db);

    if($con){

        if(empty($_POST["user"]) || empty($_POST["psw"])){
            echo '<script>alert("Tutti i campi sono obligatori")</script>';
            echo "<script>location.href='registro.html'</script>";
        }
        else{

            session_start(); 

            $nome = $_POST["nome"];
            $cognome = $_POST["cognome"];

            $mail = $_POST["mail"];

            $utente = md5($_POST["user"]);
            $pass = md5($_POST["psw"]);

            $query = "INSERT INTO credenziali (nome, cognome, user, pass, mail) VALUES ('$nome','$cognome','$utente','$pass','$mail');";
            $consultation = mysqli_query($con,$query);

            if($consultation){
                echo '<script>alert("Registro effettuato corettamente. Adesso accedi con le tue credenziali")</script>';
                echo "<script>location.href='index.html'</script>";
            }
            else{
                echo '<script>alert("cè qualcosa che non va")</script>';
                echo "<script>location.href='index.html'</script>";
            }

        }
        
    }
    else{
        echo "c'è qualcosa che non va";
    }

?>