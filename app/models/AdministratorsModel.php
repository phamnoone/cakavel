<?php
class AdministratorsModel extends Model
{
    public function login($admin)
    {
        $sql = "SELECT username FROM administrators WHERE username = :username and password = :password";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username', $admin['username']);
        $stmt->bindValue(':password', $admin['password']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return !empty($user);
    }

    public function updateToken($username, $token)
    {
        $sql = "UPDATE administrators SET `token` = :token WHERE `administrators`.`username` = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':token', $token);
        $stmt->execute();
    }

    public function checkAuthenWithToken($token)
    {
        $sql = "SELECT id FROM administrators WHERE `administrators`.`token` = :token";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':token', $token);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return !empty($result);
    }

    public function getWithToken($token)
    {
        $sql = "SELECT * FROM administrators WHERE `administrators`.`token` = :token";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':token', $token);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePass($password, $username)
    {
        $sql = "UPDATE administrators SET `password` = :password WHERE `administrators`.`username` = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':password', $password);
        $stmt->bindValue(':username', $username);

        return $stmt->execute();
    }

    public function updateInfor($name, $image, $note, $username)
    {
        $sql = "UPDATE administrators SET `name` = :name,`image` = :image ,`note` = :note WHERE `administrators`.`username` = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':image', $image);
        $stmt->bindValue(':note', $note);
        $stmt->bindValue(':username', $username);

        return $stmt->execute();
    }
}
