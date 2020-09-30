<?php

    //SESSION Authentikasi aja gk pakek token lgsg lempar
    if (isset($_SESSION["user"])) {
        //kl ad gk ngapa ngapain
    }else{
        header("location:login.php");
    }

?>