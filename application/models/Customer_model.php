<?php 
class Customer_model extends CI_Model {
    public function insert_customers($data) {
        try {
            $res = $this->db->insert_batch('customers',$data);
            if($res){
                return TRUE;
            }else{
                return FALSE;
            }
        } catch (Exception $e){
            exit("There is an error in the insert query");
    }
}

    public function get_customers() {
        try {
            $this->db->select('customers.customer_id, customers.customer_name,customers.customer_mobile,customers.customer_email')
            ->from('customers');
            $query = $this->db->get();
            return $query->result();
            
        } catch (Exception $e) {
            exit("There is an error in the select query");
        }
        
    } 

    
}
?>