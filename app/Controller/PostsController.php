<?php

class PostsController extends AppController{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function index(){  
        if(AuthComponent::user('role')=='author'){
            $conditions = array( "Post.id_user =" => AuthComponent::user('id'));        
            $this->set('posts',$this->Post->find('all', array('conditions'=>$conditions)));
        }else{
            $this->set('posts',$this->Post->find('all'));
        } 
    }

    public function index_filter(){
        $search_content = $this->request->data['search_content'];       
        $this->search = $search_content;
        $this->set('search', $search_content);

        if(AuthComponent::user('role')=='author'){
            $conditions = array(
                "OR" => array(
                "Post.title ILIKE" => '%'.$search_content.'%',
                "Post.body ILIKE" => '%'.$search_content.'%'
                ),
                "AND" => array("Post.id_user =" => AuthComponent::user('id'))
            );
            $this->set('posts',$this->Post->find('all', array('conditions'=>$conditions)));
        }else{
            $conditions = array(
                "OR" => array(
                "Post.title ILIKE" => '%'.$search_content.'%',
                "Post.body ILIKE" => '%'.$search_content.'%'
                )
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
        if($this->Post->delete($id)){
            $this->Flash->success('Postagem deletada com sucesso!');
            $this->redirect(array('action'=>'index'));
        }
    }
}