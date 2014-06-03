<div id="top">
	<span class='saudacao'>
		Seja bem vindo: 
		<?php
		echo $this->session->userdata('usuario');
		echo " | ";
		echo anchor(base_url(). 'administracao/home/logout', 'Sair', 'title="Efetuar Logout"');
		?>
	</span>
	<div id="menu">
		<?php
			$menu[] = anchor(base_url(). 'administracao/alunos', 'Alunos',
'title="Administrar Alunos"');
			$menu[] = anchor(base_url(). 'administracao/fichas', 'Fichas',
'title="Administrar Fichas"');
			echo ul($menu);
		?>
	</div>
</div>