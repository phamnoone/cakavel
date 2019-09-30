<?php 
class AdministratorsModel extends Model {

	 function checkLogin($username, $password) { 
        $pass = sha1($password);
        $sql = "SELECT username,password FROM administrators WHERE username = :username and password = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username',$username);
        $stmt->bindValue(':password',$pass);
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