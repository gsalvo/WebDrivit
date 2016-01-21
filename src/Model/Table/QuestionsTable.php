<?php
namespace App\Model\Table;

use App\Model\Entity\Question;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Questions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\HasMany $Alternatives
 * @property \Cake\ORM\Association\BelongsToMany $Types
 */
class QuestionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('questions');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Alternatives', [
            'foreignKey' => 'question_id',
            'dependent' => true
        ]);
        $this->belongsToMany('Types', [
            'foreignKey' => 'question_id',
            'targetForeignKey' => 'type_id',
            'joinTable' => 'questions_types'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('question')
            ->notEmpty('question','Debe ingresar una pregunta');

        $validator
            ->requirePresence('category_id')
            ->notEmpty('category_id','Debe seleccionar una categoría');        


        $validator
            ->allowEmpty('image');

        $validator
            ->allowEmpty('image-data');

        $validator
            ->requirePresence('types')
            ->add('types', 'validTypes', [
                'rule' => function ($data, $provider) { 
                    foreach ($data['_ids'] as $key => $type) {
                        if($type == 0){
                            return 'Debe seleccionar al menos una clase';
                        }
                    }                    
                    return true;                    
                }
            ]);                    

        $validator
            ->requirePresence('alternatives')
            ->add('alternatives', 'validAlternatives', [
                'rule' => function ($data, $provider) {                
                    foreach ($data as $key => $alternative) {
                        if(strcmp($alternative['alternative'], "" ) == 0){
                            return 'Debe ingresar las 3 alternativas';                            
                        }                       
                    }
                    return true;
                    
                }
            ]);

        $validator
            ->add('alternatives', 'validSelectedAlternative', [
                'rule' => function ($data, $provider) {
                    $alternativeSelected = 0 ;             
                    foreach ($data as $key => $alternative) {
                        if($alternative['correct'] == true){
                            $alternativeSelected ++;                             
                        }                       
                    }
                    if($alternativeSelected == 1){
                        return true;
                    }else{
                        return 'Debe seleccionar una alternativa como correcta';                            
                    }
                }
            ]);

        $validator
            ->add('image-data', 'validImageError', [
                'rule' => function ($data, $provider) {
                    switch ($data['error']) {
                        case 0:
                            return true;
                        case 1:
                            return 'El archivo excede el máximo permitido de 0,5 MB';
                        case 2:
                            return 'El archivo excede el máximo permitido de 0,5 MB';
                        case 3:
                            return 'No se ha podido subir el archivo, intente nuevamente';
                        case 4:
                            return 'No se ha podido subir el archivo, intente nuevamente';
                        case 6:
                            return 'Ha ocurrido un error interno, intente nuevamente';
                        case 7:
                            return 'Problemas con la escritura en el servidor, intente nuevamente';
                        case 8:
                            return 'Problemas con la extensión del archivo';                            
                        default:
                            return 'No se ha podido subir el archivo, intente nuevamente';
                    }
                }
            ]);

        $validator
            ->add('image-data', 'validImage', [
                'rule' => function ($data, $provider) {
                    if($data['type'] != ''){
                        if(strcmp($data['type'], 'image/jpeg') != 0 && $data['error'] != 1 && $data['error'] != 2){
                            return 'El formato de la imagen debe ser JPEG';
                        }else{
                            list($realWidth, $realHeight) = getimagesize($data['tmp_name']);
                            if($realWidth > 1000){
                                return 'El ancho de la imagen no puede superar los 1000 px';
                            }
                            if($realHeight > 600){
                                return 'El alto de la imagen no puede superar los 600 px';
                            }
                            return true;
                        }
                    }
                    return true;                    
                }
            ]);     
        return $validator;
    }

    

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        return $rules;
    }
}
