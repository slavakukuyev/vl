<?php

class Movies extends CI_Model {

    function getAll() {
        $this->db->where('instock', 1);
        $q = $this->db->get('movies');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $q1 = $this->db->query('SELECT * FROM actors LEFT JOIN actormovie as am on am.actorid=actors.id WHERE movieid=' . $row->id);
                if ($q1->num_rows() > 0) {
                    foreach ($q1->result() as $actor) {
                        $actors[] = $actor;
                    }
                }
                $data[] = array($row, $actors);
                $actors = null;
            }
            return $data;
        }
    }

    function get_recommended($id) {
        $myRentedCategories = $this->db->query("SELECT categories FROM movies WHERE id IN(SELECT movieid FROM  `rents` WHERE userid =" . $id . ")");

        if ($myRentedCategories->num_rows() > 0) {
            $this->load->model('categories');
            $allCat = $this->categories->getAll();
            foreach ($allCat as $ac) {
                foreach ($myRentedCategories->result() as $cat) {
                    if (strpos($cat->categories, $ac->name) !== FALSE) {

                        if (isset($merged[$ac->name])) {
                            $merged[$ac->name] = ((int) $merged[$ac->name]) + 1;
                        } else {
                            $merged[$ac->name] = 1;
                        }
                    }
                }
            }

            
            $maxs = array_keys($merged, max($merged));
            $this->session->set_userdata('maxs',$maxs);
            
            //add liked movies
            foreach ($maxs as $likedCategory) {
                $likedQuery = $this->db->query("SELECT * FROM movies WHERE movies.categories LIKE '%" . $likedCategory . "%'");                   
                if ($likedQuery->num_rows()>0) {                    
                    foreach ($likedQuery->result() as $l)                        
                    if (!isset($recommended[$l->id])) {
                    $recommended[$l->id]=$l;    
                    }
                }
            }
                  
            
            //delete $recommended movies that rented
            $rented = $this->db->query("SELECT rents.movieid FROM rents WHERE rents.userid=".$id);                       
            if ($rented->num_rows()>0) {
                foreach ($rented->result() as $r){               
                    if (isset($recommended[$r->movieid])) {
                        unset($recommended[$r->movieid]);
                    }
                }
            }
          
       
            if (sizeof($recommended)>0){
            foreach ($recommended as $r){
                $data[] = array($r, null);
            }
            }
            echo "<br>";
           if(sizeof($data)<3){
                $mins = array_keys($merged, min($merged));
                $this->session->set_userdata('mins',$mins);
                $this->session->unset_userdata('maxs',$maxs);
               
                //add liked movies
            foreach ($maxs as $likedCategory) {
                $likedQuery = $this->db->query("SELECT * FROM movies WHERE movies.categories LIKE '%" . $likedCategory . "%'");                   
                if ($likedQuery->num_rows()>0) {                    
                    foreach ($likedQuery->result() as $l)                        
                    if (!isset($recommended[$l->id])) {
                    $recommended[$l->id]=$l;    
                    }
                }
            }
                  
            
            //delete $recommended movies that rented
            $rented = $this->db->query("SELECT rents.movieid FROM rents WHERE rents.userid=".$id);                       
            if ($rented->num_rows()>0) {
                foreach ($rented->result() as $r){               
                    if (isset($recommended[$r->movieid])) {
                        unset($recommended[$r->movieid]);
                    }
                }
            }
          
       
            if (sizeof($recommended)>0){
            foreach ($recommended as $r){
                $data[$r->id] = array($r, null);
            }
            }
              if(sizeof($data)<3){
                  return $this->get_popular();
              }
              else{
                  return $data;
              }
           
               
               
           }            
           else{
               return $data;
           }
        }
        else
            return $this->get_popular();
    }

    function get_popular() {
        $q = $this->db->query("SELECT movies.id, movies.name, movies.about, movies.imgUrl, COUNT(rents.movieid) AS NumberOfRents FROM rents 
                                LEFT JOIN movies
                                ON rents.movieid=movies.id
                                WHERE movies.instock=1
                                GROUP BY movies.id
                                ORDER BY NumberOfRents desc 
                                LIMIT 9");

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $r) {
                $data[$r->id] = array($r, null);
            }
            return $data;
        } else {
            return false;
        }
    }

    function get_id_name_all(){
        $this->db->order_by('name');
        $q = $this->db->get('movies');

        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $m['id'] = $row->id;
                $m['name'] = $row->name;
                $list[] = $m;
            }
        }
        if ($q && $q->num_rows() > 0 && isset($list)) {
            return $list;
        }
        else
            return false;
    }

    function getNewAddedMovies($count) {
        $q = $this->db->query('SELECT * FROM movies WHERE instock=1 ORDER BY added desc LIMIT 0,' . $count);
        if ($q->num_rows() > 0) {

            foreach ($q->result() as $row) {
                $q1 = $this->db->query('SELECT * FROM actors LEFT JOIN actormovie as am on am.actorid=actors.id WHERE movieid=' . $row->id);
                if ($q1->num_rows() > 0) {
                    foreach ($q1->result() as $actor) {
                        $actors[] = $actor;
                    }
                }
                $data[$row->id] = array($row, $actors);
                $actors = null;
            }
            return $data;
        }
    }

    function getMovieById($id) {
        //$q=$this->db->get_where('movies', array('id' => $id));
        $sql = "SELECT * FROM movies WHERE id = ?";
        $q = $this->db->query($sql, $id);
        if ($q->num_rows() > 0) {
            return $data[] = $q->first_row();
        }
        else
            return null;
    }

    function getMoviesByCategory($category) {

        $q = $this->db->query('SELECT * FROM movies WHERE instock=1 AND categories LIKE "%' . $category . '%"');
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $q1 = $this->db->query('SELECT * FROM actors LEFT JOIN actormovie as am on am.actorid=actors.id WHERE movieid=' . $row->id);
                if ($q1->num_rows() > 0) {
                    foreach ($q1->result() as $actor) {
                        $actors[] = $actor;
                    }
                }
                $data[$row->id] = array($row, $actors);
                $actors = null;
            }
            return $data;
        }
    }

    function getCategoriesByString($string) {

        $categories = explode(", ", $string);
        foreach ($categories as $category) {
            $q = $this->db->query('SELECT * FROM categories WHERE name LIKE "%' . $category . '%"');
        }
    }

    function is_in_stock($id) {
        $q = $this->db->query('SELECT * FROM movies WHERE id=' . $id);
        if ($q->num_rows() == 1) {
            $copies = $q->first_row()->copies;
            $instock = $q->first_row()->instock;
            return ($copies > 0 && $instock == 1);
        }
        else
            return false;
    }

    function rent($params) {


        $movie = $this->db->query('SELECT * FROM movies WHERE id=' . $params['movieid']);
        if ($movie->num_rows() == 1) {
            $copies = (int) $movie->first_row()->copies;
            if ($copies > 0) {
                $copies = $copies - 1;
            }
            else
                return false;
            $instock = $copies < 1 ? 0 : 1;

            $user = $this->db->query("SELECT * FROM users WHERE id=" . $params['userid']);
            if ($user->num_rows() == 1) {
                $balance = (int) $user->first_row()->balance;
                $balance = $balance - (int)$params['price'];
                if ($balance < 0) {
                    return false;
                }
                $this->db->query("UPDATE users SET balance=" . $balance . " WHERE id=" . $params['userid']);
                $this->db->query("UPDATE movies SET copies=" . $copies . ", instock=" . $instock . " WHERE id=" . $params['movieid']);
                $this->db->query("INSERT INTO rents (id, userid, movieid, price, datetime) VALUES (null, '" . $params['userid'] . "', '" . $params['movieid'] . "', '" . $params['price'] . "', now())");
            }
            else
                return false;

            return true;
        }
        else
            return false;
    }

    function is_actor_of_movie($params) {
        $q = $this->db->query("SELECT * FROM actormovie WHERE actorid=" . $params['actor'] . " AND movieid=" . $params['movieid']);
        if ($q->num_rows() == 1) {
            return true;
        }
        else
            return false;
    }

    function remove_actors($movieid) {
        $q = $this->db->query("DELETE FROM actormovie WHERE movieid=" . $movieid);
        if ($q)
            return true;
        else
            return false;
    }

    function add_actors($actors, $movieid) {
        foreach ($actors as $a) {
            $this->db->query("INSERT INTO actormovie (id, movieid, actorid) VALUES (NULL, " . $movieid . ", " . $a . ")");
        }
    }

    function update_movie($movie) {
        $q = $this->db->query("UPDATE movies SET name='" . mysql_real_escape_string($movie->name) . "',                                                 
                                                   about='" . mysql_real_escape_string($movie->about) . "',    
                                                     year=" . $movie->year . ",
                                                       imgUrl='" . mysql_real_escape_string($movie->imgUrl) . "',
                                                         vidUrl='" . mysql_real_escape_string($movie->vidUrl) . "',
                                                           added='" . $movie->added . "',
                                                             categories='" . mysql_real_escape_string($movie->categories) . "',
                                                               price='" . $movie->price . "',
                                                                 copies='" . $movie->copies . "',
                                                                   instock='" . $movie->instock . "' 
                                               WHERE id=" . $movie->id);
        if ($q)
            return true;
        else
            return false;
    }

    function add_movie($actors, $new_movie) {
        $q = $this->db->query("INSERT INTO movies (id, name, about, year, imgUrl, vidUrl, added, categories, price, copies, instock)
                                     VALUES (null,
                                     '" . mysql_real_escape_string($new_movie['name']) . "', 
                                         '" . mysql_real_escape_string($new_movie['about']) . "', 
                                             '" . $new_movie['year'] . "', 
                                                 '" . mysql_real_escape_string($new_movie['imgUrl']) . "', 
                                                     '" . mysql_real_escape_string($new_movie['vidUrl']) . "', 
                                                           now(), 
                                                             '" . mysql_real_escape_string($new_movie['categories']) . "', 
                                                                 '" . $new_movie['price'] . "', 
                                                                     '" . $new_movie['copies'] . "', 
                                                                         '1') ");

        if ($q) {
            $q1 = $this->db->query("SELECT * FROM movies ORDER BY id DESC LIMIT 0, 1");
            if ($q1->num_rows() == 1) {
                $this->add_actors($actors, $q1->first_row()->id);
                return $q1->first_row()->id;
            }
            else
                return false;
        }
        else
            return false;
    }

}

?>
