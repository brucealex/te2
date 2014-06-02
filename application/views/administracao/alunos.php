<div id="content">
	<?php
		echo heading("Cadastrar aluno " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open('administracao/alunos/adicionar', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Alunos");
				
				echo form_label("Nome","nome");
				$atributos = array(
					"name"	=>	"nome",
					"id"	=>	"nome",
					"value"	=>	set_value('nome')
				);
				echo form_input($atributos);
				
				echo form_label("Sobrenome","sobrenome");
				$atributos = array(
					"name"	=>	"sobrenome",
					"id"	=>	"sobrenome",
					"value"	=>	set_value('sobrenome')
				);
				echo form_input($atributos);

			
				echo "<label for='ativo'>Aluno Ativo?</label>";
				echo "<input type='checkbox' name='ativo' id='ativo' checked='checked'><br>";
				
				
				echo form_submit("btnSubmit","Adicionar");
			echo form_fieldset_close();
		echo form_close();
		//Fim do formulário...
		
		echo heading("Alunos Cadastrados " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		//Início da listagem de categorias...
		$array_categorias = array();
		foreach($alunos as $aluno){
			$array_categorias[] = array(
				
				anchor(
					base_url() . "administracao/alunos/excluir/" . $aluno->id_aluno,
					img('assets/imgs/xis.gif'),
					array('onclick'=>"return confirm('Confirma a excluão deste aluno');")
				),
							
				anchor(
					base_url() . "administracao/alunos/editar/".$aluno->id_aluno,
					img('assets/imgs/gear.gif'),
					array('onclick'=>"return confirm('Confirma a alteração deste aluno');")
				),
				
				$aluno-> nome . ' ' . $aluno-> sobrenome 
			);
		}
		
		$this->table->set_heading('Excluir','Editar','Aluno');
		echo "<div class='wraper_table'>";
			echo $this->table->generate($array_categorias);
		echo "</div>"; 
	?>
</div>
