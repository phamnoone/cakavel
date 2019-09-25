<?php
/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 */
class Users extends Model {

    function create () {
        //$stmt = $this->db->prepare();
        return [
            'name' => 'thanh',
            'address' => 'hanoi'
        ];
    }

    function adminators($_email,$_password){  
    	$username = $_email;
    	$password = sha1($_password);
  
	    $sql = "SELECT username,password FROM administrators WHERE username = :username and password = :password";
        $stmt = $this->db->prepare($sql);
         //Bind value.
        $stmt->bindValue(':username',$username);
        $stmt->bindValue(':password',$password);
         //Execute.
        $stmt->execute();
        //Fetch row.
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

   

}

?>
