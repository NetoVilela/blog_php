<h1 class="text-center">Edição de postagens</h1>
<div class="container">
    <div class="row row-center">
        <div class="form-box col-xs-12  col-md-9 ">
            <?php
                echo $this->Form->create('Post', array('class'=>'form-group form-box-add'));
                echo $this->Form->input('title', array('class'=>'form-control', 'required'=>'false'));
                echo $this->Form->input('body', array('rows'=>'3', 'class'=>'form-control', 'required'=>'false'));
                echo $this->Form->input('id',array('type'=>'hidden'));
            ?>
            <input type="submit" value="Editar postagem" class="btn btn-success btn-aux">
        </div>
    </div>
</div>

