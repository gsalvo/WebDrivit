<?php
use Cake\Core\Configure;
if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?= Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>

<?php
    $this->layout = 'errors';
?>
<div class="container-message">
    <div class="row image">
        <?= $this->Html->image('logo.png', ['alt' => 'Error']) ?>
    </div>
    <div class="row">
        <div class="title"><h1>Oooops :(</h1></div>
    </div>
    <div class="row">
        <div class="message"><h4><?= sprintf('La dirección %s no fue encontrada en Drivit.', "<strong>'{$url}'</strong>") ?></h4></div>
    </div>
    <div class="row contentButton">
        <?= $this->Html->link(
                '<span class="glyphicon glyphicon-home"></span> Volver al inicio',
                ['controller'=> 'Questions', 'action'=>'index', '_full' => true],
                ['class' => 'btn btn-success', 'escape'=> false])?>
    </div>
</div
