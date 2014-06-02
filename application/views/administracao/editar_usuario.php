<div id="content">
	<?php
		echo heading("Editar Usuário " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open('administracao/usuarios/salvar_alteracao', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Usuários");
				
				echo form_hidden("id_usuario",$usuarios[0]->id_usuario);
				
				echo form_label("Usuário","usuario");
				$atributos = array(
					"name"	=>	"usuario",
					"id"	=>	"usuario",
					"value"	=>	$usuarios[0]->usuario
				);
				echo form_input($atributos);
				
				echo form_label("Senha","senha");
				$atributos = array(
					"name"	=>	"senha",
					"id"	=>	"senha",
					"value"	=>	$usuarios[0]->senha
				);
				echo form_input($atributos);
				
				echo form_label("Usuário ativo?","ativo");
				if($usuarios[0]->ativo == 1){
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
