<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fahrrad $fahrrad
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fahrrad->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fahrrad->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Fahrrad'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fahrrad form content">
            <?= $this->Form->create($fahrrad) ?>
            <fieldset>
                <legend><?= __('Edit Fahrrad') ?></legend>
                <?php
                    echo $this->Form->control('Name');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
