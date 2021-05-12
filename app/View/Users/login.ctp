<div class="">
    <?php echo $this->Flash->render('auth'); ?>

    <div class="container-fluid">
        <div class="form-box row form-box-align-center ">

            <div class="form-login col-sm-10 col-md-6">
                <?php echo $this->Form->create('User'); ?>
                    <fieldset>
                        <legend class="text-center"><?php echo __('Login'); ?></legend>
                        <?php 
                            echo $this->Form->input("username", array('class' => 'form-control'));
                            echo $this->Form->input('password', array('class' => 'form-control'));
                        ?>
                    </fieldset>
                <input type="submit" value="Entrar" class="btn btn-success btn-aux">
            </div>

        </div>
    </div>
</div>

