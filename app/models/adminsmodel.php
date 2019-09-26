
<?php
/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 */
class AdminsModel extends Model {

    function create () {
        //$stmt = $this->db->prepare();
        return [
            'name' => 'thanh',
            'address' => 'hanoi'
        ];
    }

    function checkLogin($_email,$_password){ 

        $username = $_email;
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
