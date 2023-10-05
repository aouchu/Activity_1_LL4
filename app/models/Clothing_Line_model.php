<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Clothing_Line_model extends Model {
    
    public function GetData(){
        $data = $this->db->table('clothes')->get_all();
		return $data;
    }

    public function SelectedData($id){
        $ID = $id;
        $data = $this->db->table('clothes')->where('id',$ID)->get();
		return $data;
    }

    public function DeleteData($id){
        $ID = $id;
        $data = $this->db->table('clothes')->where('id',$ID)->delete();
		return $data;
    }

    public function SaveData($name,$size,$quantity,$price){

        $bind = [
            'Name' => $name,
            'Size' => $size,
            'Quantity' => $quantity,
            'Price' => $price,
        ];
        
        return $this->db->table('clothes')->insert($bind);
    }
    public function UpdateData($Id,$name,$size,$quantity,$price){
        $ID = $Id;
        $bind = [
            'Name' => $name,
            'Size' => $size,
            'Quantity' => $quantity,
            'Price' => $price,
        ];
        
        return $this->db->table('clothes')->where('id',$ID)->update($bind);
    }
}
?>
