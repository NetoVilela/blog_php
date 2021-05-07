<div class="bg-primary border">  
    <h1 class="text-center text-light ">Posts do blog</h1>
</div>



    <a href="/posts/add" class="btn btn-success mr-0"> Adicionar uma postagem </a>

    <?php 
       // echo $this->Html->link('Adicionar uma postagem', array('controller' => 'posts', 'action' => 'add' ));
    ?>




<table class="table table-striped">

    <tr>
        <th>Id</th>
        <th>Título</th>     
        <th>Data de criação</th>
        <th>Ações</th>
    </tr>


    <?php foreach($posts as $post): ?>
    
        <tr>
            <td> <?php echo $post['Post']['id'];  ?> </td>
            <td> <?php echo $this->Html->link($post['Post']['title'],array('controller' => 'posts','action' => 'view', $post['Post']['id'])); ?> </td>
            <td> <?php echo $post['Post']['created']; ?> </td>
            <td>
                <?php echo $this->Html->link('Editar', array('action'=>'edit', $post['Post']['id'])); ?> 
                <!-- <a href="/edit/<?php // echo $post['Post']['id'] ?>">
                    <i class="fas fa-edit"></i>
                </a> -->
                <?php 
                    echo $this->Form->postLink('Deletar', array('action'=>'delete', $post['Post']['id']), array('confirm'=>'Você deseja excluir a postagem?'));
                ?>
             
             
             </td>
            
        </tr>

    
    <?php endforeach; ?> 


</table>