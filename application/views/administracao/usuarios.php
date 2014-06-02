<div id="content">
	<?php
		echo heading("Cadastrar usuário " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		$attributes = array('class' => 'formcadastros', 'id' => 'formcadastro');
		echo form_open('administracao/usuarios/adicionar', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_fieldset("Usuários");
				
				echo form_label("Usuário","usuario");
				$atributos = array(
					"name"	=>	"usuario",
					"id"	=>	"usuario",
					"value"	=>	set_value('usuario')
				);
				echo form_input($atributos);
				
				echo form_label("Senha","senha");
				$atributos = array(
					"name"	=>	"senha",
					"id"	=>	"senha",
					"value"	=>	set_value('senha')
				);
				echo form_input($atributos);

			
				echo "<label for='ativo'>Usuário ativo?</label>";
				echo "<input type='checkbox' name='ativo' id='ativo' checked='checked'><br>";
				
				
				echo form_submit("btnSubmit","Adicionar");
			echo form_fieldset_close();
		echo form_close();
		//Fim do formulário...
		
		echo heading("Usuários Cadastrados " . img(base_url().'assets/imgs/novo.gif'),2,"class='divisor'");
		
		//Início da listagem de categorias...
		$array_categorias = array();
		foreach($usuarios as $categoria){
			$array_categorias[] = array(
				
				anchor(
					base_url() . "administracao/usuarios/excluir/" . $categoria->id_usuario,
					img('assets/imgs/xis.gif'),
					array('onclick'=>"return confirm('Confirma a excluão deste usuário');")
				),
							
				anchor(
					base_url() . "administracao/usuarios/editar/".$categoria->id_usuario,
					img('assets/imgs/gear.gif'),
					array('onclick'=>"return confirm('Confirma a alteração deste usuário');")
				),
				
				$categoria->usuario
			);
		}
		
		$this->table->set_heading('Excluir','Editar','Usuário');
		echo "<div class='wraper_table'>";
			echo $this->table->generate($array_categorias);
		echo "</div>"; 
	?>
</div>
