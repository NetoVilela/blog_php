<?php
class UsersController extends AppController{

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function login(){
		 if($this->Auth->login()){
            $this->redirect('/posts/index');
        }else{
		 	if($this->request->is('post')) {
				if ($this->request->data['User']['username'] == '') {
					$this->Flash->error(__('Informe um username'));
				} elseif ($this->request->data['User']['password'] == '') {
					$this->Flash->error(__('Informe uma senha'));
				} else {
						$this->Flash->error(__('Usuário ou senha inválido, tente novamente.'));
				}
			}
        }
    }

    public function logout(){
        $this->redirect($this->Auth->logout());
    }

    public function index(){
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id=null){
        if(!$this->User->exists($id)){
            throw new NotFoundException(__('Usuário inválido'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function add(){
//     	echo "<pre>";
//     	print_r($this->request->data['User']);
// 		echo "</pre>";
        if($this->request->is('post')){
            $this->User->create();
            if($this->User->save($this->request->data)){
                $this->Flash->success(__('O usuário foi salvo com sucesso!'));
                $this->redirect(Array( 'controller'=>'posts', 'action' => 'index' ));
            }else{
                $this->Flash->error(__('O usuário não foi salvo. Por favor, tente novamente.'));
            }
        }
    }

    public function edit($id = null){
        $this->User->id = $id;
        if(!$this->User->exists()){
            throw new NotFoundException(__('Usuário inválido'));
        }
        if($this->request->is('post') || $this->request->is('put')){
            if($this->User->save($this->request->data)){
                $this->Flash->success(__('O usuário foi alterado com sucesso!'));
                $this->redirect(array('action'=>'index'));
            }else{
                $this->Flash->error(__('O usuário não foi editado. Por favor, tente novamente.'));
            }
        }else{
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null){
        if(!$this->request->is('post')){
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if(!$this->User->exists()){
            throw new NotFoundException();
        }
        if($this->User->delete()){
            $this->Flash->success(__('Usuário deletado com sucesso'));
            $this->redirect(array('action'=>'index'));
        }
        //Só cai aqui se der erro
        $this->Flash->error(__('Erro ao deletar o usuário'));
        $this->redirect(array('action'=>'index'));
    }

}
