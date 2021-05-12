<?php

class PostsController extends AppController{
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    // public $name = 'Posts';

    public function index(){
        $this->set('posts',$this->Post->find('all'));
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