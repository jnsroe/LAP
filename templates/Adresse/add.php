<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adresse $adresse
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Adresse'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="adresse form content">
            <?= $this->Form->create($adresse) ?>
            <fieldset>
                <legend><?= __('Add Adresse') ?></legend>
                <?php
                    echo $this->Form->control('Straße');
                    echo $this->Form->control('Hausnummer');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
