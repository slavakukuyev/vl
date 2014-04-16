<?php

class Comments extends CI_Model {

    function add_comment($params) {
        $q = $this->db->query("INSERT INTO comments (id, movieid, text, added, userid)
            VALUES(NULL, "
                . $params['movieid'] . ", '"
                . mysql_real_escape_string($params['text']) . "', now(), "
                . $params['userid'] . ")");

        if ($q) {
            return true;
        }
        else
            return false;
    }
    
    function get_comments($id){
        $q = $this->db->query("SELECT comments.id, comments.text, comments.added, users.id, users.firstname, users.lastname FROM comments LEFT JOIN users ON comments.userid=users.id WHERE comments.movieid=".$id." ORDER BY comments.added desc");
        if ($q->num_rows>0) {
            foreach ($q->result() as $row){
                $data[]=$row;                
            }
            return $data;
        }
        else{
            return false;
        }
        
    }
    
    

}

?>
