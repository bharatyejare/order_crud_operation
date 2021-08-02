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
       $orders=new Order_model;
       $data['data']=$orders->get_orders();
       //echo "<pre>";print_r($data);die();
       $this->load->view('includes/header');       
       $this->load->view('orders/list',$data);
       $this->load->view('includes/footer');
   }
   public function create()
   {
      $this->load->view('includes/header');
      $this->load->view('orders/create');
      $this->load->view('includes/footer');      
   }

   public function view($id)
   {
      $orders=new Order_model;
      $data['data']=$orders->edit_order_item($id);
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
      
        $orderno=rand();
        if(!empty($this->input->post('Save')) && !empty($this->input->post('ordername')) && !empty($this->input->post('customername')) && !empty($this->input->post('itemname'))&& !empty($this->input->post('quantity')))
        {
            $data = array(
                'order_no'=>$orderno,
                'order_name' => $this->input->post('ordername'),
                'customer_name' => $this->input->post('customername')
            );
            $orders=new Order_model;
            if(!empty($data)){
             $id=$orders->insert_data('orders',$data);
             
            }
            $item_array=$this->input->post('itemname');
            $quantity_array=$this->input->post('quantity');
            $order_details=array();
            foreach ($item_array as $key => $value) {
               $order_detail[$key]['items_name']=$value;
               $order_detail[$key]['quantity']=$quantity_array[$key];
               $order_detail[$key]['order_id']=$id;
            }
            foreach ($order_detail as $key => $value) {
               if(empty($value['order_id'])){
                 echo "Please Enter data";
                 die();
               }else{
                  $id=$orders->insert_data('order_items',$value);
                  redirect(base_url('orders'));
               }
            }
            if($id){
               redirect(base_url('orders'));
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
   public function update($id)
   {
      if(!empty($this->input->post('Save')) && !empty($this->input->post('ordername')) && !empty($this->input->post('customername')) && !empty($this->input->post('itemname'))&& !empty($this->input->post('quantity')))
        {
         $orders=new Order_model;
         $data=$orders->update_order($id);
         $update_item_array=$this->input->post('itemname');
         $update_quantity_array=$this->input->post('quantity');
         if(!empty($this->input->post('newhiddenelement'))){
           $newhiddenelement_value=$this->input->post('newhiddenelement');
         }else{
            $newhiddenelement_value='0';
         }
         $fetch_item_array=$orders->edit_order_item($id);
         $update_order_details=array();
         foreach ($update_item_array as $key => $value) {
            $update_order_details[$key]['items_name']=$value;
            $update_order_details[$key]['quantity']=$update_quantity_array[$key];
            $update_order_details[$key]['order_id']=$id;
            if(!empty($this->input->post('newhiddenelement'))){
              $update_order_details[$key]['hiddenid']=$newhiddenelement_value[$key];
            }
         }
         foreach ($update_order_details as $key => $value) {
            if(!empty($this->input->post('newhiddenelement'))){
            if($update_order_details[$key]['hiddenid']!=='' || $update_order_details[$key]['hiddenid']==''){
             unset($update_order_details[$key]['hiddenid']);
            }
         }
         }
         foreach ($fetch_item_array as $key => $value) {
               $update_order_details[$key]['item_id']=$value->item_id;
               
         }

         $delete_items_array=$this->input->post('hiddenelement');
         if(isset($delete_items_array)){
         foreach ($delete_items_array as $key => $value) {
            $delete_id=$orders->delete_item($value); 
            
         }
      
         foreach ($update_order_details as $key => $value) {
           
            if(empty($value['item_id']) && $newhiddenelement_value[$key]=='Deleted'){
            unset($update_order_details);
            }elseif(!empty($value['item_id']) && $newhiddenelement_value[$key]==0){
              $id=$orders->update_order_item($value,$value['item_id']); 
            }elseif(!empty($value['item_id']) && $newhiddenelement_value[$key]==1){
              $id=$orders->update_order_item($value,$value['item_id']); 
            }elseif(!empty($value['item_id']) && $value['item_id']!==''){
               unset($update_order_details);
             }elseif(empty($value['item_id']) && $newhiddenelement_value[$key]==1){
               $id=$orders->insert_data('order_items',$value);
            }else{
               if(empty($value['item_id']) && !empty($value['order_id'])){
                 $id=$orders->insert_data('order_items',$value);
               }
            }
         }     
            if($id!==''){
            redirect(base_url('orders'));
            }
            }else{
            echo "Empty";
            die();
            }
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
