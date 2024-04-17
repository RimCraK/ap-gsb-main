<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sheet> $sheets
 * 
 * 
 *
 */


$identity = $this->getRequest()->getAttribute('identity');
$identity = $identity ?? [];
$iduser = $identity["id"]

?>
<div class="sheets index content">

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('N° Utilisateur') ?></th>
                    <th><?= $this->Paginator->sort('Etat Fiche') ?></th>
                    <th><?= $this->Paginator->sort('Date De Création') ?></th>
                    <th><?= $this->Paginator->sort('Date De Modification') ?></th>
                    <th class="display-flex"><?= $this->Paginator->sort('Validé/Pas Validé') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sheets as $sheet): ?>
                    <tr>
                        <td><?= $this->Number->format($sheet->id) ?></td>
                        
                        <td><?= $sheet->has('state') ? $this->Html->link($sheet->state->state, ['controller' => 'Sheets', 'action' => 'edit', $sheet->id]) : '' ?></td>

                        <td><?= h($sheet->created) ?></td>
                        <td><?= h($sheet->modified) ?></td>
                        <td class="display-flex"><?php if($sheet->sheetvalidated == 1){echo "<div class='tag success'>Validé</div>";}else{echo "<div class='tag error'>Pas Validé</div>";} ?></td>
                        <td class="actions">
                            <?php if($sheet->state->id > 1){echo $this->Html->link(__('Voir'), ['action' => 'comptableview', $sheet->id]);}elseif($sheet->state->id == 1){echo $this->Html->link(__('Voir'), ['action' => 'comptableview', $sheet->id]);}else{echo $this->Html->link(__('Edit'), ['action' => 'clientview', $sheet->id]);}  ?>
                            
                            <!-- $this->Form->postLink(__('Delete'), ['action' => 'delete', $sheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sheet->id)]) -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('premier')) ?>
            <?= $this->Paginator->prev('< ' . __('précedent')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('suivant') . ' >') ?>
            <?= $this->Paginator->last(__('précédent') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} sur {{pages}}')) ?></p>
    </div>
</div>