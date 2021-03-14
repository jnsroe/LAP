<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Adresse[]|\Cake\Collection\CollectionInterface $adresse
 */
?>
<div class="adresse index content">
    <?= $this->Html->link(__('New Adresse'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Adresse') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Straße') ?></th>
                    <th><?= $this->Paginator->sort('Hausnummer') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($adresse as $adresse): ?>
                <tr>
                    <td><?= $this->Number->format($adresse->id) ?></td>
                    <td><?= h($adresse->Straße) ?></td>
                    <td><?= $this->Number->format($adresse->Hausnummer) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $adresse->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adresse->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adresse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adresse->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
