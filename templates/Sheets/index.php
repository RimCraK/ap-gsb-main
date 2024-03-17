<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sheet> $sheets
 */
?>
<div class="sheets index content">
    <?= $this->Html->link(__('Nouvelle Fiche'), ['action' => 'addadmin'], ['class' => 'button float-right']) ?>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('N° Utilisateur') ?></th>
                    <th><?= $this->Paginator->sort('Utilisateur ') ?></th>
                    <th><?= $this->Paginator->sort('Etat ') ?></th>
                    <th><?= $this->Paginator->sort('Validé/pas Validé') ?></th>
                    <th><?= $this->Paginator->sort('Date De Création') ?></th>
                    <th><?= $this->Paginator->sort('Date De Modifiaction') ?></th>
                   
                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sheets as $sheet): ?>
                <tr>
                    <td><?= $this->Number->format($sheet->id) ?></td>
                    <td><?= $sheet->has('user') ? $this->Html->link($sheet->user->username, ['controller' => 'Users', 'action' => 'view', $sheet->user->id]) : '' ?></td>
                    <td><?= $sheet->has('state') ? $this->Html->link($sheet->state->state, ['controller' => 'States', 'action' => 'view', $sheet->state->id]) : '' ?></td>
                    <td><?= h($sheet->sheetvalidated) ?></td>
                    <td><?= h($sheet->created) ?></td>
                    <td><?= h($sheet->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Voir'), ['action' => 'viewadmin', $sheet->id]) ?>
                        <?= $this->Html->link(__('Editer'), ['action' => 'edit', $sheet->id]) ?>
                        <?= $this->Form->postLink(__('Supprimer'), ['action' => 'delete', $sheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sheet->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('suivant')) ?>
            <?= $this->Paginator->prev('< ' . __('précédent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
            <?= $this->Paginator->last(__('précédent') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}')) ?></p>
    </div>
</div>
