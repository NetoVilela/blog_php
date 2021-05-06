<h1>Posts do blog</h1>


<?php 
    echo $this->Html->link('Adicionar uma postagem', array('controller' => 'posts', 'action' => 'add' ));
?>


<table>

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
                <?php 
                    echo $this->Form->postLink('Deletar', array('action'=>'delete', $post['Post']['id']), array('confirm'=>'Você deseja excluir a postagem?'));
                ?>
             
             
             </td>
            
        </tr>

    
    <?php endforeach; ?> 


</table>