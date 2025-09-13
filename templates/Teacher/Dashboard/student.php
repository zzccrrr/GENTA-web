<!-- TABLE -->
<div class="row">
    <!-- STUDENT DETAILS -->
    <div class="col-xl-5 col-lg-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Student Details</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="fw-bold">Name</td>
                            <td><?= $student->name ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Student Number</td>
                            <td><?= $student->student_code ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Grade - Section</td>
                            <td><?= $student->grade_section ?></td>
                        </tr>
                    </tbody>
                </table>
                <p class="fw-bold my-3">Remarks:</p>
                <?= $this->Form->create(NULL) ?>
                    <?= $this->Form->textarea('remarks', ['class' => 'form-control', 'id' => 'remarks', 'value' => $student->remarks, 'disabled']) ?>

                    <div class="d-flex justify-content-end align-items-center mt-3">
                        <a href="https://pleased-sincerely-mongrel.ngrok-free.app/tailored_module.docx" class="btn btn-warning btn-fw me-3" target="_blank"><i class="mdi mdi-chart-scatter-plot-hexbin"></i> Tailored Module</a>
                        <a href="https://pleased-sincerely-mongrel.ngrok-free.app/analysis_result.docx" class="btn btn-success btn-fw me-3" target="_blank"><i class="mdi mdi-chart-scatter-plot-hexbin"></i> Analysis</a>
                        <?= $this->Form->button('<i class="mdi mdi-lead-pencil"></i> Edit', ['class' => 'btn btn-info btn-fw', 'id' => 'editRemarksBtn', 'type' => 'button', 'escapeTitle' => false]) ?>
                        <?= $this->Form->button('<i class="mdi mdi-send"></i> Submit', ['class' => 'btn btn-success btn-fw d-none', 'id' => 'submitRemarksBtn', 'type' => 'submit', 'escapeTitle' => false]) ?>
                    </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
    <!-- ASSESSMENTS -->
    <div class="col-xl-7 col-lg-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Student Quizzes</h4>
                <table class="table defaultDataTable">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Score</th>
                            <th>Created</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($student->student_quiz as $studentQuiz) { ?>
                            <tr>
                                <td><?= $studentQuiz->subject->name ?></td>
                                <td><?= $studentQuiz->score['overallScore'] ?></td>
                                <td><?= $studentQuiz->created->format('Y/m/d') ?></td>
                                <td class="text-center">
                                    <?= $this->Html->link('<i class="mdi mdi-open-in-new"></i>', ['controller' => 'Dashboard', 'action' => 'studentQuiz', 'prefix' => 'Teacher', $this->Encrypt->hex($studentQuiz->id)], ['escape' => false, 'target' => '_blank']) ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>