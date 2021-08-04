<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Customers extends CI_Controller {

    public function __construct()
    {
        parent::__construct(); 
        $this->load->model('Customer_model');
    }
    public function index(){
       $customer = new Customer_model;  
       $data['customers'] = $customer->get_customers();
       $this->load->view('includes/header');       
       $this->load->view('customers/index',$data);
       $this->load->view('includes/footer');
    }
    public function upload(){
        $this->load->view('includes/header');       
        $this->load->view('customers/upload');
        $this->load->view('includes/footer');
    }
    public function store(){
        $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['customers']['name']['customer_name']) && in_array($_FILES['customers']['type']['customer_name'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['customers']['name']['customer_name']);
            $extension = end($arr_file);
            if('xlsx' == $extension){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();   
            }elseif('xls' == $extension){
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            }else {
                echo "Invalid Excel format";
                die();
            }
            $spreadsheets = $reader->load($_FILES['customers']['tmp_name']['customer_name']);
            $sheet_customers_data = $spreadsheets->getActiveSheet()->toArray();
            $insert_customers_data=array();
            if (!empty($sheet_customers_data)) {
                for ($i=1; $i<count($sheet_customers_data); $i++) {
                    $insert_customers_data[$i]['customer_name'] = $sheet_customers_data[$i][0];
                    $insert_customers_data[$i]['customer_mobile'] = $sheet_customers_data[$i][1];
                    $insert_customers_data[$i]['customer_email'] = $sheet_customers_data[$i][2];
                   
                }
                $upload=new Customer_model;
                $result=$upload->insert_customers($insert_customers_data);
                if($result){
                    echo "Imported successfully";
                    redirect("customers");
                  }else{
                    echo "ERROR !";
                  }  
            }
            
        }
    }

    public function delete_order($id) {
      $this->db->from("customers");
      $this->db->where('customers.customer_id', $id);
      $this->db->delete('customers');
      redirect(base_url('customers'));
    }
}
?>
