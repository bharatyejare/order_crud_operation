<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends CI_Controller {
   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
    //load database in autoload libraries 
      parent::__construct(); 
      $this->load->model('Order_model');         
   }
   public function index()
   {
       $order = new Order_model;  
       $data['orders'] = $order->get_orders();
       $this->load->view('includes/header');       
       $this->load->view('orders/index',$data);
       $this->load->view('includes/footer');
   }
   public function create()
   {
      $this->load->view('includes/header');
      $this->load->view('orders/create');
      $this->load->view('includes/footer');      
   }

   public function view($item_id)
   {  $order = new Order_model;  
      $data['orders'] = $order->get_order_items($item_id);
      $this->load->view('includes/header');
      $this->load->view('orders/view',$data);
      $this->load->view('includes/footer');      
   }
   /**
    * Store Data from this method.
    *
    * @return Response
   */
   public function store()
   {    
            $order=new Order_model;
            if($_POST['orders']['order_name']!=='' && $_POST['orders']['customer_name']!==''){
            $order_id=$order->insert_order('orders',$_POST['orders']);
           }else{
            echo "error";
            die();
         }
            foreach($_POST['order_items'] as $key => $value){
            if($value['item_name']!=='' && $value['qty']!=='' ){
               $value['order_id']=$order_id;
               $item_id=$order->insert_order_items('order_items',$value);
               redirect('orders');
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
       $order=new Order_model;
       $orders['orders']=$order->edit_order('orders',$id); 
       $orders['order_items']=$order->edit_order_item($id); 
       $this->load->view('includes/header');
       $this->load->view('orders/edit',$orders);
       $this->load->view('includes/footer');   
   }
   /**
    * Update Data from this method.
    *
    * @return Response
   */
   public function update($order_id){
            $order=new Order_model();
            $order_id_update=$order->update_order($order_id,$_POST['orders']); 
            $delete_order_items=$_POST['hiddenelement'];
            if(isset($delete_order_items)){
               foreach ($delete_order_items as $key => $value) {
                  $delete_id=$order->delete_order_items($value); 
               }
            }
            $items=$order->get_order_items($order_id);
            $update_order_details=array();
            foreach ($items as $key => $value) {
               $update_order_details[$key]['item_name']=$_POST['item_name'][$key];
               $update_order_details[$key]['qty']=$_POST['qty'][$key];
               $update_order_details[$key]['order_id']=$order_id;
               $update_order_details[$key]['item_id']=$value->item_id;
            }  
            $insert_order_items=array();
            foreach ($_POST['new_item_name'] as $key => $value) {
               if($_POST['new_item_name'][$key]!=='' && $_POST['new_qty'][$key]!=='' && $_POST['newhiddenelement'][$key]!=='Deleted'){
               $insert_order_items[$key]['item_name']=$_POST['new_item_name'][$key];
               $insert_order_items[$key]['qty']=$_POST['new_qty'][$key];
               $insert_order_items[$key]['order_id']=$order_id;
               $item_id=$order->insert_order_items('order_items',$insert_order_items[$key]);
            }
         }
         
            foreach($update_order_details as $key =>$value){
               $item_id=$order->update_order_item($value,$value['item_id']);
            }
            if($item_id!==''){
               redirect(base_url('orders'));
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
   public function delete_order($id)
   {
      
      $this->db->from("order_items");
      $this->db->where('order_items.order_id', $id);
      $this->db->delete('order_items');

      $this->db->from("orders");
      $this->db->where('orders.order_id', $id);
      $this->db->delete('orders');
      redirect(base_url('orders'));
   }
}
