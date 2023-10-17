<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ClothingController extends Controller {

    public function __construct(){
        parent:: __construct();
        $this->call->model('Clothing_Line_model');
    }
	
    public function DisplayData() {
        $data = [
            'Clothes' => $this->Clothing_Line_model->GetData(),
        ];

        $this->call->view('CRUD', $data);
    }

    public function Save() {
        $id = $_POST['id'];
        $Name = $_POST['Name'];
        $Size = $_POST['Size'];
        $Quantity = $_POST['Quantity'];
        $Price = $_POST['Price'];
        
        if($id != null) {
            $result = $this->Clothing_Line_model->UpdateData($id,$Name,$Size,$Quantity,$Price);
            if($result) {
                $this->session->set_flashdata('msg','Updated Successfully');
                redirect(base_url().'/Manage');
            }
            else{
                $this->session->set_flashdata('msg','Something Went Wrong');
                redirect(base_url().'/Manage');
            }
        }else{
            $result = $this->Clothing_Line_model->SaveData($Name,$Size,$Quantity,$Price);
            if($result) {
                $this->session->set_flashdata('msg','Saved Successfully');
                redirect(base_url().'/Manage');
            }
            else{
                $this->session->set_flashdata('msg','Something Went Wrong');
                redirect(base_url().'/Manage');
            }
        };
    }

    public function Edit($id) {
        $ID = $id;
        $data = [
            'selected' => $this->Clothing_Line_model->SelectedData($ID), 
            'Clothes' => $this->Clothing_Line_model->GetData(),
        ];

        $this->call->view('CRUD', $data);
    }

    public function Delete($id) {
        $ID = $id;
        $result = $this->Clothing_Line_model->DeleteData($ID);
        if($result) {
            $this->session->set_flashdata('msg','Deleted Successfully');
            redirect(base_url().'/Manage');
        }
        else{
            $this->session->set_flashdata('msg','Something Went Wrong');
            redirect(base_url().'/Manage');
        }
        
    }
    
}
?>
