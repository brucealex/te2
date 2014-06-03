<div id="content">
	<?php
		echo heading("Cadastrar ficha " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open_multipart('administracao/fichas/adicionar', $attributes);	//MULTPART	
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Fichas");
				
				echo form_label("Aluno","aluno");				
				foreach($alunos as $aluno){
					$array[$aluno->id_aluno] = $aluno->nome;
				}				
				echo form_dropdown('aluno', $array);
				
				echo form_label("Objetivo","objetivo");
				$atributos = array(
					"name"	=>	"objetivo",
					"id"	=>	"objetivo",
					"value"	=>	set_value('objetivo')
				);
				echo form_input($atributos);
				
				
				echo form_label("Descrição da Ficha","descricao");
				$atributos = array(
					"name"	=>	"descricao",
					"id"	=>	"descricao",
					"value"	=>	set_value('descricao')
				);
				echo form_textarea($atributos);
				
				
				
				echo form_submit("btnSubmit","Adicionar");
			echo form_fieldset_close();
		echo form_close();
		//Fim do formulário...
		
		echo heading("Fichas Cadastradas " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		//Início da listagem de categorias...
		$array_receitas = array();
		foreach($fichas as $ficha){
			$array_receitas[] = array(
				
				anchor(
					base_url() . "administracao/fichas/excluir/" . $ficha->id_ficha,
					img('assets/imgs/xis.gif'),
					array('onclick'=>"return confirm('Confirma a excluão desta receita?');")
				),
							
				anchor(
					base_url() . "administracao/fichas/editar/".$ficha->id_ficha,
					img('assets/imgs/gear.gif'),
					array('onclick'=>"return confirm('Confirma a alteração desta receita?');")
				),
				$ficha->aluno,
			);
		}
		
		$this->table->set_heading('Excluir','Editar','Aluno');
		echo "<div class='wraper_table'>";
			echo $this->table->generate($array_receitas);
		echo "</div>"; 
	?>
</div>
