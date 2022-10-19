<?php 
defined('BASEPATH') or exit('No redirect script access allowed');

class ModelUser extends CI_Model
{
    public function simpanData($data)
    {
        $this->db->insert('user', $data);
    }

    public function cekData($where)
    {
        $this->db->get_where('user',$where);
    }

    public function getUserWhere($where)
    {
        $this->db->getUserWhere('user',$where);
    }

    public function cekUserAccess($where)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);

        return $this->db->get();
    }

    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10,0);

        return $this->db->get();
    }
}


?>