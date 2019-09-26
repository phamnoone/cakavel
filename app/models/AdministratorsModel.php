<?php 
class AdministratorsModel extends Model {

	 function checkLogin($_username,$_password){ 
        $username = $_username;
        $password = sha1($_password);
        $sql = "SELECT username,password,name FROM administrators WHERE username = :username and password = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username',$username);
        $stmt->bindValue(':password',$password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

}




 ?>