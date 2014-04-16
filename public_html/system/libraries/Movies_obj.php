<?php

class CI_Movies_obj {

    private $list;
    private $single;
    private $CI;

    function __construct() {
        $this->CI = &get_instance();
        $this->load_models();
    }

    private function load_models() {
        $this->CI->load->model('movies');
        $this->CI->load->model('actors');
        $this->CI->load->model('comments');
    }

    public function set_single($params) {

        if (isset($params['id'])) {
            $movie = $this->CI->movies->getMovieById($params['id']);
            $actors = $this->CI->actors->get_actors_by_movieid($params['id']);
            $comments = $this->CI->comments->get_comments($params['id']);
            $array = array('id' => $movie->id,
                'name' => $movie->name,
                'about' => $movie->about,
                'year' => $movie->year,
                'imgUrl' => $movie->imgUrl,
                'vidUrl' => $movie->vidUrl,
                'added' => $movie->added,
                'categories' => $movie->categories,
                'price' => $movie->price,
                'copies' => $movie->copies,
                'actors' => $actors,
                'comments' => $comments);

            $this->CI->load->library('movie_obj', $array);
            $this->single = $this->CI->movie_obj;
        }
    }

    public function get_single() {
        return $this->single;
    }

    public function set_list($params) {

        switch ($params['type']) {
            case 'Popular':
                $list = $this->CI->movies->get_popular();
                break;
            case "New":
                $list = $this->CI->movies->getNewAddedMovies($params['count']);
                break;
            case "Recommended":
                $list = $this->CI->movies->get_recommended($params['id']);
                break;
            case "Category":
                $list = $this->CI->movies->getMoviesByCategory($params['category']);
                break;
            case "AllByNameID":
                $list = $this->CI->movies->get_id_name_all();
                break;
        }

        $this->list = $list;
    }

    function get_list() {
        return $this->list;
    }

    function rent_single($params) {
        return $this->CI->movies->rent($params);
    }

    function add_movie($params) {
        return $this->CI->movies->add_movie($params['actors'], $params['new_movie']);
    }

}

?>
