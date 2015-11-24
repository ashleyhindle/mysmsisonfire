<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Received Message'), ['action' => 'edit', $receivedMessage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Received Message'), ['action' => 'delete', $receivedMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receivedMessage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Received Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Received Message'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="receivedMessages view large-9 medium-8 columns content">
    <h3><?= h($receivedMessage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Phonenumber') ?></th>
            <td><?= h($receivedMessage->phonenumber) ?></td>
        </tr>
        <tr>
            <th><?= __('Message') ?></th>
            <td><?= h($receivedMessage->message) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($receivedMessage->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($receivedMessage->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Datereceived') ?></th>
            <td><?= h($receivedMessage->datereceived) ?></td>
        </tr>
    </table>
</div>
