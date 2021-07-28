<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller {
   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
    //load database in autoload libraries 
      parent::__construct(); 
      $this->load->model('ProductsModel');         
   }
   public function index()
   {
       $products=new ProductsModel;
       $data['data']=$products->get_products();
       $this->load->view('includes/header');       
       $this->load->view('products/list',$data);
       $this->load->view('includes/footer');
   }
   public function create()
   {
      $this->load->view('includes/header');
      $this->load->view('products/create');
      $this->load->view('includes/footer');      
   }
   /**
    * Store Data from this method.
    *
    * @return Response
   */
   public function store()
   {
        
        $orderno=random_string('alnum', 6);
        
        //echo $this->input->post('submit');die();
        if(!empty($this->input->post('submit')) && !empty($this->input->post('ordername')) && !empty($this->input->post('customername'))){
            $data = array(
                'orderno'=>$orderno,
                'ordername' => $this->input->post('ordername'),
                'customername' => $this->input->post('customername')
            );
            $products=new ProductsModel;
            $id=$products->insert_product('orders',$data);
            //echo $id;die();
            if($id){
               echo "success";
               die();
            }else{
               echo "error";
               die();
            }
            }else{
               echo "empty";
               die();
            }
        }
   /**
    * Edit Data from this method.
    *
    * @return Response
   */
   public function edit($id)
   {
       $products=new ProductsModel;
       $product['product']=$products->edit_products($id); 
       $this->load->view('includes/header');
       $this->load->view('products/edit',$product);
       $this->load->view('includes/footer');   
   }
   /**
    * Update Data from this method.
    *
    * @return Response
   */
   public function update($id)
   {
       $products=new ProductsModel;
       $row=$products->update_product($id);
       //echo $row;die();
       if($row==1){
         redirect(base_url('products'));
       }
       //echo $row;die();
       
   }
   /**
    * Delete Data from this method.
    *
    * @return Response
   */
   public function delete($id)
   {
       $this->db->where('orderid', $id);
       $this->db->delete('orders');
       redirect(base_url('products'));
   }
}
