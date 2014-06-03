<div class="row-fluid"> <!-- row -->
	<div class="col-md-12">
		<div class="jumbotron">
 		<!-- col-md-12 -->

        <p class="lead">
        <?php
		echo heading("Alterar aluno " . img(base_url().'assets/imgs/novo.gif'),2,"class=''");
		echo "<br>";
		
  
		$attributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('administracao/alunos/salvar_alteracao', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
					
					
			
			echo form_hidden("id_aluno",$alunos[0]->id_aluno);
								
			echo " <div class='form-group'>	";				
				$atributos = array(					
					"class"	=>	"col-sm-2 control-label"
				);				
				echo form_label("Nome","nome",$atributos);
				
				echo "<div class='col-sm-10'>";
				$atributos = array(
					"name"	=>	"nome",
					"class" => "form-control",
					"placeholder" => "Primeiro Nome",
					"id"	=>	"nome",
					"value"	=>	$alunos[0]->nome
				);
				echo form_input($atributos);
				echo "</div>";
			echo " </div>";
			
			
			echo " <div class='form-group'>	";
				$atributos = array(
					"class"	=>	"col-sm-2 control-label"
				);			
				echo form_label("Sobrenome","sobrenome",$atributos);
				echo "<div class='col-sm-10'>";
				$atributos = array(
					"name"	=>	"sobrenome",
					"id"	=>	"sobrenome",
					"placeholder" => "Segundo Nome",
					"class" => "form-control",
					"value"	=>	$alunos[0]->sobrenome
				);
				echo form_input($atributos);
				echo " </div>";
			echo "</div>";
			
			
			echo " <div class='form-group'>	";
				echo "<label class='col-sm-2 control-label' for='ativo'>Aluno Ativo?</label>";
				echo "<div class='col-sm-10'>";
				if($alunos[0]->ativo == 1){
					echo "<input type='checkbox' name='ativo' id='ativo' value='1' checked='checked'>";
					}else{
						echo "<input type='checkbox' name='ativo' id='ativo' value='1'>";
						}
				echo "<br>";
								
				echo " </div>";
			echo "</div>";
			
			
				
			
			echo " <div class='form-group'>	";
				echo " <div class='col-sm-offset-2 col-sm-10'>	";
				$atributos = array(
					"class" => "btn btn-md btn-primary",
					"type" => "submit",
					"name" => "btnSubmit",
					"value" => "Alterar"
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
