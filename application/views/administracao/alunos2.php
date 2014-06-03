<div class="row-fluid"> <!-- row -->
	<div class="col-md-12">
		<div class="jumbotron">
 		<!-- col-md-12 -->

        <p class="lead">
        <?php
		echo heading("Cadastrar aluno " . img(base_url().'assets/imgs/novo.gif'),2,"class=''");
		echo "<br>";
		
  
		$attributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('administracao/alunos/adicionar', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
					
					
								
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
					"value"	=>	set_value('nome')
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
					"value"	=>	set_value('sobrenome')
				);
				echo form_input($atributos);
				echo " </div>";
			echo "</div>";
			
			
			echo " <div class='form-group'>	";
				echo "<label class='col-sm-2 control-label' for='ativo'>Aluno Ativo?</label>";
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
    <h1 class="panel-title">Alunos Cadastrados</h1>
  </div>
  <div class="panel-body">
 

	<?php
		
	
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
	
		$tmpl = array ( 'table_open'  => '<table class="table table-condensed">' );
		$this->table->set_template($tmpl);
		$this->table->set_heading('Excluir','Editar','Aluno');
		
		echo "<div class='wraper_table'>";
			echo $this->table->generate($array_categorias);
		echo "</div>"; 
	?>
      </div>
	</div>
    
    </div>
</div>
