<div class="row-fluid"> <!-- row -->
	<div class="col-md-12">
		<div class="jumbotron">
 		<!-- col-md-12 -->

        <p class="lead">
        <?php
		echo heading("Cadastrar usuário " . img(base_url().'assets/imgs/novo.gif'),2,"class=''");
		echo "<br>";
		
  
		$attributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('administracao/usuarios/adicionar', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
					
					
								
			echo " <div class='form-group'>	";				
				$atributos = array(					
					"class"	=>	"col-sm-2 control-label"
				);				
				echo form_label("Usuario","usuario",$atributos);
				
				echo "<div class='col-sm-10'>";
				$atributos = array(
					"name"	=>	"usuario",
					"class" => "form-control",
					"placeholder" => "Usuário para login",
					"id"	=>	"usuario",
					"value"	=>	set_value('usuario')
				);
				echo form_input($atributos);
				echo "</div>";
			echo " </div>";
			
			
			echo " <div class='form-group'>	";
				$atributos = array(
					"class"	=>	"col-sm-2 control-label"
				);			
				echo form_label("Senha","senha",$atributos);
				echo "<div class='col-sm-10'>";
				$atributos = array(
					"name"	=>	"senha",
					"id"	=>	"senha",
					"placeholder" => "Senha para login",
					"class" => "form-control",
					"value"	=>	set_value('senha')
				);
				echo form_input($atributos);
				echo " </div>";
			echo "</div>";
			
			
			echo " <div class='form-group'>	";
				echo "<label class='col-sm-2 control-label' for='ativo'>Usuário Ativo?</label>";
				echo "<div class='col-sm-10'>";
				echo "<input type='checkbox' name='ativo' id='ativo' checked='checked'><br>";				
				echo " </div>";
			echo "</div>";
			
			
				
			
			echo " <div class='form-group'>	";
				echo " <div class='col-sm-offset-2 col-sm-10'>	";
				$atributos = array(
					"class" => "btn btn-md btn-primary",
					"type" => "submit",
					"name" => "btnSubmit",
					"value" => "Adicionar"
				);
				echo form_input($atributos);
					echo " </div>";
			echo "</div>";	
				
				
				
		echo form_close();
		//Fim do formulário...
		?>     
        
      </p> 
      
      </div>
	</div>   
</div>

<div class="row-fluid"> <!-- row -->
	<div class="col-md-12">
    
    <div class="panel panel-primary">
  <div class="panel-heading">
    <h1 class="panel-title">Usuários Cadastrados</h1>
  </div>
  <div class="panel-body">
 

	<?php
		
	
		//Início da listagem de categorias...
		$array_categorias = array();
		foreach($usuarios as $usuario){
			$array_categorias[] = array(
				
				anchor(
					base_url() . "administracao/usuarios/excluir/" . $usuario->id_usuario,
					img('assets/imgs/xis.gif'),
					array('onclick'=>"return confirm('Confirma a excluão deste usuário');")
				),
							
				anchor(
					base_url() . "administracao/usuarios/editar/".$usuario->id_usuario,
					img('assets/imgs/gear.gif'),
					array('onclick'=>"return confirm('Confirma a alteração deste usuário');")
				),
				
				$usuario-> usuario
			);
		}
	
		$tmpl = array ( 'table_open'  => '<table class="table table-condensed">' );
		$this->table->set_template($tmpl);
		$this->table->set_heading('Excluir','Editar','Usuário');
		
		echo "<div class='wraper_table'>";
			echo $this->table->generate($array_categorias);
		echo "</div>"; 
	?>
      </div>
	</div>
    
    </div>
</div>

