<!-- TABLE -->
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Students' Assessments</h4>
                <table class="table defaultDataTable">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Grade-Section</th>
                            <th>Subject</th>
                            <th>Score</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($studentQuizzes as $studentQuiz) { ?>
                            <tr>
                                <td class="fw-bold"><?= $studentQuiz->student->student_code ?></td>
                                <td><?= $this->Link->student($studentQuiz->student) ?></td>
                                <td><?= $studentQuiz->student->grade_section ?></td>
                                <td><?= $studentQuiz->subject->name ?></td>
                                <td><?= $studentQuiz->score['overallScore'] ?></td>
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