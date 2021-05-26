<?php

class PostsController extends AppController{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function index(){

        if(AuthComponent::user('username')){ //Usuário logado

            if(AuthComponent::user('role')=='admin'){ //Usuário admin
                $conditions = array(
                 "Post.active =" => 'true'
                );
            }else{                                  //Usuário author
                $conditions = array(
                "AND" => array("Post.id_user =" => AuthComponent::user('id'), "Post.active =" => 'true')
            );
            }
            $this->set('posts',$this->Post->find('all', array('conditions'=>$conditions)));

        }else{  //Usuário deslogado
            $this->set('posts',$this->Post->find('all'));
        }
    }

    public function index_filter(){
        $search_content = $this->request->data['search_content'];
        $status = $this->request->data['active'];
        $this->search = $search_content;
        $this->set('search', $search_content);
        $_SESSION['search_content'] = $search_content;

        if($status=='all'){                             //Pesquisou "todos"

            if(AuthComponent::user('role')=='admin'){ //Usuário admin
                $conditions = array(
                    "OR" => array(
                    "Post.title ILIKE" => '%'.$search_content.'%',
                    "Post.body ILIKE" => '%'.$search_content.'%'
                    )
                );
            }else{                                  //Usuário author
                $conditions = array(
                    "OR" => array(
                    "Post.title ILIKE" => '%'.$search_content.'%',
                    "Post.body ILIKE" => '%'.$search_content.'%'
                    ),
                    "AND" => array("Post.id_user =" => AuthComponent::user('id'))
                );
            }
            $this->set('posts',$this->Post->find('all', array('conditions'=>$conditions)));
        }else{                                      //Pesquisou "ativos" ou "inativos"

            if(AuthComponent::user('role')=='admin'){ //Usuário admin

                $conditions = array(
                    "OR" => array(
                    "Post.title ILIKE" => '%'.$search_content.'%',
                    "Post.body ILIKE" => '%'.$search_content.'%'
                    ),
                    "AND" => array("Post.active =" => $status)
                );
            }else{                                  //Usuário author
                $conditions = array(
                    "OR" => array(
                    "Post.title ILIKE" => '%'.$search_content.'%',
                    "Post.body ILIKE" => '%'.$search_content.'%'
                    ),
                    "AND" => array("Post.id_user =" => AuthComponent::user('id'), "Post.active =" => $status)
                );
            }
            $this->set('posts',$this->Post->find('all', array('conditions'=>$conditions)));
        }
        $this->render(); //Renderiza a view cujo o mome é o mesmo da action  'index_filter'
    }

    public function view($id=null){
        $this->set('post',$this->Post->findById($id));
    }

    public function add(){
    	if($this->request->is('post')) {
			if ($this->request->data['Post']['title'] == '') {   //Título vazio
				$this->Flash->error(__('Informe um título'));
			} elseif ($this->request->data['Post']['body'] == '') {    //Corpo vazio
				$this->Flash->error(__('Informe um conteúdo'));
			} else {
				if ($this->request->is('post')) {    //Verifica se é do tipo post
					if ($this->Post->save($this->request->data)) {    //Adiciona
						$this->Flash->success("Post criado com sucesso!");
						$this->redirect(array('action' => 'index'));
					}
				}
			}
		}


    }

    public function edit($id = null){
        $this->Post->id = $id;

        if($this->request->is('get')){
            $this->request->data = $this->Post->findById($id);
        }else{
        	if ($this->request->data['Post']['title'] == '') {   //Título vazio
				$this->Flash->error(__('Informe um título'));
			} elseif ($this->request->data['Post']['body'] == '') {    //Corpo vazio
				$this->Flash->error(__('Informe um conteúdo'));
			} else {
				if ($this->Post->save($this->request->data)) {
					$this->Flash->success('Postagem editada com sucesso!');
					$this->redirect(array('action' => 'index'));
				}
			}
        }
    }

    public function delete($id){
        if($this->Post->delete($id)){
            $this->Flash->success('Postagem deletada com sucesso!');
            $this->redirect(array('action'=>'index'));
        }
    }

    public function active($id){
        $this->request->data = $this->Post->findById($id);
        $this->request->data['Post']['active'] = 'true';

        if($this->Post->save($this->request->data)){
            $this->Flash->success('Postagem ativada com sucesso!');
            $this->redirect(array('action'=>'index'));
        }
    }

    public function inactive($id){
        $this->request->data = $this->Post->findById($id);
        $this->request->data['Post']['active'] = 'false';

        if($this->Post->save($this->request->data)){
            $this->Flash->success('Postagem desativada com sucesso!');
            $this->redirect(array('action'=>'index'));
        }
    }
}
