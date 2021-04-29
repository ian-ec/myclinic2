<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class parameter_m extends CI_Model {

    public function get($id = null)
    {
        $this->db->from('parameter');
        if($id !=null){
            $this->db->where('aplication_name',$id);
        }
        $query = $this->db->get();
        return $query;
    }

    
    public function update($post){
        $params = [
            'aplication_name' => $post['aplication_name'],
            'initial' => $post['initial'],
            'address' => $post['address'],
            'telp' => $post['telp'],
        ];
        $this->db->update('parameter',$params);

    }
}