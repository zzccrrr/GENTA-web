<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudentQuiz Model
 *
 * @property \App\Model\Table\StudentsTable&\Cake\ORM\Association\BelongsTo $Students
 * @property \App\Model\Table\SubjectsTable&\Cake\ORM\Association\BelongsTo $Subjects
 *
 * @method \App\Model\Entity\StudentQuiz newEmptyEntity()
 * @method \App\Model\Entity\StudentQuiz newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\StudentQuiz[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StudentQuiz get($primaryKey, $options = [])
 * @method \App\Model\Entity\StudentQuiz findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\StudentQuiz patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StudentQuiz[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\StudentQuiz|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StudentQuiz saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StudentQuiz[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StudentQuiz[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\StudentQuiz[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\StudentQuiz[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StudentQuizTable extends Table
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

        $this->setTable('student_quiz');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Subjects', [
            'foreignKey' => 'subject_id',
            'joinType' => 'INNER',
        ]);

        $this->hasMany('StudentQuizQuestions', [
            'foreignKey' => 'student_quiz_id',
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
            ->integer('student_id')
            ->requirePresence('student_id', 'create')
            ->notEmptyString('student_id');

        $validator
            ->integer('subject_id')
            ->requirePresence('subject_id', 'create')
            ->notEmptyString('subject_id');

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
        $rules->add($rules->existsIn('student_id', 'Students'), ['errorField' => 'student_id']);
        $rules->add($rules->existsIn('subject_id', 'Subjects'), ['errorField' => 'subject_id']);

        return $rules;
    }
}
