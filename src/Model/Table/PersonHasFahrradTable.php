<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PersonHasFahrrad Model
 *
 * @property \App\Model\Table\PersonTable&\Cake\ORM\Association\BelongsTo $Person
 * @property \App\Model\Table\FahrradTable&\Cake\ORM\Association\BelongsTo $Fahrrad
 * @property \App\Model\Table\ZahlungsmoeglichkeitenTable&\Cake\ORM\Association\BelongsTo $Zahlungsmoeglichkeiten
 *
 * @method \App\Model\Entity\PersonHasFahrrad newEmptyEntity()
 * @method \App\Model\Entity\PersonHasFahrrad newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PersonHasFahrrad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PersonHasFahrrad get($primaryKey, $options = [])
 * @method \App\Model\Entity\PersonHasFahrrad findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PersonHasFahrrad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PersonHasFahrrad[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PersonHasFahrrad|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PersonHasFahrrad saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PersonHasFahrrad[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PersonHasFahrrad[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PersonHasFahrrad[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PersonHasFahrrad[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PersonHasFahrradTable extends Table
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

        $this->setTable('person_has_fahrrad');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Person', [
            'foreignKey' => 'Person_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Fahrrad', [
            'foreignKey' => 'Fahrrad_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Zahlungsmoeglichkeiten', [
            'foreignKey' => 'Zahlungsmoeglichkeiten_id',
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
            ->integer('Start_Station')
            ->requirePresence('Start_Station', 'create')
            ->notEmptyString('Start_Station');

        $validator
            ->integer('End_Station')
            ->allowEmptyString('End_Station');

        $validator
            ->dateTime('StartZeit')
            ->requirePresence('StartZeit', 'create')
            ->notEmptyDateTime('StartZeit');

        $validator
            ->dateTime('EndZeit')
            ->requirePresence('EndZeit', 'create')
            ->notEmptyDateTime('EndZeit');

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
        $rules->add($rules->existsIn(['Person_id'], 'Person'), ['errorField' => 'Person_id']);
        $rules->add($rules->existsIn(['Fahrrad_id'], 'Fahrrad'), ['errorField' => 'Fahrrad_id']);
        $rules->add($rules->existsIn(['Zahlungsmoeglichkeiten_id'], 'Zahlungsmoeglichkeiten'), ['errorField' => 'Zahlungsmoeglichkeiten_id']);

        return $rules;
    }
}
