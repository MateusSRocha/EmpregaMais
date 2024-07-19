<?php
$email = $_POST['email'];
$senha = $_POST['senha'];

$con = mysqli_connect('localhost', 'root', '', 'projeto');

   

if ($con) {
     $analisa = ("SELECT * FROM cliente WHERE email =
    '$email' AND senha = '$senha'");
     $result = mysqli_query($con, $analisa);
    if (mysqli_num_rows($result) > 0){
      header( "location:index.html");
       exit();  
   }
     else{
        echo "Email ou senha incorretos";
     }

    mysqli_close($con);
} else {
    echo 'Erro na conexão com o banco : ';
}
?>