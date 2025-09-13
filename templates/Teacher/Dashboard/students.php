<!-- TABLE -->
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Students</h4>
                <table class="table defaultDataTable">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Grade-Section</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($students as $student) { ?>
                            <tr>
                                <td class="fw-bold"><?= $student->student_code ?></td>
                                <td><?= $student->name ?></td>
                                <td><?= $student->grade_section ?></td>
                                <td class="text-center">
                                    <?= $this->Html->link('<i class="mdi mdi-open-in-new"></i>', ['controller' => 'Dashboard', 'action' => 'student', 'prefix' => 'Teacher', $this->Encrypt->hex($student->id)], ['escape' => false, 'target' => '_blank']) ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>