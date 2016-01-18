<div class="content-login">
	<div class="row title">
		Drivit
	</div>
	<div class="row form">
		<div class="form-group">                
        	<?= $this->Form->input('usernamse', ['class'=>'form-control', 'label'=> false, 'placeholder'=> 'Usuario','autocomplete'=>'off'])?>
        </div>
        <div class="form-group">                
        	<?= $this->Form->password('passsword', ['class'=>'form-control', 'label'=> false, 'placeholder'=> 'Contraseña','autocomplete'=>'off'])?>
        </div>
        <div class="form-group button">
        	<?= $this->Form->button('Entrar', ['type'=> 'submit', 'class'=> 'btn btn-default']) ?>
        </div>
	</div>

</div>