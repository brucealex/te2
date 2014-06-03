<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Alunos extends CI_Controller {
	
	public function __construct(){
		parent::__construct();			
		if(!$this->session->userdata('session_id') || !$this->session->userdata('logado')){
			redirect(base_url()."administracao/home");
		}
	}
	
	public function index(){
		$this->load->library('table');
		$data['alunos'] = $this->db->get('aluno')->result();
		$this->load->view('administracao/html_header2');
		$this->load->view('administracao/menu2');
		$this->load->view('administracao/alunos2',$data);
		$this->load->view('administracao/html_footer2');
	}
	
	public function adicionar(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('sobrenome', 'Sobrenome', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$data['nome'] = $this->input->post('nome');
			$data['sobrenome'] = $this->input->post('sobrenome');
			$this->db->insert('aluno',$data);
			redirect(base_url()."administracao/alunos");
		}
	}
	
	public function editar($id){
		$this->db->where('id_aluno',$id);
		$data['alunos'] = $this->db->get('aluno')->result();
		$this->load->view('administracao/html_header2');
		$this->load->view('administracao/menu2');
		$this->load->view('administracao/editar_aluno2',$data);
		$this->load->view('administracao/html_footer2');
	}
	
	public function salvar_alteracao(){		
		$id = $this->input->post('id_aluno');				
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nome', 'Nome', 'required');
		$this->form_validation->set_rules('sobrenome', 'Sobrenome', 'required');
		if($this->form_validation->run() == FALSE)
		{			
			$this->editar($id);
		}
		else
		{
			$data['nome'] = $this->input->post('nome');
			$data['sobrenome'] = $this->input->post('sobrenome');
			if($this->input->post('ativo') == 1){
				$data['ativo'] = 1;
				}else{
					$data['ativo'] = 2;
					}
			$this->db->where('id_aluno',$id);
			$this->db->update('aluno',$data);
			redirect(base_url()."administracao/alunos");
		}
	}
	
	function excluir($id){
		$this->db->where('id_aluno',$id);
		$this->db->delete('aluno');
		redirect(base_url()."administracao/alunos");
	}
}
