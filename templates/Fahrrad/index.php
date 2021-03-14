<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Fahrrad[]|\Cake\Collection\CollectionInterface $fahrrad
 */
?>
<div class="fahrrad index content">
    <?= $this->Html->link(__('New Fahrrad'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Fahrrad') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fahrrad as $fahrrad): ?>
                <tr>
                    <td><?= $this->Number->format($fahrrad->id) ?></td>
                    <td><?= h($fahrrad->Name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $fahrrad->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fahrrad->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fahrrad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fahrrad->id)]) ?>
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
