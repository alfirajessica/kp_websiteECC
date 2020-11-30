<?php
session_start();
require_once "../config/conn.php";
require_once "../classes/user.php";
if ($_POST["kind"] == "login") {
    $arrdecoded = json_decode($_POST["input"]);
    $conn = getConn();

    $stmt = $conn->prepare("select username,nama,level,status from user where username=? and password=?");
    $stmt->bind_param('ss', $u, $p);
    $u = $arrdecoded->u;
    $p = sha1($arrdecoded->p);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            //cara membuat dan membaca
            $username = $row["username"];
            $name = $row["nama"];
            $level = $row["level"];
            $status = $row["status"];
            $res = array("status" => 0, "data" => "Akun anda masih belum aktif", "link" => "login.php");
            if ($status == "1") {
                $newUser = new User($username, $name, $level);
                $_SESSION["user"] = serialize($newUser);
                $res = array("status" => 1, "data" => "Berhasil silahkan masuk", "link" => "dashboard.php");
            }
        }
    } else {
        $res = array("status" => 0, "data" => "Username atau Password yang dimasukan salah !", "link" => "");
    }

    echo json_encode($res);

    $conn->close();
} else if ($_POST["kind"] == "ganti_password") {
    $conn = getConn();
    $password = $_POST["password"];
    $arr = unserialize($_SESSION["user"]);
    $username = $arr->get_u();
    $shapass = sha1($password);
    $sql = "update user set password='$shapass' where username='$username'";
    $res = $conn->query($sql);
    if ($res == "1") {
        echo "Berhasil";
    } else {
        echo "Gagal";
    }
}else if($_POST["kind"]=="forgot"){
    $body="test";
    $sendto=$_POST["email"];
    $namauser="";

    kirimemail($body,$sendto,$namauser);
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


 function kirimemail($body,$sendto,$namauser){
  
    //$body="'This is the HTML message body <b>in bold!</b>'";
    // $body=$_POST['isi'];
    // $sendto=$_POST['to'];
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function

    // Load Composer's autoloader
    
    require 'mailvendor/autoload.php';
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $kal="";
    $err="";
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        //$mail->Host       = 'localhost';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'orientnusherbal@gmail.com';      // SMTP username
        $mail->Password   = 'Onh817988';                    // SMTP password
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        // $mail->Port       = 587;       
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;   
        $mail->Port       = 465;             // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                                     // TCP port to connect to
                                  // TCP port to connect to

        //Recipients
        $mail->setFrom('orientnusherbal@gmail.com', 'Orient Herbal');
        $mail->addAddress($sendto,$namauser);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $kal= 'Message has been sent';
    } catch (Exception $e) {
        $err= "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    if ($err=="") {
        echo $kal;
    }else{
        echo $err;
    }
 }