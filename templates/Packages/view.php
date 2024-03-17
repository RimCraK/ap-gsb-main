<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Package $package
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Editer forfait'), ['action' => 'edit', $package->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Supprimer forfait'), ['action' => 'delete', $package->id], ['confirm' => __('Are you sure you want to delete # {0}?', $package->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Lister forfait'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nouveau forfait'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="packages view content">
            <h3><?= h($package->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Titre') ?></th>
                    <td><?= h($package->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($package->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prix') ?></th>
                    <td><?= $this->Number->format($package->price) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($package->body)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Fiches relié') ?></h4>
                <?php if (!empty($package->sheets)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Id Utilisateur ') ?></th>
                            <th><?= __('Etat Id') ?></th>
                            <th><?= __('Fiches validé') ?></th>
                            <th><?= __('Crée') ?></th>
                            <th><?= __('Modifié') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($package->sheets as $sheets) : ?>
                        <tr>
                            <td><?= h($sheets->id) ?></td>
                            <td><?= h($sheets->user_id) ?></td>
                            <td><?= h($sheets->state_id) ?></td>
                            <td><?= h($sheets->sheetvalidated) ?></td>
                            <td><?= h($sheets->created) ?></td>
                            <td><?= h($sheets->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Voir'), ['controller' => 'Sheets', 'action' => 'view', $sheets->id]) ?>
                                <?= $this->Html->link(__('Editer'), ['controller' => 'Sheets', 'action' => 'edit', $sheets->id]) ?>
                                <?= $this->Form->postLink(__('Supprimer'), ['controller' => 'Sheets', 'action' => 'delete', $sheets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sheets->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
