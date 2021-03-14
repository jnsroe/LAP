<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PersonHasFahrrad $personHasFahrrad
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Person Has Fahrrad'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="personHasFahrrad form content">
            <?= $this->Form->create($personHasFahrrad) ?>
            <fieldset>
                <legend><?= __('Add Person Has Fahrrad') ?></legend>
                <?php
                    echo $this->Form->control('Person_id', ['options' => $person]);
                    echo $this->Form->control('Fahrrad_id', ['options' => $fahrrad]);
                    echo $this->Form->control('Zahlungsmoeglichkeiten_id', ['options' => $zahlungsmoeglichkeiten]);
                    echo $this->Form->control('Start_Station');
                    echo $this->Form->control('End_Station');
                    echo $this->Form->control('StartZeit');
                    echo $this->Form->control('EndZeit');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
