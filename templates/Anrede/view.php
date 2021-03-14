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
            <?= $this->Html->link(__('Edit Anrede'), ['action' => 'edit', $anrede->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Anrede'), ['action' => 'delete', $anrede->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anrede->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Anrede'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Anrede'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="anrede view content">
            <h3><?= h($anrede->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($anrede->Name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($anrede->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
