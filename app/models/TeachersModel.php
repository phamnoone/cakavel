<?php 
class TeachersModel extends Model {

    function checkLogin($_username, $_password) { 
        $username = $_username;
        $password = sha1($_password);
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