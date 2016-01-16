<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
            $this->set('search', $search);

            if(strcasecmp($search,"clase b") == 0){
                $query->where(['Types.class ='=>'B']);
            }else if(strcasecmp($search,"clase c") == 0){
                $query->where(['Types.class ='=>'C']);
            }else if(strcasecmp($search,"clase b y c") == 0 || strcasecmp($search, "b y c")== 0){
                $query->where(['AND' =>['Types.class ='=>'B','Types.class ='=>'C']]);
            }else{
                $query->where(['OR' => ['question LIKE'=> '%'.$search.'%', 'Categories.name LIKE' => '%'.$search.'%','Types.class LIKE'=> '%'.$search.'%',
                'Alternatives.alternative LIKE'=> '%'.$search.'%']]);    
            }            
        }
        $number = $query->count(); 
        $this->set('questions', $this->paginate($query));
        $this->set('number', $number);
        $this->set('_serialize', ['questions','number']);        
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
            $questionData = array();           
            $questionData['question'] = $this->request->data['question'];
            $questionData['image'] = $this->request->data['image']['name'];            
            $questionData['category_id'] = $this->request->data['category_id'];
            $auxData = $this->Questions->Categories->findById($this->request->data['category_id'])->first();
            if(isset($auxData)){
                $questionData['categories'] = array('name' => $auxData->name, 'special' => $auxData->special);    
            }         
            $questionData['alternatives'] = array();
            for($i = 0; $i < 3; $i++){
                $auxAlterntaive = 'alternative-'.($i+1);
                $auxCorrect = false;
                if($this->request->data['correct'] == $i){
                    $auxCorrect = true;
                }
                $questionData['alternatives'][$i] = array('alternative' => $this->request->data[$auxAlterntaive], 'correct'=>$auxCorrect);
            }
            if($this->request->data['classB'] == 1 && $this->request->data['classC'] == 0){
                $questionData['types'] = array('_ids' => [1]);
            }else if($this->request->data['classC'] == 1 && $this->request->data['classB'] == 0){
                $questionData['types'] = array('_ids' => [2]);                
            }else if($this->request->data['classC'] == 1 && $this->request->data['classB'] == 1){
                $questionData['types'] = array('_ids' => [1,2]);
            }
            $question = $this->Questions->patchEntity($question, $questionData);             
            if($this->Questions->save($question)){
                $this->Flash->success(__('La pregunta ha sido guardada'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('La pregunta no ha podido ser guardada, revise los campos e intente nuevamente'));
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
            'contain' => ['Types', 'Categories', 'Alternatives']
        ]);         
        if ($this->request->is(['patch', 'post', 'put'])) {             
            $questionData = array();           
            $questionData['question'] = $this->request->data['question'];
            $questionData['image'] = $this->request->data['image']['name'];            
            $questionData['category_id'] = $this->request->data['category_id'];
            $auxData = $this->Questions->Categories->findById($this->request->data['category_id'])->first();
            if(isset($auxData)){
                $questionData['categories'] = array('name' => $auxData->name, 'special' => $auxData->special);    
            }         
            
            $questionData['alternatives'] = array();
            for($i = 0; $i < 3; $i++){
                $auxAlterntaive = 'alternative-'.($i+1);
                $auxCorrect = false;
                if($this->request->data['correct']-1 == $i){
                    $auxCorrect = true;
                }
                $questionData['alternatives'][$i] = array('alternative' => $this->request->data[$auxAlterntaive], 'correct'=>$auxCorrect, 'id'=>$question->alternatives[$i]->id, 'question_id'=>$question->id);
            }
            
            if($this->request->data['classB'] == 1 && $this->request->data['classC'] == 0){
                $questionData['types'] = array('_ids' => [1]);
            }else if($this->request->data['classC'] == 1 && $this->request->data['classB'] == 0){
                $questionData['types'] = array('_ids' => [2]);                
            }else if($this->request->data['classC'] == 1 && $this->request->data['classB'] == 1){
                $questionData['types'] = array('_ids' => [1,2]);
            }
            
            $question = $this->Questions->patchEntity($question, $questionData);            
            if($this->Questions->save($question)){                                
                $this->Flash->success(__('La pregunta ha sido modificada'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('La pregunta no ha podido ser modificada, intente nuevamente'));
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
            $this->Flash->success(__('La pregunta ha sido eliminada.'));
        } else {
            $this->Flash->error(__('La pregunta no ha podido ser eliminada, intente nuevamente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * quantity method
     *
     * @return void
     */
    public function quantity(){
        $query = $this->Questions->find()->contain(['Types']);        
        $query->matching('Types')->distinct('questions.id');
        $totalNumber = $query->count(); 

        //cat 1 - class B
        $query = $this->Questions->find()->contain(['Types']);        
        $query->matching('Types')->distinct('questions.id');
        $query->where(["AND"=> ["category_id ="=> 1, 'Types.class =' => 'B']]);
        $number1B= $query->count();

        //cat 2 - class B
        $query = $this->Questions->find()->contain(['Types']);        
        $query->matching('Types')->distinct('questions.id');
        $query->where(["AND"=> ["category_id ="=> 2, 'Types.class =' => 'B']]);
        $number2B= $query->count();

        //cat 3 - class B
        $query = $this->Questions->find()->contain(['Types']);        
        $query->matching('Types')->distinct('questions.id');
        $query->where(["AND"=> ["category_id ="=> 3, 'Types.class =' => 'B']]);
        $number3B= $query->count();

        //cat 4 - class B
        $query = $this->Questions->find()->contain(['Types']);        
        $query->matching('Types')->distinct('questions.id');
        $query->where(["AND"=> ["category_id ="=> 4, 'Types.class =' => 'B']]);
        $number4B= $query->count();

        //cat 1 - class C
        $query = $this->Questions->find()->contain(['Types']);        
        $query->matching('Types')->distinct('questions.id');
        $query->where(["AND"=> ["category_id ="=> 1, 'Types.class =' => 'C']]);
        $number1C= $query->count();        
        //cat 2 - class C
        $query = $this->Questions->find()->contain(['Types']);        
        $query->matching('Types')->distinct('questions.id');
        $query->where(["AND"=> ["category_id ="=> 2, 'Types.class =' => 'C']]);
        $number2C= $query->count();
        //cat 3 - class C
        $query = $this->Questions->find()->contain(['Types']);        
        $query->matching('Types')->distinct('questions.id');
        $query->where(["AND"=> ["category_id ="=> 3, 'Types.class =' => 'C']]);
        $number3C= $query->count();
        //cat 4 - class C
        $query = $this->Questions->find()->contain(['Types']);        
        $query->matching('Types')->distinct('questions.id');
        $query->where(["AND"=> ["category_id ="=> 4, 'Types.class =' => 'C']]);
        $number4C= $query->count();
        

        $this->set('totalNumber', $totalNumber);
        $this->set('number1B', $number1B);
        $this->set('number2B', $number2B);
        $this->set('number3B', $number3B);
        $this->set('number4B', $number4B);
        $this->set('number1C', $number1C);
        $this->set('number2C', $number2C);
        $this->set('number3C', $number3C);
        $this->set('number4C', $number4C);
        $this->set('_serialize', ['totalNumber', 'number1B', 'number2B', 'number3B', 'number4B',
        'number1C','number2C','number3C','number4C']);
    }
}

