<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Sent Messages'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sentMessages form large-9 medium-8 columns content">
    <?= $this->Form->create($sentMessage) ?>
    <fieldset>
        <legend><?= __('Send New Message') ?></legend>
        <?php
            echo $this->Form->input('phonenumber', [
                'placeholder' => 'Phone number, including country code. e.g. +447778882662',
                'label' => 'Phone number',
                'style' => 'width: 400px; display: block;'
            ]);
            echo $this->Form->textarea('message', ['label' => 'Message']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
