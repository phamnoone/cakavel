<?php 
class StudentsModel extends Model {

	 function checkLogin($id, $password) { 
        $id = $id;
        $password = sha1($password);
        $sql = "SELECT id,password FROM students WHERE id = :id and password = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id',$id);
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