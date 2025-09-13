<!-- USER PROFILE -->
<div class="row">
    <!-- GET ERROR MESSAGES -->
    <?php 
        $fieldErrors = $this->Field->errors($question, ['subject_id', 'description', 'choices', 'answer']);
    ?>

    <!-- QUESTION DATA -->
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Question <?= $question->id ? '#' . $question->id : '' ?></h4>

                <?= $this->Form->create(NULL) ?>
                    <div class="form-group">
                        <label for="subject_id">Subject</label>
                        <?= $this->Form->select('subject_id', $subjectOptions, ['class' => 'form-select ' . $fieldErrors['subject_id']['class'], 'id' => 'subject_id', 'value' => $question->subject_id, 'empty' => '--- Please Select ---', 'required' => 'required']) ?>
                        <div class="invalid-feedback">
                            <?= $fieldErrors['subject_id']['message'] ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <?= $this->Form->textarea('description', ['class' => 'form-control ' . $fieldErrors['description']['class'], 'id' => 'description', 'value' => $question->description, 'required' => 'required']) ?>
                        <div class="invalid-feedback">
                            <?= $fieldErrors['description']['message'] ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="choices">Choices (Comma Separated)</label>
                        <?= $this->Form->textarea('choices', ['class' => 'form-control ' . $fieldErrors['choices']['class'], 'id' => 'choices', 'value' => $question->choices_string, 'required' => 'required']) ?>
                        <div class="invalid-feedback">
                            <?= $fieldErrors['choices']['message'] ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="answer">Answer</label>
                        <?= $this->Form->text('answer', ['class' => 'form-control ' . $fieldErrors['answer']['class'], 'id' => 'answer', 'value' => $question->answer, 'required' => 'required']) ?>
                        <div class="invalid-feedback">
                            <?= $fieldErrors['answer']['message'] ?>
                        </div>
                    </div>

                    <?= $this->Form->button('Submit', ['class' => 'btn btn-gradient-primary', 'type' => 'submit']) ?>
                    <?php if ($question->id) { ?>
                        <?= $this->Form->button('<i class="mdi mdi-close"></i> Delete', ['class' => 'btn btn-danger deleteQuestionBtn', 'type' => 'button', 'data-link' => $this->Url->build(['controller' => 'Dashboard', 'action' => 'deleteQuestion', 'prefix' => 'Teacher', $this->Encrypt->hex($question->id)]), 'escapeTitle' => false]) ?>
                    <?php } ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<?= $this->element('modal/confirm_delete_question') ?>