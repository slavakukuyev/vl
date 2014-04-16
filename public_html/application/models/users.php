<?php

class Users extends CI_Model {

    function Login($email, $password) {
        $q = $this->db->query('SELECT * FROM users WHERE users.email="' . $email . '"');
        if ($q->num_rows() == 1) {
            $id = $q->first_row()->id;
            $crypted = $this->make_password($password, $id);
            $q1 = $this->db->query('SELECT * FROM users WHERE users.email="' . $email . '" and users.password ="' . $crypted . '"');
            if ($q->num_rows() == 1) {
                return $user[] = $q1->first_row();
            }
            else
                return false;
        }
        else
            return false;
    }

    function check_pass($params) {

        $q = $this->db->query('SELECT * FROM users WHERE users.email="' . $params['email'] . '"');
        if ($q->num_rows() == 1) {
            $id = $q->first_row()->id;
            $crypted = $this->make_password($params['password'], $id);
            $q1 = $this->db->query("SELECT * FROM users WHERE users.id='" . $id . "' and users.password='" . $crypted . "'");
            if ($q1->num_rows() == 1) {
                return true;
            }
            else
                return false;
        }
        else
            return false;
    }

    function isAdmin($email) {
        $q = $q1 = $this->db->query('SELECT * FROM users WHERE email="' . $email . '"');
        if ($q->num_rows() == 1) {
            return $data[] = $q->first_row()->isadmin;
        }
        else
            return 'User with this email not exist!';
    }

    function isEmailExist($email) {       
        $q = $this->db->query("SELECT * FROM users WHERE email='" . $email . "'");
        if ($q->num_rows() == 1)
            return true;
        else
            return false;
    }

    function isEmailExistById($params) {        
        $q = $this->db->query("SELECT * FROM users WHERE email='" . $params['email'] . "' and id='" . $params['id'] . "'");
        if ($q->num_rows() == 1)
            return true;
        else
            return false;
    }

    function isEmailExistByOtherId($params) {        
        $q = $this->db->query("SELECT * FROM users WHERE email='" . $params['email'] . "' and id<>'" . $params['id'] . "'");
        if ($q->num_rows() == 1)
            return true;
        else
            return false;
    }

    function update_password($params) {
        $crypted = $this->make_password($params['password'], $params['id']);

        $q = $this->db->query("UPDATE users SET password='" . $crypted . "' WHERE email='" . $params['email'] . "'");
        if ($q)
            return true;
        else
            return false;
    }

    function registration($params) {
        $crypted = $this->make_password($params['password']);
        $q = $this->db->query("INSERT INTO users(email, password, firstname, lastname, birthdate) VALUES('"
                . $params['email'] . "','"
                . $params['password']. "','"
                . $params['firstname'] . "','"
                . $params['lastname'] . "','"
                . $params['birthdate'] . "'" .
                ")");

        if ($q) {
            $q = $this->db->query('SELECT * FROM users WHERE users.email="' . $params['email'] . '"');
            if ($q->num_rows() == 1) {
                $crypted = $this->make_password($params['password'], $q->firstrow()->id);
                $q1 = $this->db->query("UPDATE users SET password='" . $crypted . "' WHERE email='" . $params['email'] . "'");
                if ($q1) {
                    return true;
                }
                else
                    return false;
            }
        }
        else
            return false;
    }

    function update_user($params) {
        $q = $this->db->query("UPDATE users SET email = '" . $params['email'] . "',                                                
                                                firstname = '" . $params['firstname'] . "', 
                                                lastname = '" . $params['lastname'] . "',
                                                sex = '" . $params['sex'] . "',
                                                birthdate = '" . $params['birthdate'] . "' 
                                                     WHERE id = " . $params['id']);
        if ($q)
            return true;
        else
            return false;
    }

    function deposit($params) {
        $q = $this->db->query("SELECT * From users WHERE id=" . $params['id']);
        if ($q->num_rows() > 0) {
            $balance = $q->first_row()->balance;
            $balance = $balance + (int)$params['amount'];
            $q = $this->db->query("UPDATE users SET balance=" . $balance . " WHERE id=" . $params['id']);
            if ($q)
                return $balance;
        }
        else
            return false;
    }

    function get_balance($params) {
        $q = $this->db->query("SELECT * From users WHERE id=" . $params['id']);
        if ($q->num_rows() == 1) {
            return $q->first_row()->balance;
        }
        else
            return false;
    }

}

?>
