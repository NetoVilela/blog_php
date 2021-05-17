<?php

class PostsController extends AppController{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function index(){  
        if(AuthComponent::user('username')){
            $conditions = array( "Post.id_user =" => AuthComponent::user('id')
        );
            $this->set('posts',$this->Post->find('all', array('conditions'=>$conditions)));

        }else{
            $this->set('posts',$this->Post->find('all'));
        } 
    }

    public function index_filter(){
        $search_content = $this->request->data['search_content'];   
        $status = $this->request->data['active'];
        echo"<pre>";
        print_r($this->request->data);
        echo"</pre>";
        $this->search = $search_content;
        $this->set('search', $search_content);

        if($status=='all'){
            $conditions = array(
                "OR" => array(
                "Post.title ILIKE" => '%'.$search_content.'%',
                "Post.body ILIKE" => '%'.$search_content.'%'
                ),
                "AND" => array("Post.id_user =" => AuthComponent::user('id'))
            );
            $this->set('posts',$this->Post->find('all', array('conditions'=>$conditions)));
        }else{
            echo "aaa";
            $conditions = array(
                "OR" => array(
                "Post.title ILIKE" => '%'.$search_content.'%',
                "Post.body ILIKE" => '%'.$search_content.'%'
                ),
                "AND" => array("Post.id_user =" => AuthComponent::user('id')),
                "AND" => array("Post.active =" => $status)
            );
            $this->set('posts',$this->Post->find('all', array('conditions'=>$conditions)));
        }
        $this->render(); //Renderiza a view cujo o mome é o mesmo da action  'index_filter'
    }

    public function view($id=null){
        $this->set('post',$this->Post->findById($id));
    }

    public function add(){
        if($this->request->is('post')){
            //print_r($this->request->data);
            if($this->Post->save($this->request->data)){
                $this->Flash->success("Post criado com sucesso!");
                $this->redirect(array('action'=>'index'));
            }
        }
    }

    public function edit($id = null){
        $this->Post->id = $id;
        if($this->request->is('get')){
            $this->request->data = $this->Post->findById($id);
        }else{
            if($this->Post->save($this->request->data)){
                $this->Flash->success('Postagem editada com sucesso!');
                $this->redirect(array('action'=>'index'));
            }
        }
    }

    public function delete($id){
        $this->request->data = $this->Post->findById($id);

        $this->request->data['Post']['active'] = 'false';
        if($this->Post->save($this->request->data)){
            $this->Flash->success('Postagem deletada com sucesso!');
            $this->redirect(array('action'=>'index'));
        }
   
    }

    public function inactive(){
        $conditions = array(
            "Post.active" => 'false'
        );
        $this->set('posts',$this->Post->find('all', array('conditions'=>$conditions)));
        
    }
}