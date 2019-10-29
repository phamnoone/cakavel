<?php 
class TeachersModel extends Model
{
	public function getPages($start,$limits)
    {
        $listInfor;
        $sql = "SELECT id,username,name,image,email,address,phone,description FROM teachers LIMIT :start, :limits";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':start', $start, PDO::PARAM_INT);
        $stmt->bindValue(':limits',$limits, PDO::PARAM_INT);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        	$listInfor[] = $row;
        }
        return $listInfor;

    }

    public function getWithUser($id)
    {
        $sql = "SELECT id, username, name, image, email, address, phone, description FROM teachers WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function totalPage()
    {
        $sql = "SELECT COUNT(id) as totals FROM teachers";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function checkUser($username)
    {
        $sql = "SELECT id FROM teachers WHERE `teachers`.`username` = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return empty($result);
    }

    public function addUser($infor,$image)
    {
        $sql = "INSERT INTO `teachers` (`username`, `password`, `name`, `image`, `email`, `address`, `phone`, `description`) VALUES ( :username, :password, :name, :image, :email, :address, :phone, :description)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username', $infor['user'], PDO::PARAM_STR);
        $stmt->bindValue(':password', mt_rand(), PDO::PARAM_STR);
        $stmt->bindValue(':name', $infor['name'], PDO::PARAM_STR);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $stmt->bindValue(':email', $infor['email'], PDO::PARAM_STR);
        $stmt->bindValue(':address', $infor['address'] , PDO::PARAM_STR);
        $stmt->bindValue(':phone', $infor['phone'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $infor['description'], PDO::PARAM_STR);

        $stmt->execute();
    }

    public function deleteUser($id){
        $sql = "DELETE FROM `teachers` WHERE `teachers`.`id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        
        return $stmt->execute();
    }

    public function updateInfor($info)
    {
        $sql = "UPDATE teachers SET `name` = :name, `image` = :image, `email` = :email, `address` = :address, `phone` = :phone, `description` = :description WHERE `teachers`.`username` = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username', $info['username']);
        $stmt->bindValue(':name', $info['name']);
        $stmt->bindValue(':image', $info['image']);
        $stmt->bindValue(':email', $info['email']);
        $stmt->bindValue(':address', $info['address']);
        $stmt->bindValue(':phone', $info['phone']);
        $stmt->bindValue(':description', $info['description']);

        return $stmt->execute();
    }

    public function search($infoSearch)
    {
        $sql = "SELECT id, username, name, image, email, address, phone, description FROM teachers WHERE ".$infoSearch['selected']." = :search ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':search', $infoSearch['search']);
        $stmt->execute();
        $info[] = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $info;
    }

}

?>