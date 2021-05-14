    <div class="bg-primary">  
        <h1 class="text-center text-light">Posts do blog</h1>
    </div>
        
        <div class="actions-posts">
        
            <a href="/posts/add" class="btn btn-success"> Adicionar uma postagem </a>
            <form class="form-inline  my-lg-0 justify-content-center" method="post" action="/posts/index_filter" >
                        <input class="form-control " type="search" placeholder="Buscar" name="search_content" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>       
        </div>

    <table class="table table-striped table-user">

        <tr>
            <th>Id</th>
            <th>Título</th>     
            <th>Data de criação</th>
            <th>Ações</th>
        </tr>

    
        <?php   foreach($posts as $post): ?>
        
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
                <td>
                    
                    <a href="/posts/edit/<?php  echo $post['Post']['id'] ?>">
                        <i class="fas fa-edit text-success"></i>
                    </a>

                    <a href="/posts/delete/<?php echo $post['Post']['id']?>">
                        <i class="fas fa-trash-alt text-danger"></i>
                    </a>      
                </td> 
            </tr>
            

        <?php  endforeach; ?>  
    </table>
