<?php

class PostsController extends AppController{
    public $helpers = array('Html', 'Form');
    public $name = 'Posts';

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

}