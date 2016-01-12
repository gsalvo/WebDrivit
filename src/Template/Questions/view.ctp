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
                        if($alternatives->right){
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
                    <div class="square">
                        <span class="glyphicon glyphicon-picture"></span>
                    </div>                    
            <?php
                }
            ?>
            
        </div>
    </div>

</div>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Alternatives'), ['controller' => 'Alternatives', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Alternative'), ['controller' => 'Alternatives', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="questions view large-9 medium-8 columns content">
    <h3><?= h($question->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Question') ?></th>
            <td><?= h($question->question) ?></td>
        </tr>
        <tr>
            <th><?= __('Image') ?></th>
            <td><?= h($question->image) ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= $question->has('category') ? $this->Html->link($question->category->name, ['controller' => 'Categories', 'action' => 'view', $question->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($question->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Alternatives') ?></h4>
        <?php if (!empty($question->alternatives)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Alternative') ?></th>
                <th><?= __('Right') ?></th>
                <th><?= __('Question Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($question->alternatives as $alternatives): ?>
            <tr>
                <td><?= h($alternatives->id) ?></td>
                <td><?= h($alternatives->alternative) ?></td>
                <td><?= h($alternatives->right) ?></td>
                <td><?= h($alternatives->question_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Alternatives', 'action' => 'view', $alternatives->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Alternatives', 'action' => 'edit', $alternatives->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Alternatives', 'action' => 'delete', $alternatives->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alternatives->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Types') ?></h4>
        <?php if (!empty($question->types)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Class') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($question->types as $types): ?>
            <tr>
                <td><?= h($types->id) ?></td>
                <td><?= h($types->class) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Types', 'action' => 'view', $types->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Types', 'action' => 'edit', $types->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Types', 'action' => 'delete', $types->id], ['confirm' => __('Are you sure you want to delete # {0}?', $types->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
-->
