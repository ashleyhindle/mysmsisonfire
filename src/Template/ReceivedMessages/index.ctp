<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Received Message'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="receivedMessages index large-9 medium-8 columns content">
    <h3><?= __('Received Messages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('phonenumber') ?></th>
                <th><?= $this->Paginator->sort('message') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('datereceived') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($receivedMessages as $receivedMessage): ?>
            <tr>
                <td><?= $this->Number->format($receivedMessage->id) ?></td>
                <td><?= h($receivedMessage->phonenumber) ?></td>
                <td><?= h($receivedMessage->message) ?></td>
                <td><?= h($receivedMessage->status) ?></td>
                <td><?= h($receivedMessage->datereceived) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $receivedMessage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $receivedMessage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $receivedMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receivedMessage->id)]) ?>
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
