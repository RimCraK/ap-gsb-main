<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Package> $packages
 */
?>
<div class="packages index content">
    <?= $this->Html->link(__('Nouveau forfait'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Packages') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('prix') ?></th>
                    <th><?= $this->Paginator->sort('titre') ?></th>
                    <th class="actions"><?= __('Action') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($packages as $package): ?>
                <tr>
                    <td><?= $this->Number->format($package->id) ?></td>
                    <td><?= $this->Number->format($package->price) ?></td>
                    <td><?= h($package->title) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Vue'), ['action' => 'view', $package->id]) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $package->id]) ?>
                        <?= $this->Form->postLink(__('Suprimmer'), ['action' => 'delete', $package->id], ['confirm' => __('êtes vous sûr de supprimer # {0}?', $package->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Premier')) ?>
            <?= $this->Paginator->prev('< ' . __('précedemment')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
            <?= $this->Paginator->last(__('précedemment') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
