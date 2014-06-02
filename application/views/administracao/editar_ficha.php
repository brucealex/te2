<div id="content">
	<?php
		echo heading("Alterar ficha " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open_multipart('administracao/fichas/salvar_alteracao', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Fichas");
				
				echo form_hidden("id_ficha",$ficha[0]->id_ficha);
				
				echo form_label("Aluno","aluno");				
				foreach($alunos as $aluno){
					$array[$aluno->id_aluno] = $aluno->nome;
				}				
				echo form_dropdown('aluno', $array, $ficha[0]->aluno);
				
				
				echo form_label("Objetivo","objetivo");
				$atributos = array(
					"name"	=>	"objetivo",
					"id"	=>	"objetivo",
					"value"	=>	$ficha[0]->objetivo
				);
				echo form_input($atributos);
				
				echo form_label("Descrição da Ficha","descricao");
				$atributos = array(
					"name"	=>	"descricao",
					"id"	=>	"descricao",
					"value"	=>	$ficha[0]->descricao
				);
				echo form_textarea($atributos);
				
				

				echo "<br/>";
				
				echo form_submit("btnSubmit","Alterar");
			echo form_fieldset_close();
		echo form_close();
	?>
</div>