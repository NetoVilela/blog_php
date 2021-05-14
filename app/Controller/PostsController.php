<?php

class PostsController extends AppController{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    // public $name = 'Posts';

    public function index(){
        $this->set('posts',$this->Post->find('all'));
        
    }

    public function index_filter(){
        $search_content = $this->request->data['search_content'];       

        $conditions = array("OR" => array(
            "Post.title ILIKE" => '%'.$search_content.'%',
            "Post.body ILIKE" => '%'.$search_content.'%'
        ));
        
        $this->set('posts',$this->Post->find('all', array('conditions'=>$conditions)));

    }

    public function filterPost(){
        $this->set('posts',$this->Post->findById(18));
        
    }

    public function view($id=null){
        $this->set('post',$this->Post->findById($id));
    }

    public function add(){
        if($this->request->is('post')){
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
        // if(!$this->request->is('post')){
        //     throw new MethodNotAllowedException();
        // }
        if($this->Post->delete($id)){{
            $this->Flash->success('Postagem deletada com sucesso!');
            $this->redirect(array('action'=>'index'));
        }

        }
    }
}