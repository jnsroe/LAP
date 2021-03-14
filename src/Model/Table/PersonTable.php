<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Person Model
 *
 * @property \App\Model\Table\AdresseTable&\Cake\ORM\Association\BelongsTo $Adresse
 * @property \App\Model\Table\TitelTable&\Cake\ORM\Association\BelongsTo $Titel
 * @property \App\Model\Table\AnredeTable&\Cake\ORM\Association\BelongsTo $Anrede
 *
 * @method \App\Model\Entity\Person newEmptyEntity()
 * @method \App\Model\Entity\Person newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Person[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Person get($primaryKey, $options = [])
 * @method \App\Model\Entity\Person findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Person patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Person[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Person|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PersonTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('person');
        $this->setDisplayField('Name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Adresse', [
            'foreignKey' => 'Adresse_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Titel', [
            'foreignKey' => 'Titel_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Anrede', [
            'foreignKey' => 'Anrede_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('Name')
            ->maxLength('Name', 45)
            ->requirePresence('Name', 'create')
            ->notEmptyString('Name');

        $validator
            ->date('Birth')
            ->requirePresence('Birth', 'create')
            ->notEmptyDate('Birth');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 45)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['Adresse_id'], 'Adresse'), ['errorField' => 'Adresse_id']);
        $rules->add($rules->existsIn(['Titel_id'], 'Titel'), ['errorField' => 'Titel_id']);
        $rules->add($rules->existsIn(['Anrede_id'], 'Anrede'), ['errorField' => 'Anrede_id']);

        return $rules;
    }
}
