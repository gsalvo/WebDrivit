
<div class="content-login">
        
	<div class="row title">
		Drivit
	</div>
        <?= $this->Form->create() ?>
	<div class="row form">
		<div class="form-group">                
        	<?= $this->Form->input('username', ['class'=>'form-control', 'label'=> false, 'placeholder'=> 'Usuario','autocomplete'=>'off'])?>
        </div>
        <div class="form-group">                
        	<?= $this->Form->password('password', ['class'=>'form-control', 'label'=> false, 'placeholder'=> 'Contraseña','autocomplete'=>'off'])?>
        </div>
        <div class="form-group button">
        	<?= $this->Form->button('Entrar', ['type'=> 'submit', 'class'=> 'btn btn-default']) ?>
        </div>
	</div>
        <?= $this->Form->end() ?>
        <?= $this->Flash->render() ?>
</div>