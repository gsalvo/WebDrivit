<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Drivit: Panel de administración';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->Html->charset(); ?>
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('defaultStyle.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.min') ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row header">            
                <div class="container">
                    <div class="row">
                        <nav class = "navbar navbar-default navbar-collapse">
                            <div class="container-fluid">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <?= $this->Html->link(
                                            'Drivit',
                                            ['controller' => 'Questions', 'action' => 'index', '_full' => true],
                                            ['class' => "navbar-brand"])?>
                                </div>
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li id="btn-questions" class="active"><?= $this->Html->link(
                                            'Preguntas',
                                            ['controller' => 'Questions', 'action' => 'index', '_full' => true]) ?>
                                        </li>
                                        <li id="btn-quantity"><?= $this->Html->link(
                                            'Cantidades',
                                            ['controller' => 'Questions', 'action' => 'quantity', '_full' => true]) ?>
                                        </li>
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li><?= $this->Html->link(
                                        $this->Html->tag('span','', ['class'=>'glyphicon glyphicon-log-out']),
                                        ['controller' => 'Questions', 'action' => 'index', '_full' => true],
                                        ['escape' => false])?>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>  
            </div>        
        </div>        
    </div>    
    <div class="container body">
        <?= $this->Flash->render() ?>
        <div class="row">
            <?= $this->fetch('content') ?>
        </div>
    </div>    
    <script type="text/javascript">
        $("#alert").fadeTo(15000, 500).slideUp(500, function(){
        $("#alert").alert('close');});
    </script>
</body>
</html>
