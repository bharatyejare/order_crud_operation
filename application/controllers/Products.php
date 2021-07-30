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
       //echo "<pre>";print_r($data);die();
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

   public function view($id)
   {
      $products=new ProductsModel;
      $data['data']=$products->edit_products_item($id);
      $this->load->view('includes/header');
      $this->load->view('products/view',$data);
      $this->load->view('includes/footer');      
   }
   /**
    * Store Data from this method.
    *
    * @return Response
   */
   public function store()
   {
      
        $orderno=rand();
        if(!empty($this->input->post('Save')) && !empty($this->input->post('ordername')) && !empty($this->input->post('customername')) && !empty($this->input->post('itemname'))&& !empty($this->input->post('quantity')))
        {
            $data = array(
                'orderno'=>$orderno,
                'ordername' => $this->input->post('ordername'),
                'customername' => $this->input->post('customername')
            );
            $products=new ProductsModel;
            $id=$products->insert_common_function('orders',$data);
            $item_array=$this->input->post('itemname');
            $quantity_array=$this->input->post('quantity');
            $order_details=array();
            foreach ($item_array as $key => $value) {
               $order_detail[$key]['item_name']=$value;
               $order_detail[$key]['quantity']=$quantity_array[$key];
               $order_detail[$key]['orderid']=$id;
            }
            foreach ($order_detail as $key => $value) {
               $id=$products->insert_common_function('orders_item',$value);
            }
            if($id){
               redirect(base_url('products'));
            }else{
               echo "error";
               die();
            }
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
       $product['product']=$products->edit_products('orders',$id); 
       $product['order_item']=$products->edit_products_item($id); 
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
      //echo "<pre>";print_r($this->input->post());die();
      if(!empty($this->input->post('Save')) && !empty($this->input->post('ordername')) && !empty($this->input->post('customername')) && !empty($this->input->post('itemname'))&& !empty($this->input->post('quantity')))
        {
         $products=new ProductsModel;
         $row=$products->update_product($id);
         $delete_items_array=$this->input->post('hiddenelement');
         if(isset($delete_items_array)){
         foreach ($delete_items_array as $key => $value) {
            $delete_id=$products->delete_items($value); 
         }
      }
         $update_item_array=$this->input->post('itemname');
         $update_quantity_array=$this->input->post('quantity');
         $fetch_item_array=$products->edit_products_item($id);
         $update_order_details=array();
         foreach ($update_item_array as $key => $value) {
            $update_order_details[$key]['item_name']=$value;
            $update_order_details[$key]['quantity']=$update_quantity_array[$key];
         }
         foreach ($fetch_item_array as $key => $value) {
               $update_order_details[$key]['item_id']=$value->item_id;
               $update_order_details[$key]['orderid']=$value->orderid;
         }
         foreach ($update_order_details as $key => $value) {
               $id=$products->update_product_items($value,$value['item_id']); 
         }
         if($id!==''){
            redirect(base_url('products'));
          }
      }else{
         echo "Empty";
         die();
      }
      
   }
   /**
    * Delete Data from this method.
    *
    * @return Response
   */
   public function delete($id)
   {
      
      $this->db->from("orders_item");
      $this->db->where('orders_item.orderid', $id);
      $this->db->delete('orders_item');

      $this->db->from("orders");
      $this->db->where('orders.orderid', $id);
      $this->db->delete('orders');
      redirect(base_url('products'));
   }
}
