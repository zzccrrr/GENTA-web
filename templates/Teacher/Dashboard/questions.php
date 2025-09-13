<!-- TABLE -->
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <h4 class="card-title">Quiz</h4>
                    </div>

                    <div class="d-flex justify-content-end col-sm-8">
                        <?= $this->Html->link('<i class="mdi mdi-plus"></i> Add Question', ['controller' => 'Dashboard', 'action' => 'createEditQuestion', 'prefix' => 'Teacher'], ['escape' => false, 'class' => 'btn btn-success btn-fw mb-3']) ?>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-sm-8">
                        <?= $this->Form->create(NULL, ['url' => ['controller' => 'Dashboard', 'action' => 'questions', 'prefix' => 'Teacher'], 'method' => 'get']) ?>
                            <?= $this->Form->select('questionsSubject', $subjectOptions, ['class' => 'form-select mb-3', 'id' => 'questionsSubject', 'onchange' => 'this.form.submit()', 'value' => $quesSubjectSel]) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
                <table class="table defaultDataTable">
                    <thead>
                        <tr>
                            <th width="15%">Subject</th>
                            <th width="30%">Question</th>
                            <th width="20%">Choices</th>
                            <th width="15%">Answer</th>
                            <th width="10%">Score</th>
                            <th width="10%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($questions as $question) { ?>
                            <tr>
                                <td class="fw-bold"><?= $question->subject->name ?></td>
                                <td class="text-wrap"><?= $question->description ?></td>
                                <td class="text-center"><?= $question->choices_string ?></td>
                                <td class="text-center"><?= $question->answer ?></td>
                                <td class="text-center"><?= $question->score ?></td>
                                <td class="text-center">
                                    <?= $this->Html->link('<i class="mdi mdi-lead-pencil mx-2"></i>', ['controller' => 'Dashboard', 'action' => 'createEditQuestion', 'prefix' => 'Teacher', $this->Encrypt->hex($question->id)], ['escape' => false]) ?>
                                    <a href="#" class="deleteQuestionBtn" data-link="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'deleteQuestion', 'prefix' => 'Teacher', $this->Encrypt->hex($question->id)]) ?>"><i class="mdi mdi-close mx-2"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->element('modal/confirm_delete_question') ?>