<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Anrede $anrede
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Anrede'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="anrede form content">
            <?= $this->Form->create($anrede) ?>
            <fieldset>
                <legend><?= __('Add Anrede') ?></legend>
                <?php
                    echo $this->Form->control('Name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
