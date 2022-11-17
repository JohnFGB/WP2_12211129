<?php 
defined('BASEPATH') or exit('no direct script access allowed');
class ModelBuku extends CI_Model
{
    public function getBuku()
    {
        return $this->db->get('buku');
    }

    public function bukuWhere($where)
    {
        return $this->db->get_where('buku',$where);
    }

    public function simpanBuku($data)
    {
        $this->db->insert('buku',$data);
    }

    public function updateBuku($data,$where)
    {
        $this->db->update('buku',$data,$where);
    }

    public function hapusBuku($where)
    {
        $this->db->delete('buku',$where);
    }

    public function total($field,$where)
    {
        $this->db->select_sum($field);
        (!empty($where) && count($where) > 0) ? $this->db->where($where) : $this->db->from('buku');
        return $this->db->get()->row($field);
    }
    //manajemen kategori
    public function getKategori()
    {
        return $this->db->get('kategori');
    }
    
    public function kategoriWhere($where)
    {
        return $this->db->get_where('kategori', $where);
    }
    
    public function simpanKategori($data)
    {
        $this->db->insert('kategori', $data);
    }
    
    public function hapusKategori($where)
    {
        $this->db->delete('kategori', $where);
    }
    
    public function updateKategori($where, $data)
    {
        $this->db->update('kategori', $data, $where);
    }
    //join
    public function joinKategoriBuku($where)
    {
        $this->db->select('buku.id_kategori,kategori.kategori');
        $this->db->from('buku');
        $this->db->join('kategori','kategori.id = buku.id_kategori');
        $this->db->where($where);
        return $this->db->get();
    }
}
?>