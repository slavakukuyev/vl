<?php

class Actors extends CI_Model {

    function get_actors_by_movieid($movieid) {
        $actormovie = $this->db->query('SELECT * FROM actors LEFT JOIN  actormovie ON actors.id=actormovie.actorid WHERE actormovie.movieid=' . $movieid);
        if ($actormovie->num_rows() > 0) {
            foreach ($actormovie->result() as $a) {
                $data[] = $a;
            }
        }
        return $data;
    }

    function get_all_actors() {
        $actors = $this->db->query("SELECT * FROM actors ORDER BY fullname");
        foreach ($actors->result() as $a) {
            $data[] = $a;
        }
        return $data;
    }

    function get_actor($id) {
        $actor = $this->db->query("SELECT * FROM actors WHERE id=" . $id);
        if ($actor->num_rows() == 1) {
            return $actor->first_row();
        }
        else
            return false;
    }

    function get_movies_of_actor($actorid) {
        $movies = $this->db->query('SELECT movies.id, movies.name, movies.year, movies.instock FROM movies LEFT JOIN  actormovie ON movies.id=actormovie.movieid WHERE actormovie.actorid=' . $actorid . ' ORDER BY movies.year');
        if ($movies->num_rows() > 0) {
            foreach ($movies->result() as $m) {
                $data[] = $m;
            }
            return $data;
        }
        else
            return false;
    }

}

?>
