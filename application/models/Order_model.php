<?php
class Order_model extends CI_Model{

    public function insert_data($table_name, $records = array()) {
        try {
            if (is_array($records) && !empty($records) && $table_name != '') {
                
                $this->db->insert($table_name, $records);
                //echo $this->db->last_query();//die();
                return $this->db->insert_id();
                
            } else {
                return false;
            }
            
        } catch (Exception $e) {
            exit("There is an error in the insert query");
        }
        
    }
    
    public function get_orders() {
        try {
            $this->db->select('orders.order_id,orders.order_no, orders.order_name,orders.customer_name')
            ->from('orders');
            $query = $this->db->get();
            return $query->result();
            
        } catch (Exception $e) {
            exit("There is an error in the select query");
        }
        
    } 
    
    public function edit_order($table_name,$id) {
        try {
            if (!empty($table_name) && !empty($id)) {
                
                $query = $this->db->get_where($table_name, array('order_id' => $id))->row();
                //echo $this->db->last_query();//die();
                return $query;
                
            } else {
                return false;
            }
            
        } catch (Exception $e) {
            exit("There is an error in the select query");
        }
        
    }
    
    public function edit_order_item($id) {
        try {
            $this->db->select('*')
            ->from('order_items')->where('order_id',$id);
            $query = $this->db->get();
            //echo $this->db->last_query();die();
            return $query->result();
            
        } catch (Exception $e) {
            exit("There is an error in the select query");
        }
        
    }
    
    public function update_order($id) {
        try {
            if (!empty($id)) {
                $data=array(
                    'order_name' => $this->input->post('ordername'),
                    'customer_name'=> $this->input->post('customername')
                );
                $this->db->where('order_id',$id);
                return $this->db->update('orders',$data);     
                
            } else {
                return false;
            }
            
        } catch (Exception $e) {
            exit("There is an error in the update query");
        }
        
    }

    public function update_order_item($data,$item_id) {
        try {
            if ($item_id!='') { 
                $this->db->where('item_id',$item_id);
                return $this->db->update('order_items',$data);
                //echo $this->db->last_query()."<br>";//die();
            } else {
                return false;
            }
            
        } catch (Exception $e) {
            exit("There is an error in the update query");
        }
        
    }

    public function delete_item($item_id) {
        $this->db->from("order_items");
        $this->db->where('order_items.item_id', $item_id);
        return  $this->db->delete('order_items');
        //echo "<pre>";print_r($this->db->last_query());//die();
        
    }
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

   public function order_items_num_rows($id) {
    try {
        $this->db->select('item_id')
        ->from('order_items')->where('item_id',$id);
        $query = $this->db->get();
    //echo $this->db->last_query().";<br>";//die();
        return  $query->num_rows();

        
    } catch (Exception $e) {
        exit("There is an error in the select query");
    }
    
}
    
}
?>