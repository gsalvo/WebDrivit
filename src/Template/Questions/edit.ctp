<div class="container-fluid content">    
    <div class="row breadcrumbs">
        <ol class="breadcrumb">
            <li><?= $this->Html->link('Preguntas', ['action' => 'index']) ?></li>
            <li class="active">Editar pregunta</li>
        </ol>
    </div>
    <div class="row">
        <?= $this->Form->create(null, [
            'type' => 'post', 
            'enctype' => 'multipart/form-data',
            'url' => [
            'controller' => 'questions', 
            'action' => 'edit/'.$question->id
             ]])
        ?>
            <div class="col-md-7">                                 
                <div class="checkbox">
                    <label>
                        <?= $this->Form->checkbox('classB', ['value' => '1']);?>
                        Clase B
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <?= $this->Form->checkbox('classC', ['value' => '1']);?>
                        Clase C
                    </label>
                </div>
                <div class="form-group">                
                    <?= $this->Form->input('category_id', ['options' => $categories, 'class'=>'form-control', 'label'=> false, 'empty'=> 'Seleccione una categoría'])?>
                </div>
                <div class="form-group">
                    <?= $this->Form->textarea('question', ['label' => false, 'class'=>'form-control', 'rows'=>'4', 'placeholder'=> 'Pregunta']) ?>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <?= $this->Form->radio('correct', [['value' => '1', 'text'=> '', 'id'=> 'correct-1']],['hiddenField'=>false]) ?>
                        </span>
                        <?= $this->Form->input('alternative-1',['label'=>false, 'class'=>'form-control']) ?>
                    </div>            
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <?= $this->Form->radio('correct', [['value' => '2', 'text'=> '', 'id'=> 'correct-2']],['hiddenField'=>false]) ?>
                        </span>
                        <?= $this->Form->input('alternative-2',['label'=>false, 'class'=>'form-control']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <?= $this->Form->radio('correct', [['value' => '3', 'text'=> '', 'id'=> 'correct-3']],['hiddenField'=>false]) ?>
                        </span>
                        <?= $this->Form->input('alternative-3',['label'=>false, 'class'=>'form-control']) ?>
                    </div>
                </div>
                <div class="form-group">
                    <?= $this->Form->file('Imagen', ['name'=>'image'])?>
                </div>
                <div class="form-group save">
                    <?= $this->Form->button('Guardar', ['type'=> 'submit', 'class'=> 'btn btn-success']) ?>
                </div>
            </div>
        <?= $this->Form->end(); ?> 
    </div>
</diV>

<!--<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create($question) ?>
    <fieldset>
        <legend><?= __('Edit Question') ?></legend>
        <?php
            echo $this->Form->input('question');
            echo $this->Form->input('image');
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('types._ids', ['options' => $types]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
-->