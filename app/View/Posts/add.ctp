<h1>Formulário de cadastro de postagens</h1>
<?php
echo $this->Form->create('Post', array('class'=>'form-group'));
echo $this->Form->input('Título', array('class'=>'form-control bg-alert'));
echo $this->Form->input('Texto', array('rows'=>'3', 'class'=>'form-control'));
echo $this->Form->end("Cadastrar postagem");