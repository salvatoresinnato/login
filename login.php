<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "login";

    $con = mysqli_connect($host,$user,$password,$db);

    if($con){
    
       
        
        if(empty($_POST["user"]) || empty($_POST["psw"])){
            echo '<script>alert("Tutti i campi sono obligatori")</script>';
            echo "<script>location.href='index.html'</script>";
        }else{

            session_start();
 
            $utente = md5($_POST["user"]);
            $pass = md5($_POST["psw"]);
        }

        $query = "SELECT COUNT(*) as conta FROM credenziali WHERE user='$utente' AND pass='$pass'";
        $consultation = mysqli_query($con,$query);
        $array = mysqli_fetch_array($consultation);

        if($array['conta']>0){
            $_SESSION['user'] = $utente;
            $_SESSION['pass'] = $pass;
            echo "<script>location.href='startbootstrap-freelancer/dist/inizio.php'</script>";
        }
        else{
            echo '<script>alert("Dati Erronei")</script>';
            echo "<script>location.href='index.html'</script>";
        }



    }
    else{
        echo "C'è qualcosa che non va";
    }
?>