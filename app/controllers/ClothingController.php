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
                $data = [
                    'Clothes' => $this->Clothing_Line_model->GetData(),
                    'msg' => 'Updated Sucessfully!',
                ];
                $this->call->view('CRUD', $data);
            }
            else{
                $data = [
                    'Clothes' => $this->Clothing_Line_model->GetData(),
                    'msg' => 'Something Went Wrong',
                ];
                $this->call->view('CRUD', $data);
            }
        }else{
            $result = $this->Clothing_Line_model->SaveData($Name,$Size,$Quantity,$Price);
            if($result) {
                $data = [
                    'Clothes' => $this->Clothing_Line_model->GetData(),
                    'msg' => 'Saved Sucessfully!',
                ];
                $this->call->view('CRUD', $data);
            }
            else{
                $data = [
                    'Clothes' => $this->Clothing_Line_model->GetData(),
                    'msg' => 'Something Went Wrong',
                ];
                $this->call->view('CRUD', $data);
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
            $data = [
                'Clothes' => $this->Clothing_Line_model->GetData(),
                'msg' => 'Deleted Sucessfully!',
            ];
            $this->call->view('CRUD', $data);
        }
        else{
            $data = [
                'Clothes' => $this->Clothing_Line_model->GetData(),
                'msg' => 'Something Went Wrong',
            ];
            $this->call->view('CRUD', $data);
        }
        
    }
    
}
?>
