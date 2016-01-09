<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Alternative'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="alternatives index large-9 medium-8 columns content">
    <h3><?= __('Alternatives') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('alternative') ?></th>
                <th><?= $this->Paginator->sort('right') ?></th>
                <th><?= $this->Paginator->sort('question_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alternatives as $alternative): ?>
            <tr>
                <td><?= $this->Number->format($alternative->id) ?></td>
                <td><?= h($alternative->alternative) ?></td>
                <td><?= h($alternative->right) ?></td>
                <td><?= $alternative->has('question') ? $this->Html->link($alternative->question->id, ['controller' => 'Questions', 'action' => 'view', $alternative->question->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $alternative->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $alternative->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $alternative->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alternative->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
