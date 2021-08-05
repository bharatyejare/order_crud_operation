<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {
public function __construct() {
   parent::__construct(); 
   $this->load->model('Order_model');         
}

public function index(){
   $order_obj = new Order_model;  
   $data['orders'] = $order_obj->get_orders();
   $this->load->view('includes/header');       
   $this->load->view('orders/index',$data);
   $this->load->view('includes/footer');
}

public function create(){
   $this->load->view('includes/header');
   $this->load->view('orders/create');
   $this->load->view('includes/footer');      
}

public function view($order_id){
   $order_obj = new Order_model;  
   $data['orders'] = $order_obj->get_order_items($order_id);
   $this->load->view('includes/header');
   $this->load->view('orders/view',$data);
   $this->load->view('includes/footer');      
}

public function store() {       
   $order_obj=new Order_model;
   if($_POST['orders']['order_name']!=='' && $_POST['orders']['customer_name']!==''){
   $order_id=$order_obj->insert_order('orders',$_POST['orders']);
   }else{
   echo "error";
   die();
   }

   $order_items_obj=new Order_model;
   if(!empty($_POST['order_items'])){
   foreach ($_POST['order_items'] as $index => $item) {
   if($_POST['new_order_items'][$index]['delete_order_items']==''){
   $item['order_id']=$order_id;
   $item_id=$order_items_obj->insert_order_items('order_items',$item);
   }
   }
   redirect('orders');
   }  
}

public function edit($order_id){
   $order_obj=new Order_model;
   $order_items_obj=new Order_model;
   $orders['orders']=$order_obj->edit_order('orders',$order_id); 
   $orders['order_items']=$order_items_obj->edit_order_item($order_id); 
   $this->load->view('includes/header');
   $this->load->view('orders/edit',$orders);
   $this->load->view('includes/footer');   
}

public function update($order_id){
   $order_obj=new Order_model();
   $order_id_update=$order_obj->update_order($order_id,$_POST['orders']); 

   $order_items_obj=new Order_model();
   $items=$order_items_obj->get_order_items($order_id);
   foreach ($_POST['order_items'] as $index => $item) {
   $item['order_id']=$items[$index]->order_id;
   $item['item_id']=$items[$index]->item_id;
   $order_item_result=$order_items_obj->update_order_item($item,$item['item_id']);
   }

   $insert_order_items=array();
   foreach ($_POST['new_item_name'] as $index => $item) {
   if($item['new_item_name']!=='' && $item['new_qty']!=='' && $_POST['delete_order_item'][$index]!=='Deleted'){
   $insert_order_items[$index]['item_name']=$_POST['new_item_name'][$index];
   $insert_order_items[$index]['qty']=$_POST['new_qty'][$index];
   $insert_order_items[$index]['order_id']=$order_id;
   $order_items_obj=new Order_model();
   $item_id=$order_items_obj->insert_order_items('order_items',$insert_order_items[$index]);
   }
   }

   $delete_order_items=$_POST['delete_hidden_order_item'];
   if(isset($delete_order_items)){
   foreach ($delete_order_items as $key => $value) {
   $order_items_obj=new Order_model();
   $delete_id=$order_items_obj->delete_order_items($value); 
   }
   }

   if($item_id!==''){
   redirect(base_url('orders'));
   }else{
   echo "Empty";
   die();
   }       
}   
            
public function delete_order($id)  {
   $this->db->from("order_items");
   $this->db->where('order_items.order_id', $id);
   $this->db->delete('order_items');

   $this->db->from("orders");
   $this->db->where('orders.order_id', $id);
   $this->db->delete('orders');
   redirect(base_url('orders'));
   }
}
