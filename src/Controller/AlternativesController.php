<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Alternatives Controller
 *
 * @property \App\Model\Table\AlternativesTable $Alternatives
 */
class AlternativesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Questions']
        ];
        $this->set('alternatives', $this->paginate($this->Alternatives));
        $this->set('_serialize', ['alternatives']);
    }

    /**
     * View method
     *
     * @param string|null $id Alternative id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $alternative = $this->Alternatives->get($id, [
            'contain' => ['Questions']
        ]);
        $this->set('alternative', $alternative);
        $this->set('_serialize', ['alternative']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $alternative = $this->Alternatives->newEntity();
        if ($this->request->is('post')) {
            $alternative = $this->Alternatives->patchEntity($alternative, $this->request->data);
            if ($this->Alternatives->save($alternative)) {
                $this->Flash->success(__('The alternative has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The alternative could not be saved. Please, try again.'));
            }
        }
        $questions = $this->Alternatives->Questions->find('list', ['limit' => 200]);
        $this->set(compact('alternative', 'questions'));
        $this->set('_serialize', ['alternative']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Alternative id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $alternative = $this->Alternatives->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $alternative = $this->Alternatives->patchEntity($alternative, $this->request->data);
            if ($this->Alternatives->save($alternative)) {
                $this->Flash->success(__('The alternative has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The alternative could not be saved. Please, try again.'));
            }
        }
        $questions = $this->Alternatives->Questions->find('list', ['limit' => 200]);
        $this->set(compact('alternative', 'questions'));
        $this->set('_serialize', ['alternative']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Alternative id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $alternative = $this->Alternatives->get($id);
        if ($this->Alternatives->delete($alternative)) {
            $this->Flash->success(__('The alternative has been deleted.'));
        } else {
            $this->Flash->error(__('The alternative could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
