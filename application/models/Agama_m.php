<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agama_m extends CI_Model {

    public function get()
    {
        $this->db->from('t_agama');
        $query = $this->db->get();
        return $query;
    }
}