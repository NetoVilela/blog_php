<h1>Edição de postagens</h1>

<?php 
    echo $this->Form->create('Post', array('action'=>'edit', 'class'=>'form-group'));
    echo $this->Form->input('title', array('class'=>'form-control'));
    echo $this->Form->input('body', array('rows'=>'3'));
    echo $this->Form->input('id',array('type'=>'hidden'));
    echo $this->Form->end("Editar postagem");
?>