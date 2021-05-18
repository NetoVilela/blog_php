<?php if(AuthComponent::user('username')): ?>
    <div class="bg-primary">  
        <h1 class="text-center text-light">Posts do blog</h1>
    </div>
        
        <div class="actions-posts">
        
            <a href="/posts/add" class="btn btn-success"> Adicionar uma postagem </a>

            <form class="form-inline  my-lg-0 justify-content-center" method="post" action="/posts/index_filter" >
                <input class="form-control " type="search" placeholder="Buscar" name="search_content" aria-label="Search" value='<?php echo $_SESSION['search_content']; ?>'>
                <select name="active" id="active">
                    <option value="true">Ativos</option>
                    <option value="false">Inativos</option>
                    <option value="all">Todos</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>      

        </div>
    Registros filtrados: <?php echo sizeof($posts); ?>
    <table class="table table-striped table-user">

        <tr>
            <th>Id</th>
            <th>Título</th>     
            <th>Data de criação</th>
            <th>Ações</th>
        </tr>

        <?php foreach($posts as $post): ?>
        
            <tr>
                <td> <?php echo $post['Post']['id'];  ?> </td>
                <td > 
                        <a data-toggle="collapse" href="#bodyCollapse<?php echo $post['Post']['id']; ?>" role="button" aria-expanded="false" aria-controls="bodyCollapse">
                            <?php echo $post['Post']['title']; ?>
                        </a>

                        <div id="bodyCollapse<?php echo $post['Post']['id']; ?>" class="collapse">
                            <div class="text-justify">
                                <p><?php echo $post['Post']['body']; ?></p>
                            </div>                
                        </div>

                </td>
                <td> <?php echo $post['Post']['created']; ?> </td>
                <td class="icon-box">
                    
                <a href="/posts/edit/<?php  echo $post['Post']['id'] ?>">
                    <i class="fas fa-edit "></i>
                </a>

            
                <a href="/posts/delete/<?php echo $post['Post']['id']?>">
                    <i class="fas fa-trash-alt text-danger"></i>
                </a>      

            <!-- Início do efeito do ícone active -->
                <?php if($post['Post']['active']) {?>
                    <a onmouseover="inverteIconeActive(1, <?php echo $post['Post']['id'] ?>)"
                        onmouseout="inverteIconeActive(2, <?php echo $post['Post']['id'] ?>)"
                        href="/posts/inactive/<?php  echo $post['Post']['id'] ?>">
                        <i id="icon-active<?= $post['Post']['id'] ?>" class="fas fa-eye text-success"></i>
                    </a>
                <?php }else{ ?>
                    <a
                    href="/posts/active/<?php  echo $post['Post']['id'] ?>">
                        <i class="fas fa-eye text-muted "></i>
                    </a>
                <?php } ?>
            <!-- Fim do efeito do ícone active -->

                </td> 
            </tr>

        <?php endforeach; ?> 
<?php endif; ?>

<?php if(!AuthComponent::user('username')): ?>

    <div class="container cards">
        <?php foreach($posts as $post): ?>
                <div class="card  col-sm-10  col-md-3" onclick="redirectPost(<?php echo $post['Post']['id'];  ?>)" >
                   <div>
                    <div class="card-head text-center">
                            <h2> <?php echo $post['Post']['title']; ?></h2>
                        </div>
                        <div class="card-body">
                            <p> <?php echo $post['Post']['body']; ?> </p>
                        </div>
                   </div>
                </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>

</table>

<script>

function redirectPost(id){
    window.location.replace("/posts/view/"+id);
}

function inverteIconeActive(indice, id){
    let iconActive = document.getElementById("icon-active"+id);
    if(indice==1){
        iconActive.setAttribute('class','fas fa-eye text-muted');
    }
    if(indice==2){
        iconActive.setAttribute('class','fas fa-eye text-success');
    }
    if(indice==3){
        iconActive.setAttribute('class','fas fa-eye text-success');
    }
    if(indice==4){
        iconActive.setAttribute('class','fas fa-eye text-muted');
    }
    
}

</script>