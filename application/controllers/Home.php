<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_home');
		
	}
	

	public function index()
	{
		$data = [
			'title' => 'Web Sekolah',
			'judul'	=> 'Home',
			'guru' => $this->M_home->getGuru()
		];
		$this->load->view('user/templates/head', $data);
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/nav', $data);
		$this->load->view('user/home/index');
		$this->load->view('user/templates/footer');
	}

	public function Download()
	{
		$data = [
			'title' => 'Web Sekolah',
			'judul'	=> 'Download',
			'download' => $this->M_home->getDownload()
		];
		$this->load->view('user/templates/head', $data);
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/nav', $data);
		$this->load->view('user/home/download', $data);
		$this->load->view('user/templates/footer');
	}
	
	
	public function guru()
	{
		$data = [
			'title' => 'Web Sekolah',
			'judul'	=> 'Guru',
			'guru' => $this->M_home->getGuru()
		];
		$this->load->view('user/templates/head', $data);
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/nav', $data);
		$this->load->view('user/home/guru', $data);
		$this->load->view('user/templates/footer');
	}

	public function blog()
	{

		$this->load->library('pagination');
		
		$config['base_url'] = base_url('home/blog');
		$config['total_rows'] = count($this->M_home->getAllBlog());
		$config['per_page'] = 8;
		$config['uri_segment'] = 3;

		// start limit
				$limit = $config['per_page'];
				$start =($this->uri->segment(3)) ? ($this->uri->segment(3)) :0;
		// and limit

		$config['first_link'] 		= 'First';
		$config['last_link'] 		= 'Last';
		$config['next_link'] 			= 'Next';
		$config['prev_link'] 			= 'Prev';
		$config['full_tag_open'] 	= '<div class="pagination_container d-flex flex-row align-items-center justify-content-start"><ul class="pagination_list">';

		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="active"><a>';
		$config['cur_tag_close'] 	= '</a></li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['full_tag_close'] = '</ul></div>';
		
		// proses pagination
		$this->pagination->initialize($config);
		$data = [
			'title' => 'Web Sekolah',
			'judul'	=> 'Blog',
			'pagination' => $this->pagination->create_links(),
			'blog' => $this->M_home->getBlog($limit, $start)
		];
		$this->load->view('user/templates/head_blog', $data);
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/nav', $data);
		$this->load->view('user/home/blog', $data);
		$this->load->view('user/templates/footer');
	}

	public function detail_blog($slug_berita)
	{
		$data = [
			'title' => 'Web Sekolah',
			'judul'	=> 'Blog',
			'detail' => $this->M_home->getDetailBlog($slug_berita)
		];
		$this->load->view('user/templates/head_detail_blog', $data);
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/nav', $data);
		$this->load->view('user/home/detail_blog', $data);
		$this->load->view('user/templates/footer');
	}


	public function Gallery()
	{
		$data = [
			'title' => 'Web Sekolah',
			'judul'	=> 'Gallery'
		];
		$this->load->view('user/templates/head', $data);
		$this->load->view('user/templates/header');
		$this->load->view('user/templates/nav', $data);
		$this->load->view('user/home/index');
		$this->load->view('user/templates/footer');
	}
}
