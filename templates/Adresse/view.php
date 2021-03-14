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
            <?= $this->Html->link(__('Edit Adresse'), ['action' => 'edit', $adresse->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Adresse'), ['action' => 'delete', $adresse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adresse->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Adresse'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Adresse'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="adresse view content">
            <h3><?= h($adresse->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Straße') ?></th>
                    <td><?= h($adresse->Straße) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($adresse->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hausnummer') ?></th>
                    <td><?= $this->Number->format($adresse->Hausnummer) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
