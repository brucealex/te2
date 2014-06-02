<div id="content">
	<?php
		echo heading("Editar Alunos " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open('administracao/alunos/salvar_alteracao', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Alunos");
				
				echo form_hidden("id_aluno",$alunos[0]->id_aluno);
				
				echo form_label("Nome","nome");
				$atributos = array(
					"name"	=>	"nome",
					"id"	=>	"nome",
					"value"	=>	$alunos[0]->nome
				);
				echo form_input($atributos);
				
				echo form_label("Sobrenome","sobrenome");
				$atributos = array(
					"name"	=>	"sobrenome",
					"id"	=>	"sobrenome",
					"value"	=>	$alunos[0]->sobrenome
				);
				echo form_input($atributos);
				
				echo form_label("Aluno ativo?","ativo");
				if($alunos[0]->ativo == 1){
					echo "<input type='checkbox' name='ativo' id='ativo' value='1' checked='checked'>";
					}else{
						echo "<input type='checkbox' name='ativo' id='ativo' value='1'>";
						}
				echo "<br>";
				echo form_submit("btnSubmit","Alterar");
			echo form_fieldset_close();
		echo form_close(); 
	?>
</div>
