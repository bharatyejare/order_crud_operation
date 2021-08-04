<?php 
class Upload_model extends CI_Model {
    public function insert_customers($data) {
        $res = $this->db->insert_batch('customers',$data);
        if($res){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
?>