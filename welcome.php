<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body{
            background-color: #777;
        }

        .row > div{
            color: #fff;
            background-color: #434343;
            margin: 30px 0;
            padding: 40px;
            border-radius: 20px; /* Redondear bordes */
            text-align: center; /* Centrar el contenido */
            display: flex;
            flex-direction: column;
            align-items: center;
        }   
    </style>

</head>
<body>

    <?php
        session_start();
        
        if(isset($_SESSION['user'])){

            $utente = $_SESSION['user'];

            $host = "localhost";
            $user = "root";
            $password = "";
            $db = "login";

            $con = mysqli_connect($host,$user,$password,$db);

            if($con){

                $query = "SELECT nome , cognome FROM credenziali WHERE user='$utente';";
                $consultation = mysqli_query($con,$query);
                
                if($consultation){
                    $array = mysqli_fetch_array($consultation);
                    $nome = $array['nome'];
                    $cognome = $array['cognome'];
                }
                else{
                    echo "Cè quacosa che non va";
                }

            }
            else{
                echo "Cè qualcosa che non va";
            }


        }else{
            echo '<script>location.href="index.html"</script>';
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12">
                <h1>
                    Benvenuto
                    <?php
                        echo $nome." ".$cognome;

                    ?>
                </h1>
            </div>
            <div class="col-12 col-lg-12">
            <a class="btn btn-primary" href="exit.php" role="button">Esci</a>
            </div>
        </div>
    </div>




    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>