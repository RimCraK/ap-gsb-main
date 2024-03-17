<?php
/**
 
*@var \App\View\AppView $this
*@var \App\Model\Entity\Sheet $sheet
*@var string[]|\Cake\Collection\CollectionInterface $users
*@var string[]|\Cake\Collection\CollectionInterface $states
*/
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= ('Actions') ?></h4>

            <?= $this->Html->link(('Liste Fiches'), ['action' => 'comptablelist'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sheets form content">
            <?= $this->Form->create($sheet) ?>
            <fieldset>
                <legend><?= ('Editeur de Fiches') ?></legend>
                <?php
                    echo $this->Form->hidden('Utilisateur', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('Etat', ['options' => $states]);
                    echo $this->Form->control('sheetvalidated');
                ?>
            </fieldset>
            <?= $this->Form->button(('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>