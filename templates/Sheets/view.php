<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sheet $sheet
 * @var iterable<\App\Model\Entity\Outpackage> $outpackages
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sheet'), ['action' => 'edit', $sheet->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sheet'), ['action' => 'delete', $sheet->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sheet->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sheets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sheet'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sheets view content">
            <h3><?= h($sheet->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $sheet->has('user') ? $this->Html->link($sheet->user->username, ['controller' => 'Users', 'action' => 'view', $sheet->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= $sheet->has('state') ? $this->Html->link($sheet->state->state, ['controller' => 'States', 'action' => 'view', $sheet->state->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sheet->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($sheet->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($sheet->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sheetvalidated') ?></th>
                    <td><?= $sheet->sheetvalidated ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th></th>
                    <td></td>
                </tr>
            </table>
            



                <h4><?= __('Related Outpackages') ?></h4>
                
                <?= $this->Html->link(__('New Outpackage'), ['action' => 'add'], ['class' => 'button float-right']) ?>
                
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Body') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sheet->outpackages as $outpackages) : ?>
                        <tr>
                            <td><?= h($outpackages->id) ?></td>
                            <td><?= h($outpackages->date) ?></td>
                            <td><?= h($outpackages->price) ?></td>
                            <td><?= h($outpackages->title) ?></td>
                            <td><?= h($outpackages->body) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'OutPackages', 'action' => 'view', $outpackages->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'OutPackages', 'action' => 'edit', $outpackages->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OutPackages', 'action' => 'delete', $outpackages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $outpackages->id)]) ?>
                            </td>
                        </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        
                
                <h4><?= __('Related Packages') ?></h4>
                <?= $this->Html->link(__('New Package'), ['action' => 'add'], ['class' => 'button float-right']) ?>
                <?php if (!empty($sheet->packages)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Price') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Body') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($sheet->packages as $packages) : ?>
                        <tr>
                            <td><?= h($packages->id) ?></td>
                            <td><?= h($packages->price) ?></td>
                            <td><?= h($packages->title) ?></td>
                            <td><?= h($packages->body) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Packages', 'action' => 'view', $packages->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Packages', 'action' => 'edit', $packages->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Packages', 'action' => 'delete', $packages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $packages->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <?php $totaloutpackages = ($outpackages->price) + ($outpackages->price);
            $totalpackages = ($packages->price) + ($packages->price);
            $total = ($totalpackages) + ($totaloutpackages);
                      echo ($total); ?>
        </div>
    </div>

</div>
