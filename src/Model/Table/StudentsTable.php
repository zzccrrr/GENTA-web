<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @property \App\Model\Table\StudentQuizTable&\Cake\ORM\Association\HasMany $StudentQuiz
 *
 * @method \App\Model\Entity\Student newEmptyEntity()
 * @method \App\Model\Entity\Student newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Student get($primaryKey, $options = [])
 * @method \App\Model\Entity\Student findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Student[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Student|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Student[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StudentsTable extends Table
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

        $this->setTable('students');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('StudentQuiz', [
            'foreignKey' => 'student_id',
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
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('student_code')
            ->maxLength('student_code', 255)
            ->requirePresence('student_code', 'create')
            ->notEmptyString('student_code');

        $validator
            ->integer('grade')
            ->requirePresence('grade', 'create')
            ->notEmptyString('grade');

        $validator
            ->scalar('section')
            ->maxLength('section', 255)
            ->requirePresence('section', 'create')
            ->notEmptyString('section');

        $validator
            ->scalar('remarks')
            ->allowEmptyString('remarks');

        return $validator;
    }
}
