<?php
class Categories extends CI_Model{    
    function getAll(){
        $this->db->from('categories');
        $this->db->order_by("name", "asc");
        $q=$this->db->get();
        if ($q->num_rows()>0) {
            foreach ($q->result() as $category){
                
                $data[]=$category;                
            }
            return $data;
        }        
    }    
}
?>
