<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Questions Type'), ['action' => 'edit', $questionsType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Questions Type'), ['action' => 'delete', $questionsType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionsType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Questions Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="questionsTypes view large-9 medium-8 columns content">
    <h3><?= h($questionsType->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Question') ?></th>
            <td><?= $questionsType->has('question') ? $this->Html->link($questionsType->question->id, ['controller' => 'Questions', 'action' => 'view', $questionsType->question->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Type') ?></th>
            <td><?= $questionsType->has('type') ? $this->Html->link($questionsType->type->id, ['controller' => 'Types', 'action' => 'view', $questionsType->type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($questionsType->id) ?></td>
        </tr>
    </table>
</div>
