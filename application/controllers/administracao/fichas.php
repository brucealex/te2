<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Fichas extends CI_Controller {
	
	public function __construct(){
		parent::__construct();			
		if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
			redirect(base_url()."administracao/home");
		}
	}
	
	public function index(){
		$this->load->library('table');
		$data['fichas'] = $this->db->get('ficha')->result();
		$data['alunos'] = $this->db->get('aluno')->result();
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/fichas',$data);
		$this->load->view('administracao/html_footer');
	}
	
	public function salvar_alteracao(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('aluno', 'Aluno', 'required');
		$this->form_validation->set_rules('objetivo', 'Objetivo', 'required');
		$this->form_validation->set_rules('descricao', 'Descrição', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{			

			$dados['objetivo'] = $this->input->post('objetivo');
			$dados['descricao'] = $this->input->post('descricao');
			$dados['aluno'] = $this->input->post('aluno');
			
			$this->db->where('id_ficha',$this->input->post('id_ficha'));
			$this->db->update('ficha',$dados);
			redirect(base_url()."administracao/fichas");
		}
	}
	
	
	public function adicionar(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('aluno', 'Aluno', 'required');
		$this->form_validation->set_rules('objetivo', 'Objetivo', 'required');
		$this->form_validation->set_rules('descricao', 'Descrição', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{

				$dados['objetivo'] = $this->input->post('objetivo');
				$dados['descricao'] = $this->input->post('descricao');
				$dados['aluno'] = $this->input->post('aluno');
				$this->db->insert('ficha',$dados);
				redirect(base_url()."administracao/fichas");
			
		}
	}

	public function editar($ficha = null){
		$data['alunos'] = $this->db->get('aluno')->result();
		
		$this->db->where('id_ficha',$ficha);
		$data['ficha'] = $this->db->get('ficha')->result();
		
		$this->load->view('administracao/html_header');
		$this->load->view('administracao/menu');
		$this->load->view('administracao/editar_ficha',$data);
		$this->load->view('administracao/html_footer');
	}
	
	public function excluir($id){
		$this->db->where('id_ficha',$id);
		$this->db->delete('ficha');
		redirect(base_url()."administracao/fichas");
	} 
}