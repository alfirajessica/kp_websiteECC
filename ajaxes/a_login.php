<?php
    session_start();
    require_once "../config/conn.php";
    require_once "../classes/user.php";
    if ($_POST["kind"]=="login") {
        $arrdecoded=json_decode($_POST["input"]);
        $conn=getConn();
        
        $stmt = $conn->prepare("select username,nama,level,status from user where username=? and password=?");
        $stmt->bind_param('ss', $u,$p);
        $u=$arrdecoded->u;
        $p=sha1($arrdecoded->p);
        
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows>0) {
            while ($row = $result->fetch_assoc()) {
                //cara membuat dan membaca
                $username=$row["username"];
                $name=$row["nama"];
                $level=$row["level"];
                $status=$row["status"];
                $res=array("status"=>0,"data"=>"Akun anda masih belum aktif","link"=>"login.php");
                if ($status=="1") {
                    $newUser = new User($username,$name,$level);
                    $_SESSION["user"]=serialize($newUser);
                    $res=array("status"=>1,"data"=>"Berhasil silahkan masuk","link"=>"dashboard.php");
                }
            }
        }else{
            $res=array("status"=>0,"data"=>"Username atau Password yang dimasukan salah !","link"=>"");
        
        }
       
        echo json_encode($res);

        $conn->close();

        

    }else if ($_POST["kind"]=="ganti_password") {
       $password=$_POST["password"];
       echo $password;
    }

    
?>