<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person $person
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Person'), ['action' => 'edit', $person->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Person'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Person'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="person view content">
            <h3><?= h($person->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($person->Name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adresse') ?></th>
                    <td><?= $person->has('adresse') ? $this->Html->link($person->adresse->id, ['controller' => 'Adresse', 'action' => 'view', $person->adresse->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($person->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Titel') ?></th>
                    <td><?= $person->has('titel') ? $this->Html->link($person->titel->id, ['controller' => 'Titel', 'action' => 'view', $person->titel->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Anrede') ?></th>
                    <td><?= $person->has('anrede') ? $this->Html->link($person->anrede->id, ['controller' => 'Anrede', 'action' => 'view', $person->anrede->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($person->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($person->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Birth') ?></th>
                    <td><?= h($person->Birth) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
