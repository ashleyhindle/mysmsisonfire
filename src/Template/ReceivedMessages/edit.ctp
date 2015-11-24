<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $receivedMessage->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $receivedMessage->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Received Messages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="receivedMessages form large-9 medium-8 columns content">
    <?= $this->Form->create($receivedMessage) ?>
    <fieldset>
        <legend><?= __('Edit Received Message') ?></legend>
        <?php
            echo $this->Form->input('phonenumber');
            echo $this->Form->input('message');
            echo $this->Form->input('status');
            echo $this->Form->input('datereceived');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
