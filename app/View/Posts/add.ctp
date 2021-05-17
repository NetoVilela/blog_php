<h1 class="text-center">Formulário de cadastro de postagens</h1>

<div class="container">
    <div class="row row-center">
        <div class="form-box col-xs-12  col-md-9 ">
            <?php
                echo $this->Form->create('Post', array('class'=>'form-group form-box-add'));
                echo $this->Form->input('title', array('class'=>'form-control'));
                echo $this->Form->input('id_user', array('class'=>'form-control', 'value'=>AuthComponent::user('id'), 'type'=>'hidden'));
                echo $this->Form->input('body', array('rows'=>'3', 'class'=>'form-control'));
                
            ?>
            <input type="submit" value="Cadastrar postagem" class="btn btn-success btn-aux">
        </div>

    </div>

</div>

