<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelamin_m extends CI_Model {

    public function get()
    {
        $this->db->from('t_jns_kelamin');
        $query = $this->db->get();
        return $query;
    }
}