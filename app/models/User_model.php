<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
	public function getUsers(){
        return $this->db->table('users')->like('username', '%U%')->get_all();
    }
}
?>
