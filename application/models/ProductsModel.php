<?php
class ProductsModel extends CI_Model{
    
    public function get_products() {
        try {
                $query = $this->db->get("orders");
                return $query->result();
            
        } catch (Exception $e) {
            exit("There is an error in the select query");
        }
        
    } 
    
    public function edit_products($id) {
        try {
            if (!empty($id)) {
                
                $query = $this->db->get_where('orders', array('orderid' => $id))->row();
                return $query;
                
            } else {
                return false;
            }
            
        } catch (Exception $e) {
            exit("There is an error in the select query");
        }
        
    }
    
    public function insert_product($table_name, $records = array()) {
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
}
?>