<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Sent Message'), ['action' => 'edit', $sentMessage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Sent Message'), ['action' => 'delete', $sentMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sentMessage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sent Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sent Message'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sentMessages view large-9 medium-8 columns content">
    <h3><?= h($sentMessage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Phonenumber') ?></th>
            <td><?= h($sentMessage->phonenumber) ?></td>
        </tr>
        <tr>
            <th><?= __('Message') ?></th>
            <td><?= h($sentMessage->message) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($sentMessage->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($sentMessage->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Datesent') ?></th>
            <td><?= h($sentMessage->datesent) ?></td>
        </tr>
    </table>
</div>
