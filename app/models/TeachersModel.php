<?php 
class TeachersModel extends Model
{
	public function listInfor($start,$limits)
    {
        $sql = "SELECT id,username,name,image,email,address,phone,description FROM teachers LIMIT :start, :limits";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':start', $start, PDO::PARAM_INT);
        $stmt->bindValue(':limits',$limits, PDO::PARAM_INT);
        $stmt->execute();
		$listInfor;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        	$listInfor[] = $row;
        }
        return $listInfor;

    }

    public function totalPage()
    {
        $sql = "SELECT COUNT(id) as totals FROM teachers";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>