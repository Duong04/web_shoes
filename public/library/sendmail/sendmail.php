<?php 
    function send_mail ($email, $title, $content, $massage){
        require_once "./public/library/sendmail/vendor/phpmailer/phpmailer/src/Exception.php";
        require_once "./public/library/sendmail/vendor/phpmailer/phpmailer/src/PHPMailer.php";
        require_once "./public/library/sendmail/vendor/phpmailer/phpmailer/src/SMTP.php";
        $mail = new PHPMailer\PHPMailer\PHPMailer;

        try {
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'tinhdz3092004@gmail.com';                    
            $mail->Password   = 'smys nrus ziqu kryo';                               
            $mail->SMTPSecure = 'ssl';            
            $mail->Port       = 465;                                   
                
                    //Recipients
            $mail->CharSet = 'UTF-8';
            $mail->setFrom('tinhdz3092004@gmail.com', 'SUGAR');
            $mail->addAddress($email); 
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $title;
            $mail->Body    = $content;
            $mail->AltBody = $content;
                
            $mail->send();

            return true;
            } catch (Exception $e) {
                echo "Tạm thời không gửi mail được: {$mail->ErrorInfo}";
            }
    }
?>