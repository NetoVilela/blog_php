<h1 class="text-center">Cadastro de usuários</h1>
<div>
    <?php echo $this->Form->create('User', array('class'=>'form-group form-box-add')); ?>
    <fieldset>
        <?php
            echo $this->Form->input('username', array('class'=>'form-control'));
            echo $this->Form->input('name', array('class'=>'form-control'));
            echo $this->Form->input('password', array('class'=>'form-control'));


//			  //Usada somente para inserir o user admin
// 			echo $this->Form->input('role',array(
// 				'options' => array('admin' => 'Admin', 'author'=>'Author')
//             )
//            );
			echo $this->Form->input('role',array(
				'options' => array('author'=>'Author')
			)
		   );



        ?>
    </fieldset>
    <input type="submit" value="Cadastrar usuário" class="btn btn-success">
</div>
