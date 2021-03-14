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
            <?= $this->Html->link(__('Edit Fahrrad'), ['action' => 'edit', $fahrrad->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Fahrrad'), ['action' => 'delete', $fahrrad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fahrrad->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Fahrrad'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Fahrrad'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="fahrrad view content">
            <h3><?= h($fahrrad->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($fahrrad->Name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fahrrad->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
