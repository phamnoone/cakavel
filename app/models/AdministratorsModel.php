<?php 
class AdministratorsModel extends Model {

     function checkLogin($username, $password) {
        $sql = "SELECT username FROM administrators WHERE username = :username and password = :password";
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

    function insertToken($token, $username) {
        $sql = "UPDATE administrators SET `token` = :token WHERE `administrators`.`username` = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':token',$token);
        $stmt->bindValue(':username',$username);
        $stmt->execute();
    }

    function checkToken($token){
        $sql = "SELECT id FROM administrators WHERE `administrators`.`token` = :token";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':token',$token);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

    function infor($username){
        $sql = "SELECT password,name,image,note FROM administrators WHERE `administrators`.`username` = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username',$username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($result);
    }
}

?>