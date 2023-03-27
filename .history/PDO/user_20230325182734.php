<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    function select_userAll(){
        $sql = "SELECT * FROM user";
        return pdo_query($sql);
    }

    function select_userID($id){
        $sql = "SELECT * FROM user WHERE id_user = ?";
        return pdo_query($sql,$id);
    }

    function update_user($id,$role){
        $sql = "UPDATE user SET role = ? Where id_user = ?";
        pdo_execute($sql, $role, $id);
    }

    function delete_user($id){
        $sql = "DELETE FROM user WHERE id_user = ?";
        pdo_execute($sql, $id);
    }

    function check_email($email){
        $sql = "SELECT * FROM user WHERE email = ?";
        return pdo_check($sql, $email);
    }
    function check_phone($phone){
        $sql = "SELECT * FROM user WHERE phone = ?";
        return pdo_check($sql, $phone);
    }
    function insert_user($name, $email, $pass, $phone){
        $sql = "INSERT INTO user (name, email, password, phone) VALUES (?,?,?,?)";
        pdo_execute($sql, $name, $email, $pass, $phone);
    }

    function mailler($email){
        $mail =  new PHPMailer(true);
        $mail -> isSMTP();
        $mail -> Host = 'smtp.gmail.com';
        $mail -> SMTPAuth = true;
        $mail -> Username = 'toan5802016@gmail.com';
        $mail -> Password = 'vfsbcosvqxnmutyn';
        $mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail -> Port = 587;


        $mail -> setFrom('toan5802016@gmail.com' , 'Robot_Pet');
        $mail -> addAddress($email);
        $mail -> isHTML(true);
        $mail -> Subject = 'DANG KY TAI KHOAN THANH CONG';
        $mail -> Body = 'Chúc mừng bạn đã đăng ký tài khoản thành công. Cảm ơn bạn đã trở thành thành viên của XShop.';
        $mail -> send();
    }
?>