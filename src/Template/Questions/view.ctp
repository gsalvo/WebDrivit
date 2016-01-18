<div class="container-fluid content">
    <div class="row content-menu-view">
        <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"/>', ['action' => 'edit', $question->id],['escape'=> false]) ?>
        <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"/>', ['action' => 'delete', $question->id], ['confirm' => __('Estás seguro que desea eliminar esta pregunta'), 'escape'=> false]) ?>
    </div>
    <div class="row breadcrumbs">
        <ol class="breadcrumb">
            <li><?= $this->Html->link('Preguntas', ['action' => 'index']) ?></li>
            <li class="active">Ver pregunta</li>
        </ol>
    </div>
    <div class="row view-question">
        <div class="col-md-7">
            <div class="row view-text-category">
                Categoría: <?= $question->category->name?>
            </div>
            <div class="row view-text-question">
                <?= $question->question?>
            </div>
            <?php foreach ($question->alternatives as $alternatives): ?>
                <div class="row view-text-alternative">
                    <?php 
                        if($alternatives->correct){
                            echo '<span class="glyphicon glyphicon-ok icon-check"></span>';
                        }else{
                            echo '<span class="glyphicon glyphicon-remove icon-check"></span>';
                        }
                        ?>      
                    <?= $alternatives->alternative?>
                </div>
            <?php endforeach;?>            
            <div class="row class">
                <?php 
                foreach ($question->types as $types): 
                    if(strcmp($types->class, "B")== 0){
                ?>
                        <div class="circle">
                            <?= $this->Html->image('ic_car.png', ['alt' => 'clase B', 'width'=>'40px']) ?>
                        </div>
                <?php
                   }else{
                ?>
                        <div class="circle">
                            <?= $this->Html->image('ic_motorbike.png', ['alt' => 'clase C', 'width'=>'40px']) ?>
                        </div>
                <?php
                    }
                endforeach;
                ?>                                
            </div>
        </div>
        <div class="col-md-5">
            <?php 
                if($question->image == null){
            ?>
                    <div class="rectangle">
                        <span class="glyphicon glyphicon-picture"></span>
                    </div>                    
            <?php
                }else{
            ?>
                    <?= $this->Html->image('hdpi/'.$question->image, ['alt' => 'Imagen de la pregunta']) ?>
            <?php
                }
            ?>
        </div>
    </div>
</div>