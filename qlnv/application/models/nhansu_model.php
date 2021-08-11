<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function insertDataToMysql($ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)
	{
		$dulieu = array(
			'ten' => $ten, 
			'tuoi' => $tuoi,
			'sdt' => $sdt,
			'anhavatar' => $anhavatar,
			'linkfb' => $linkfb,
			'sodonhang' => $sodonhang
		);
		$this->db->insert('nhan_vien', $dulieu);
		return $this->db->insert_id();
	}
	public function getAllData()
	{
		$this->db->select('*');
		$dulieu = $this->db->get('nhan_vien');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}
	public function getDataById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dulieu = $this->db->get('nhan_vien');
		$dulieu = $dulieu->result_array();
		return $dulieu;

	}
	public function updateById($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)
	{
		$dulieu = array(
			'id' => $id,
			'ten' => $ten,
			'tuoi' => $tuoi,
			'sdt' => $sdt,
			'anhavatar' => $anhavatar,
			'linkfb' => $linkfb,
			'sodonhang' => $sodonhang
			 );
		$this->db->where('id', $id);		
		return $this->db->update('nhan_vien', $dulieu);

	}
	public function removeDataById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('nhan_vien');
		
	}

}

/* End of file nhansu_model.php */
/* Location: ./application/controllers/nhansu_model.php */