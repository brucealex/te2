
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Administração</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a  href="<?php echo base_url('administracao/alunos') ?>">Alunos</a></li>
            <li><a href="<?php echo base_url('administracao/fichas') ?>">Fichas</a></li>
             <li><a href="<?php echo base_url('administracao/usuarios') ?>">Usuários</a></li>
          
          </ul>
          
           <ul class="nav navbar-nav navbar-right">

			
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php
		echo $this->session->userdata('usuario');?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><?php echo anchor(base_url(). 'administracao/home/logout', 'Sair', 'title="Efetuar Logout"');?>
				</li>              
              </ul>
            </li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>

    </div>