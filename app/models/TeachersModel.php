<?php 
class TeachersModel extends Model {

    function checkLogin($username, $password) { 
        $username = $username;
        $password = sha1($password);
        $sql = "SELECT username,password FROM teachers WHERE username = :username and password = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username',$username);
        $stmt->bindValue(':password',$password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user) {
                return true;
        } else {
                return false;
        }
    }
}

?>