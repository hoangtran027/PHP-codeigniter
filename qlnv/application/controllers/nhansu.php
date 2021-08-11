<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->getAllData();
		$ketqua = array('mangketqua' => $ketqua);
		$this->load->view('nhansu_view', $ketqua);
	}
	public function nhansu_add()
	{
		


		// xi li upload anh 

		$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		if (file_exists($target_file)) {
		  echo "Đã có 1 file trùng tên trong ổ cứng";
		  $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["anhavatar"]["size"] > 50000000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "Chỉ chấp nhận file ảnh .";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "lỗi, file chưa được upload ";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		    //echo "The file ". htmlspecialchars( basename( $_FILES["anhavatar"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}

		$anhavatar = base_url()."Fileupload/".basename($_FILES["anhavatar"]["name"]);
		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$sodonhang = $this->input->post('sodonhang');
		$linkfb = $this->input->post('linkfb');
		$sdt = $this->input->post('sdt');

		$this->load->model('nhansu_model');
		$trangthai = $this->nhansu_model->insertDataToMysql($ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang);
		if ($trangthai) {
			$this->load->view('insert_thanhcong_view');

		}
		else{
			echo "that bai";
		}
	}
	public function sua_nhansu($id)
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->getDataById($id);
		$ketqua = array('dulieukq' =>$ketqua );
		$this->load->view('sua_nhanvien_view', $ketqua, FALSE);
	
	}
	public function xoa_nhansu($id)
	{
		$this->load->model('nhansu_model');
		if ($this->nhansu_model->removeDataById($id)) {
			$this->load->view('xoa_thanhcong_view');
		}
		else{
			echo "Fail";
		}

	}
	public function update_nhansu($value='')
	{
		$id = $this->input->post('id');
		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$sdt = $this->input->post('sdt');
		$sodonhang = $this->input->post('sodonhang');
		$linkfb = $this->input->post('linkfb');
		$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["anhavatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["anhavatar"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		if (file_exists($target_file)) {
		  //echo "Đã có 1 file trùng tên trong ổ cứng";
		  $uploadOk = 0;
		}

		// Check file size
		if ($_FILES["anhavatar"]["size"] > 50000000) {
		 // echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  //echo "Chỉ chấp nhận file ảnh .";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  //echo "lỗi, file chưa được upload ";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["anhavatar"]["tmp_name"], $target_file)) {
		    //echo "The file ". htmlspecialchars( basename( $_FILES["anhavatar"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}

		$anhavatar = basename($_FILES["anhavatar"]["name"]);
		if ($anhavatar) {
			$anhavatar = base_url()."Fileupload/".basename($_FILES["anhavatar"]["name"]) ;
		}
		else{
			$anhavatar = $this->input->post('anhavatar2');
		}

		$this->load->model('nhansu_model');
		if ($this->nhansu_model->updateById($id,$ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang)) {
			$this->load->view('insert_thanhcong_view');
		}
		else{
			echo "fail";

		}
	}
	public function ajaxAdd()
	{
		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$sodonhang = $this->input->post('sodonhang');
		$linkfb = $this->input->post('linkfb');
		$sdt = $this->input->post('sdt');
		$anhavatar = "https://upload.wikimedia.org/wikipedia/commons/0/06/Tr%C3%BAc_Anh_%E2%80%93_M%E1%BA%AFt_bi%E1%BA%BFc_BTS_%282%29.png";
		$this->load->model('nhansu_model');
		$trangthai = $this->nhansu_model->insertDataToMysql($ten,$tuoi,$sdt,$anhavatar,$linkfb,$sodonhang);
		if ($trangthai) {
			echo "thanhcong";

		}
		else{
			echo "that bai";
		}
	}

	
}

/* End of file nhansu.php */
/* Location: ./application/controllers/nhansu.php */