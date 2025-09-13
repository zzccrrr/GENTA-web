// CUSTOM JS SCRIPTS
$(document).ready(function() {
    // DASHBOARD - INDEX
    $(".defaultDataTable").DataTable({
        responsive: true
    });

    // DASHBOARD - STUDENT
    $("#editRemarksBtn").on("click", function(e) {
        e.preventDefault();

        $("#editRemarksBtn").addClass('d-none');
        $("#submitRemarksBtn").removeClass('d-none');

        $("#remarks").prop("disabled", false);
    });

    // DASHBOARD - QUESTIONS
    $("body").on("click", ".deleteQuestionBtn", function(e) {
        e.preventDefault();

        $("#confirmDeleteQuestionBtn").prop("href", $(this).data('link'));

        $('#deleteQuestionModal').modal('show');
    });

    $("#closeDeleteQuestionBtn").on("click", function(e) {
        e.preventDefault();

        $('#deleteQuestionModal').modal('hide');
    });
});