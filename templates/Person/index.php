<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Person[]|\Cake\Collection\CollectionInterface $person
 */
?>
<div class="person index content">
    <?= $this->Form->create() ?>
    <fieldset>
        <?php
        echo $this->Form->control('search_string', ['div' => false, 'label' => false, 'placeholder' => 'search']);
        echo $this->Form->control('Search', ['class' => 'button float-right', 'type' => 'submit', 'div' => false])
        ?>
    </fieldset>
    <?= $this->Form->end() ?>
    <?= $this->Html->link(__('New Person'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Person') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Name') ?></th>
                    <th><?= $this->Paginator->sort('Birth') ?></th>
                    <th><?= $this->Paginator->sort('Adresse_id') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('Titel_id') ?></th>
                    <th><?= $this->Paginator->sort('Anrede_id') ?></th>
                    <th><?= $this->Paginator->sort('password') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($person as $person): ?>
                <tr>
                    <td><?= $this->Number->format($person->id) ?></td>
                    <td><?= h($person->Name) ?></td>
                    <td><?= h($person->Birth) ?></td>
                    <td><?= $person->has('adresse') ? $this->Html->link($person->adresse->id, ['controller' => 'Adresse', 'action' => 'view', $person->adresse->id]) : '' ?></td>
                    <td><?= h($person->email) ?></td>
                    <td><?= $person->has('titel') ? $this->Html->link($person->titel->Name, ['controller' => 'Titel', 'action' => 'view', $person->titel->id]) : '' ?></td>
                    <td><?= $person->has('anrede') ? $this->Html->link($person->anrede->Name, ['controller' => 'Anrede', 'action' => 'view', $person->anrede->id]) : '' ?></td>
                    <td><?= h($person->password) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $person->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $person->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $person->id], ['confirm' => __('Are you sure you want to delete # {0}?', $person->id)]) ?>
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
