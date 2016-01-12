<div class="container-fluid content">
    <div class="row information">
        Cantidad total de preguntas: <?= $number ?>
    </div>
    <div class="row content-menu">
        <div class="col-md-7">
            <div class="row">
                <?= $this->Html->link(
                'Nueva pregunta',
                ['controller'=> 'Questions', 'action'=>'add', '_full' => true],
                ['class' => 'btn btn-success'])?>
            </div>            
        </div>
        <div class="col-md-5">
            <div class="row">
                <?= $this->Form->create(null, [
                    'type' => 'get', 
                    'url' => [
                        'controller' => 'questions', 
                        'action' => 'index'
                        ]
                ]) ?>
                <div class="input-group">
                    <?= $this->Form->text('search',['class'=>'form-control', 'placeholder' => 'ingrese palabra clave...', 'name'=>'search']) ?>
                    <?= $this->Html->tag('span', $this->Form->button('Buscar', ['type'=> 'submit', 'class'=> 'btn btn-default']), ['class'=>'input-group-btn'],['escape'=> false]) ?>
                </div>
                <?= $this->Form->end(); ?>          
            </div>            
        </div>        
    </div>
    <table class="table">
        <thead>
            <tr>                
                <th class="table-question"><?= $this->Paginator->sort('question','Pregunta') ?></th>
                <th class="table-class">Clase</th>
                <th class="table-category">Categoría</th>
                <th class="table-alternatives">Alternativas</th>
                <th class="table-actions">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question):?>

                <tr>                    
                    <td rowspan="3">
                        <?= $this->Text->truncate(
                            $question->question,
                            170,
                            ['ellipsis' => '...', 'exact'=> false]) 
                        ?>
                    </td>
                    <td rowspan="3"> <?= (count($question->types) > 1) ? 'B y C': $question->types[0]->class  ?></td>
                    <td rowspan="3"> <?= $question->category->name ?></td>                    
                    <td>
                        <?= $this->Text->truncate(
                            $question->alternatives[0]->alternative,
                            38,
                            ['ellipsis' => '...', 'exact'=> false]) 
                        ?>
                        <?php 
                            if($question->alternatives[0]->right){
                                echo '<span class="glyphicon glyphicon-ok icon-check"/>';
                            }else{
                                echo '<span class="glyphicon glyphicon-remove icon-check"/>';
                            }
                         ?>                        
                    </td> 
                    <td style="vertical-align: middle;" Class="action" rowspan="3"> 
                        <?= $this->Html->link('<span class="glyphicon glyphicon-eye-open"/>', ['action' => 'view', $question->id],['escape'=> false]) ?>
                        <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"/>', ['action' => 'edit', $question->id],['escape'=> false]) ?>
                        <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"/>', ['action' => 'delete', $question->id], ['confirm' => __('Estás seguro que desea eliminar la pregunta: "{0}"', $question->question), 'escape'=> false]) ?>
                    </td>                        
                </tr>
                <tr>
                    <td>
                        <?= $this->Text->truncate(
                            $question->alternatives[1]->alternative,
                            38,
                            ['ellipsis' => '...', 'exact'=> false]) 
                        ?>
                        <?php 
                            if($question->alternatives[1]->right){
                                echo '<span class="glyphicon glyphicon-ok icon-check"/>';
                            }else{
                                echo '<span class="glyphicon glyphicon-remove icon-check"/>';
                            }
                         ?> 
                    </td>
                </tr>
                <tr>
                    <td >
                        <?= $this->Text->truncate(
                            $question->alternatives[2]->alternative,
                            38,
                            ['ellipsis' => '...', 'exact'=> false]) 
                        ?>
                        <?php 
                            if($question->alternatives[2]->right){
                                echo '<span class="glyphicon glyphicon-ok icon-check"/>';
                            }else{
                                echo '<span class="glyphicon glyphicon-remove icon-check"/>';
                            }
                         ?> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('&laquo;', ['escape'=> false]) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('&raquo;', ['escape'=> false]) ?>
        </ul>        
    </div>
</div>