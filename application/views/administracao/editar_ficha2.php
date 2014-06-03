<div class="row-fluid"> <!-- row -->
	<div class="col-md-12">
		<div class="jumbotron">
 		<!-- col-md-12 -->

        <p class="lead">
        <?php
		echo heading("Alterar ficha " . img(base_url().'assets/imgs/novo.gif'),2,"class=''");
		echo "<br>";
		
  
		$attributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('administracao/fichas/salvar_alteracao', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
			
			echo form_hidden("id_ficha",$ficha[0]->id_ficha);
					
			echo " <div class='form-group'>	";
				$atributos = array(					
					"class"	=>	"col-sm-2 control-label"
				);	
				echo form_label("Aluno","aluno",$atributos);				
				foreach($alunos as $aluno){
					$array[$aluno->id_aluno] = $aluno->nome;
				}
				echo "<div class='col-sm-10'>";				
					echo form_dropdown('aluno', $array, $ficha[0]->aluno,'class="form-control"');
				echo "</div>";
			echo " </div>";
			
			
			
			
								
			echo " <div class='form-group'>	";				
				$atributos = array(					
					"class"	=>	"col-sm-2 control-label"
				);				
				echo form_label("Objetivo","objetivo",$atributos);
				
				echo "<div class='col-sm-10'>";
				$atributos = array(
					"name"	=>	"objetivo",
					"class" => "form-control",
					"placeholder" => "Objetivo do aluno",
					"id"	=>	"objetivo",
					"value"	=>	$ficha[0]->objetivo
				);
				echo form_input($atributos);
				echo "</div>";
			echo " </div>";
			
			
			echo " <div class='form-group'>	";
				$atributos = array(
					"class"	=>	"col-sm-2 control-label"
				);			
				echo form_label("Descrição","descricao",$atributos);
				echo "<div class='col-sm-10'>";
				$atributos = array(
					"name"	=>	"descricao",
					"id"	=>	"descricao",
					"placeholder" => "Descrição da ficha",
					"class" => "form-control",
					"value"	=>	$ficha[0]->descricao
				);
				echo form_textarea($atributos);
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

