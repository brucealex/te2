<div class="row-fluid"> <!-- row -->
	<div class="col-md-12">
		<div class="jumbotron">
 		<!-- col-md-12 -->

        <p class="lead">
        <?php
		echo heading("Cadastrar ficha " . img(base_url().'assets/imgs/novo.gif'),2,"class=''");
		echo "<br>";
		
  
		$attributes = array('class' => 'form-horizontal', 'role' => 'form');
		echo form_open('administracao/fichas/adicionar', $attributes);		
			
			echo "<span class='validacoes'>" . validation_errors() . "</span>";
					
			echo " <div class='form-group'>	";
				$atributos = array(					
					"class"	=>	"col-sm-2 control-label"
				);	
				echo form_label("Aluno","aluno",$atributos);				
				foreach($alunos as $aluno){
					$array[$aluno->id_aluno] = $aluno->nome;
				}
				echo "<div class='col-sm-10'>";				
					echo form_dropdown('aluno', $array,'','class="form-control"');
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
					"value"	=>	set_value('objetivo')
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
					"value"	=>	set_value('sobrenome')
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
    <h1 class="panel-title">Fichas Cadastradas</h1>
  </div>
  <div class="panel-body">
 

	<?php
		
	
		//Início da listagem de categorias...
		$array_categorias = array();
		foreach($fichas as $ficha){
			$array_categorias[] = array(
				
				anchor(
					base_url() . "administracao/fichas/excluir/" . $ficha->id_ficha,
					img('assets/imgs/xis.gif'),
					array('onclick'=>"return confirm('Confirma a excluão desta ficha');")
				),
							
				anchor(
					base_url() . "administracao/fichas/editar/".$ficha->id_ficha,
					img('assets/imgs/gear.gif'),
					array('onclick'=>"return confirm('Confirma a alteração desta ficha');")
				),
				
				$ficha-> aluno 
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
