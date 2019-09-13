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

}

?>
