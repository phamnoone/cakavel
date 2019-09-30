<?php 
class StudentsModel extends Model {

	 function checkLogin($_id, $_password) { 
        $id = $_id;
        $password = sha1($_password);
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