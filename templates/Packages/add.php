<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Package $package
 * @var \Cake\Collection\CollectionInterface|string[] $sheets
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Liste forfait'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="packages form content">
            <?= $this->Form->create($package) ?>
            <fieldset>
                <legend><?= __('ajouter forfait') ?></legend>
                <?php
                    echo $this->Form->control('Prix');
                    echo $this->Form->control('Titre');
                    echo $this->Form->control('Description');
             

                ?>
            </fieldset>
            <?= $this->Form->button(__('soumettre')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
