<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QuestionsTypes Controller
 *
 * @property \App\Model\Table\QuestionsTypesTable $QuestionsTypes
 */
class QuestionsTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Questions', 'Types']
        ];
        $this->set('questionsTypes', $this->paginate($this->QuestionsTypes));
        $this->set('_serialize', ['questionsTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Questions Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $questionsType = $this->QuestionsTypes->get($id, [
            'contain' => ['Questions', 'Types']
        ]);
        $this->set('questionsType', $questionsType);
        $this->set('_serialize', ['questionsType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $questionsType = $this->QuestionsTypes->newEntity();
        if ($this->request->is('post')) {
            $questionsType = $this->QuestionsTypes->patchEntity($questionsType, $this->request->data);
            if ($this->QuestionsTypes->save($questionsType)) {
                $this->Flash->success(__('The questions type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The questions type could not be saved. Please, try again.'));
            }
        }
        $questions = $this->QuestionsTypes->Questions->find('list', ['limit' => 200]);
        $types = $this->QuestionsTypes->Types->find('list', ['limit' => 200]);
        $this->set(compact('questionsType', 'questions', 'types'));
        $this->set('_serialize', ['questionsType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Questions Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $questionsType = $this->QuestionsTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $questionsType = $this->QuestionsTypes->patchEntity($questionsType, $this->request->data);
            if ($this->QuestionsTypes->save($questionsType)) {
                $this->Flash->success(__('The questions type has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The questions type could not be saved. Please, try again.'));
            }
        }
        $questions = $this->QuestionsTypes->Questions->find('list', ['limit' => 200]);
        $types = $this->QuestionsTypes->Types->find('list', ['limit' => 200]);
        $this->set(compact('questionsType', 'questions', 'types'));
        $this->set('_serialize', ['questionsType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Questions Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $questionsType = $this->QuestionsTypes->get($id);
        if ($this->QuestionsTypes->delete($questionsType)) {
            $this->Flash->success(__('The questions type has been deleted.'));
        } else {
            $this->Flash->error(__('The questions type could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
