<?php
class ProductsModel extends CI_Model{
    
    public function get_products() {
        try {
            $this->db->select('orders.orderid,orders.orderno, orders.ordername,orders.customername')
            ->from('orders');
            $query = $this->db->get();
            return $query->result();
            
        } catch (Exception $e) {
            exit("There is an error in the select query");
        }
        
    } 
    
    public function edit_products($table_name,$id) {
        try {
            if (!empty($table_name) && !empty($id)) {
                
                $query = $this->db->get_where($table_name, array('orderid' => $id))->row();
                //echo $this->db->last_query();//die();
                return $query;
                
            } else {
                return false;
            }
            
        } catch (Exception $e) {
            exit("There is an error in the select query");
        }
        
    }
    
    public function edit_products_item($id) {
        try {
            $this->db->select('*')
            ->from('orders_item')->where('orderid',$id);
            $query = $this->db->get();
            //echo $this->db->last_query();die();
            return $query->result();
            
        } catch (Exception $e) {
            exit("There is an error in the select query");
        }
        
    }
    
    public function insert_common_function($table_name, $records = array()) {
        try {
            if (is_array($records) && !empty($records) && $table_name != '') {
                
                $this->db->insert($table_name, $records);
                return $this->db->insert_id();
                
            } else {
                return false;
            }
            
        } catch (Exception $e) {
            exit("There is an error in the insert query");
        }
        
    }
    public function update_product($id) {
        try {
            if (!empty($id)) {
                $data=array(
                    'ordername' => $this->input->post('ordername'),
                    'customername'=> $this->input->post('customername')
                );
                $this->db->where('orderid',$id);
                return $this->db->update('orders',$data);     
                
            } else {
                return false;
            }
            
        } catch (Exception $e) {
            exit("There is an error in the update query");
        }
        
    }

    public function update_product_items($data,$item_id) {
        try {
            if ($item_id!='') { 
                $this->db->where('item_id',$item_id);
                $this->db->update('orders_item',$data);
            } else {
                return false;
            }
            
        } catch (Exception $e) {
            exit("There is an error in the update query");
        }
        
    }
    
}
?>