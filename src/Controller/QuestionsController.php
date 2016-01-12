<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 */
class QuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = ['limit' => 7];        
        $query = $this->Questions->find()->contain(['Categories','Alternatives','Types']);
        $query->matching('Alternatives')->distinct('questions.id');
        $query->matching('Types')->distinct('questions.id');                        
        if(isset($this->request->query['search'])){ 
            $search = $this->request->query['search'];           
            $query->where(['OR' => ['question LIKE'=> '%'.$search.'%', 'Categories.name LIKE' => '%'.$search.'%','Types.class LIKE'=> '%'.$search.'%',
                'Alternatives.alternative LIKE'=> '%'.$search.'%']]);
        }
        $number = $query->count(); 

        $this->set('questions', $this->paginate($query));
        $this->set('number', $number);
        $this->set('_serialize', ['questions','number']);


        //$this->paginate = [
        //            'contain' => ['Categories', 'alternatives']
        //];
        
        //$this->set('questions', $this->paginate($this->Questions));
        //$this->set('_serialize', ['questions']);
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['Categories', 'Types', 'Alternatives']
        ]);
        $this->set('question', $question);
        $this->set('_serialize', ['question']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Questions->Categories->find('list', ['limit' => 200]);
        $types = $this->Questions->Types->find('list', ['limit' => 200]);
        $this->set(compact('question', 'categories', 'types'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['Types']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        }
        $categories = $this->Questions->Categories->find('list', ['limit' => 200]);
        $types = $this->Questions->Types->find('list', ['limit' => 200]);
        $this->set(compact('question', 'categories', 'types'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
