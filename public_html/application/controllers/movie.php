<?php

class Movie extends My_Controller {

    function __construct() {
        parent::__construct();
        $this->load_mod_lib();
    }

    private function load_mod_lib() {
        $this->load->library('movies_obj');
        $this->load->library('actors_obj');
        $this->load->library('comments_obj');

        $this->load->library('users_obj');        
    }

    function index() {
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];
        } elseif ($this->session->userdata('movieid') != '') {
            $id = (int) $this->session->userdata('movieid');
            $this->session->unset_userdata('movieid');
            if ($this->session->userdata('messageComment') != '') {
                $data['messageComment'] = $this->session->userdata('messageComment');
                $this->session->unset_userdata('messageComment');
            }
        } else {
            
        }
        if (isset($id)) {
            $movie = $this->getMovie($id);
            $data['movie'] = $movie;
            $data['movieCategories'] = explode(', ', $movie->categories);
            $data['actorsOfTheMovie'] = $movie->actors;
            $data['comments'] = $movie->comments;

            $data['captcha'] = $this->create_my_captcha();

            $this->viewPage('movie', $data);
        } else {
            redirect('main', 'refresh');
        }
    }

    function getMovie($id) {
        $this->movies_obj->set_single(array('id' => $id));
        return $this->movies_obj->get_single();
    }

    private function get_actors_by_movieid($movieId) {
        return $this->actors_obj->get_actors_of_the_movie($movieId);
    }

    function rent() {
        if ($this->session->userdata('isLoggedIn') == false || !isset($_POST['id'])) {
            redirect('main', 'refresh');
        } else {
            $data['captcha'] = $this->create_my_captcha();
            $id = (int) $_POST['id'];
            $movie = $this->getMovie($id);
            $data['movie'] = $movie;
            $data['movieCategories'] = explode(', ', $movie->categories);
            $data['actorsOfTheMovie'] = $this->get_actors_by_movieid($movie->id);

            if ((int) $this->get_user_balance($this->session->userdata('id')) < (int) ($_POST['price'])) {
                $data['message'] = "You have not enought money to rent the movie. Please go to <a href='" . base_url() . "myaccount/depositpage'>Deposit</a> page.";
            }
            //if 2 users rented the same movie on time
            elseif (!$this->is_in_stock($_POST['id'])) {
                $data['message'] = "Sorry but the last copy of the movie was rented just now. <br/>. But we have a huge selection of movies on our site. You may rent movie after choosing <a href='" . base_url() . "main?recommended=1'>HERE</a> the best for you.";
            } else {
                $paramsForRent = array(
                    'movieid' => $_POST['id'],
                    'userid' => $this->session->userdata('id'),
                    'price' => $_POST['price']
                );

                if ($this->rent_movie($paramsForRent) === TRUE) {
                    $this->session->set_userdata('balance', $this->get_user_balance($this->session->userdata('id')));
                    $data['message'] = "You has successfully rent the movie. The movie Sent to you with our courier.";
                }
                else
                    $data['message'] = "An exception has occured, please contact site admin.";
            }
            $this->viewPage('movie', $data);
        }
    }

    private function get_user_balance($id) {
        return $this->users_obj->get_user_balance($id);
    }

    private function rent_movie($params) {
        return $this->movies_obj->rent_single($params);
    }

    private function is_in_stock($id) {
        $movie = $this->getMovie($id);
        if ($movie->instock == 0) {
            return false;
        }
        else
            return true;
    }

    function edit_page() {
        if ($this->session->userdata('isLoggedIn') == false || $this->session->userdata('isadmin') == false || (isset($_POST['id']) || $this->session->userdata('movieid')) === false) {
            redirect('main', 'refresh');
        } else {
            $id = isset($_POST['id']) ? $_POST['id'] : $this->session->userdata('movieid');
            $movie = $this->getMovie($id);
            $data['movie'] = $movie;
            $data['movieCategories'] = explode(', ', $movie->categories);
            $listMovies = $this->get_id_name_all();
            if ($listMovies != false) {
                $data['listMovies'] = $listMovies;
            }


            $data['actorsOfTheMovie'] = $this->get_actors_by_movieid($movie->id);

            $data['actors'] = $this->get_all_actors();
            $this->viewPage("movie_edit", $data);
        }
    }

    private function get_id_name_all() {
        $this->movies_obj->set_list(array('type' => 'AllByNameID'));
        return $this->movies_obj->get_list();
    }

    function edit() {

        if ($this->session->userdata('isLoggedIn') == false || $this->session->userdata('isadmin') == false || (isset($_POST['id']) || $this->session->userdata('movieid')) === false) {
            redirect('main', 'refresh');
        } else {

            $id = isset($_POST['id']) ? $_POST['id'] : $this->session->userdata('movieid');
            $movie = $this->getMovie($id);
            $data['movie'] = $movie;
            $data['movieCategories'] = explode(', ', $movie->categories);

            $data['actorsOfTheMovie'] = $this->get_actors_by_movieid($movie->id);


            $data['actors'] = $this->get_all_actors();

            $listMovies = $this->get_id_name_all();
            if ($listMovies != false) {
                $data['listMovies'] = $listMovies;
            }


            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('year', 'Price', 'required|trim|min_length[4]|max_length[4]|callback_valid_year');
            $this->form_validation->set_rules('imgUrl', 'Image Url', 'required|trim');
            $this->form_validation->set_rules('vidUrl', 'video Url', 'required|trim');
            $this->form_validation->set_rules('added', 'Added', 'required|trim|min_length[19]|callback_valid_added');
            $this->form_validation->set_rules('price', 'Price', 'required|trim|min_length[2]|max_length[3]|callback_valid_price');
            $this->form_validation->set_rules('copies', 'Copies', 'required|trim||callback_valid_copies');
            $this->form_validation->set_rules('about', 'About', 'required|trim');
            if ($this->form_validation->run()) {
                $changed = false;
                $actorschanged = false;

                if ($this->input->post('name') != $movie->name) {
                    $movie->name = $this->input->post('name');
                    $changed = true;
                }
                if ($this->input->post('about') != $movie->about) {
                    $movie->about = $this->input->post('about');
                    $changed = true;
                }

                if ($this->input->post('year') != $movie->year) {
                    $movie->year = $this->input->post('year');
                    $changed = true;
                }

                if ($this->input->post('imgUrl') != $movie->imgUrl) {
                    $movie->imgUrl = $this->input->post('imgUrl');
                    $changed = true;
                }

                if ($this->input->post('imgUrlnew') && $this->input->post('imgUrlnew') != '') {
                    $movie->imgUrl = $this->input->post('imgUrlnew');
                    $changed = true;
                }



                if ($this->input->post('vidUrl') != $movie->vidUrl) {
                    $movie->vidUrl = $this->input->post('vidUrl');
                    $changed = true;
                }

                if ($this->input->post('added') != $movie->added) {
                    $movie->added = $this->input->post('added');
                    $changed = true;
                }

                if ($this->input->post('price') != $movie->price) {
                    $movie->price = $this->input->post('price');
                    $changed = true;
                }

                if ($this->input->post('copies') != $movie->copies) {
                    $movie->copies = $this->input->post('copies');
                    $movie->instock = (((int) $movie->copies) > 0) ? 1 : 0;
                    $changed = true;
                }

                if ($this->input->post('categories') != $movie->categories) {
                    $movie->categories = $this->input->post('categories');
                    $data['movieCategories'] = explode(', ', $movie->categories);
                    $changed = true;
                }

                $postActors = explode(', ', $this->input->post('actors'));
                foreach ($postActors as $a) {
                    if ($this->is_actor_of_movie($a, $movie->id) === false) {
                        $actorschanged = true;
                        break;
                    }
                }

                if ($actorschanged === true) {
                    $this->movies->remove_actors($movie->id);
                    $this->movies->add_actors($postActors, $movie->id);
                    $data['message'] = 'Actors added successfully to ' . $movie->name;
                    $data['actorsOfTheMovie'] = $this->get_actors_by_movieid($movie->id);
                }

                if ($changed == true) {
                    if ($this->movies->update_movie($movie) == true) {
                        $data['movie'] = $movie;
                        $data['message'] = 'Movie ' . $movie->name . ' updated successfully';
                    }
                    else
                        $data['message'] = 'Movie ' . $movie->name . ' was Not updated successfully';
                }

                if ($actorschanged == false && $changed == false) {
                    $data['message'] = 'Movie properties have not changed';
                }
                $this->viewPage("movie_edit", $data);
            } else {
                $data['form'] = validation_errors();
                $this->viewPage("movie_edit", $data);
            }
        }
    }

    private function is_actor_of_movie($actor, $movieID) {
        return $this->actors_obj->is_actor_of_movie(array('actor' => $actor, 'movieid' => $movieID));
    }

    function valid_year() {
        $year = $this->input->post('year');
        if (ctype_digit($year) && (int) $year >= 1900 && (int) $year <= 2013)
            return true;
        else {
            $this->form_validation->set_message('valid_year', 'Insert correct Year.');
            return false;
        }
    }

    function valid_price() {
        $price = $this->input->post('price');
        if (ctype_digit($price) && (int) $price >= 10)
            return true;
        else {
            $this->form_validation->set_message('valid_price', 'Insert correct price(greater or equal to 10$).');
            return false;
        }
    }

    function valid_added() {
        $added = $this->input->post('added');
        if (preg_match('/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/', $added)) {
            return true;
        } else {
            $this->form_validation->set_message('valid_added', 'Insert correct datetime af adding movie');
            return false;
        }
    }

    function valid_copies() {
        $copies = $this->input->post('copies');
        if (ctype_digit($copies))
            return true;
        else {
            $this->form_validation->set_message('valid_price', 'Copies field must contain numbers.');
            return false;
        }
    }

    function valid_copies_toadd() {
        $copies = $this->input->post('copies');
        if (ctype_digit($copies)) {
            if ((int) copies > 0) {
                return true;
            } else {
                $this->form_validation->set_message('valid_copies_toadd', 'Copies field must be more than ZERO.');
                return false;
            }
        } else {
            $this->form_validation->set_message('valid_copies_toadd', 'Copies field must contain numbers.');
            return false;
        }
    }

    function add() {

        //not loggedIn Not Admin
        if ($this->session->userdata('isLoggedIn') == false || $this->session->userdata('isadmin') == false) {
            redirect('main', 'refresh');
        }
        //end not logged not admin     //////////////////////
        //Logged In Admin
        else {

            if (isset($_POST['tryadd']) && $_POST['tryadd'] == 'true') {


                //if page validated
                $this->form_validation->set_rules('name', 'Name', 'required|trim');
                $this->form_validation->set_rules('year', 'Price', 'required|trim|min_length[4]|max_length[4]|callback_valid_year');
                $this->form_validation->set_rules('imgUrl', 'Image Url', 'required|trim');
                $this->form_validation->set_rules('vidUrl', 'video Url', 'required|trim');
                $this->form_validation->set_rules('price', 'Price', 'required|trim|min_length[2]|max_length[3]|callback_valid_price');
                $this->form_validation->set_rules('copies', 'Copies', 'required|trim||callback_valid_copies_toadd');
                $this->form_validation->set_rules('categories', 'Categories', 'callback_valid_categories');
                $this->form_validation->set_rules('actors', 'Actors', 'callback_valid_actors');
                $this->form_validation->set_rules('about', 'About', 'required|trim');
                if ($this->form_validation->run()) {
                    $new_movie['name'] = $this->input->post('name');
                    $new_movie['year'] = $this->input->post('year');
                    $new_movie['imgUrl'] = $this->input->post('imgUrl');
                    $new_movie['vidUrl'] = $this->input->post('vidUrl');
                    $new_movie['price'] = $this->input->post('price');
                    $new_movie['copies'] = $this->input->post('copies');
                    $new_movie['categories'] = $this->input->post('categories');
                    $new_movie['about'] = $this->input->post('about');
                    $postActors = explode(', ', $this->input->post('actors'));
                    $savedid = $this->add_new_movie(array('actors' => $postActors, 'new_movie' => $new_movie));
                    if ($savedid !== false) {
                        $this->session->set_userdata('movieid', $savedid);
                        redirect('movie');
                    } else {
                        $data['message'] = "Movie not saved";
                        $this->viewPage('movie_add', $data);
                    }
                }
                // end valid page               
                //page not valid                
                else {
                    $data['form'] = validation_errors();
                    $data['actors'] = $this->get_all_actors();
                    $this->viewPage('movie_add', $data);
                }
                //end not valid page
            }
            //just load movie_add page
            else {
                $data['actors'] = $this->get_all_actors();
                $this->viewPage('movie_add', $data);
            }
            //end first load   /////////////////////////////////
        }

        //  end logged in admin
    }

    private function add_new_movie($params) {
        return $this->movies_obj->add_movie($params);
    }

    function get_all_actors() {
        return $this->actors_obj->get_All();
    }

    protected function valid_categories() {
        $categories = $this->input->post('categories');
        if (!$categories == '')
            return true;
        else {
            $this->form_validation->set_message('valid_categories', 'Please add at least one category');
            return false;
        }
    }

    protected function valid_actors() {
        $actors = $this->input->post('actors');
        if (!$actors == '')
            return true;
        else {
            $this->form_validation->set_message('valid_actors', 'Please add at least one actor');
            return false;
        }
    }

    function comment() {
        if ($this->session->userdata('isLoggedIn') !== false) {
            $this->form_validation->set_rules('comment', 'Comment', 'required|trim|xss_clean');
            $this->form_validation->set_rules('captcha', 'Captcha', 'required|trim|callback_valid_captcha');
            if ($this->form_validation->run()) {
                if ($this->commentAdded(array('movieid' => $this->input->post('id'), 'text' => $this->input->post('comment'), 'userid' => $this->session->userdata('id'))) === false) {
                    $this->session->set_userdata('movieid', $this->input->post('id'));
                    $this->session->set_userdata('messageComment', "Data base error has accured, Please contact site admin");
                } else {
                    $this->session->set_userdata('movieid', $this->input->post('id'));
                    $this->session->set_userdata('messageComment', "Your comment has successfully added. Thank you.");
                }
            } else {

                $this->session->set_userdata('movieid', $this->input->post('id'));
                $this->session->set_userdata('messageComment', validation_errors());
            }
        } else {
            $this->session->set_userdata('messageComment', "Please  <a href='" . base_url() . "main/login'>LogIn</a> or <a href='" . base_url() . "registration' >register</a> for leaving comments");
            $this->session->set_userdata('movieid', $this->input->post('id'));
        }
        $this->index();
    }

    private function commentAdded($params) {
        return $this->comments_obj->addCommentToDB($params);
    }

    function valid_captcha() {
        if (strcmp($this->session->userdata('captcha'), md5($this->input->post('captcha'))) === 0) {
            $this->session->unset_userdata('captcha');
            return true;
        } else {
            $this->form_validation->set_message('valid_captcha', 'Wrong text from image.');
            return false;
        }
    }

    function upload() {

        $config['upload_path'] = 'media/img/movies';
        $config['allowed_types'] = 'jpg|jpeg|gif|png';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);
        if (isset($_POST['movieid'])) {
            $this->session->set_userdata('movieid', $_POST['movieid']);
        }
        if (isset($_POST['pageID'])) {
            $this->session->set_userdata('pageID', $_POST['pageID']);
        }

        if (!$this->upload->do_upload()) {
            if (!$this->session->userdata('uploadPage')) {
                $this->session->set_userdata('uploadPage', '1');
                $data = null;
            } else {
                $data['messageUpload'] = $this->upload->display_errors();
            }

            $this->viewPage('upload_image', $data);
        } else {
            $result = $this->upload->data();
            $path = '/media/img/movies/' . $result['file_name'];
            $this->session->set_userdata('new_image_path', $path);
            $this->session->unset_userdata('uploadPage');
            redirect('movie/' . $this->session->userdata('pageID'));
        }
    }

    function upload_disable() {
        $this->session->unset_userdata('new_image_path');
        $this->session->unset_userdata('uploadPage');
        redirect('movie/' . $this->session->userdata('pageID'));
    }

}

?>
