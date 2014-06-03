<?php
$atributos = array('class' => 'form-signin', 'id' => 'formlogin', 'role' => 'form');
echo form_open(base_url().'administracao/home/login',$atributos);
?>
        <h2 class="form-signin-heading">Login</h2>
        <input type="text" class="form-control" placeholder="Usuário" name="usuario" value="" 				required autofocus>
        <input type="password" class="form-control" name="senha" value="" placeholder="Password" required>

        <input class="btn btn-lg btn-primary btn-block" type="submit" name="btnSubmit" value="Fazer LOGIN" />
<?php        
echo form_close();
?>

