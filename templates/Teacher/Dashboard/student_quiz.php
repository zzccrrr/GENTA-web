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
                            <td><?= $this->Link->student($studentQuiz->student) ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Student Number</td>
                            <td><?= $studentQuiz->student->student_code ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Grade - Section</td>
                            <td><?= $studentQuiz->student->grade_section ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Subject</td>
                            <td><?= $studentQuiz->subject->name ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Date</td>
                            <td><?= $studentQuiz->created->format('Y/m/d') ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- RESULTS -->
    <div class="col-xl-7 col-lg-6 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Results</h4>
                <div class="row">
                    <?php foreach($studentQuiz->student_quiz_questions as $key => $question) { ?>
                        <div class="col-xl-2 col-lg-3 col-sm-2 col-xs-3">
                            <table class="table table-bordered mb-3">
                                <tbody>
                                    <tr>
                                        <td class="text-center"><p class="fw-bold m-0">Q<?= $key + 1 ?></p></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <p class="h3 text-<?= $question->is_correct ? 'success' : 'danger' ?> m-0"><i class="mdi mdi-<?= $question->is_correct ? 'check' : 'close' ?>-circle-outline"></i></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- QUESTIONS -->
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Questions</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="40%">Question</th>
                                <th width="15%" class="text-center">Correct Answer</th>
                                <th width="15%" class="text-center">Student's Answer</th>
                                <th width="15%" class="text-center">Evaluation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($studentQuiz->student_quiz_questions as $key => $question) { ?>
                                <tr class="table-<?= $question->is_correct ? 'success' : 'danger' ?>">
                                    <td class="text-wrap">Q<?= $key + 1 ?>. <?= $question->description ?></td>
                                    <td class="text-center"><?= $question->answer ?></td>
                                    <td class="text-center"><?= $question->student_answer ?></td>
                                    <td class="text-center">
                                        <p class="h3 text-<?= $question->is_correct ? 'success' : 'danger' ?> m-0"><i class="mdi mdi-<?= $question->is_correct ? 'check' : 'close' ?>-circle-outline"></i></p>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>