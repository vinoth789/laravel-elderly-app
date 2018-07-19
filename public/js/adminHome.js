function viewStudentDetails(userID) {
    var token, url;
    token = '{{Session::token()}}';
    url = '{{route(student.details)}}';

    $.ajax({
        url: url,
        data: {
            _token: token,
            user_id: userID
        },
        method: 'POST',
        datatype: 'json',
        success: function (resp) {
            for (var i in resp) {
                var studentId = resp[i].id;
                var studentEmail = resp[i].email;
                var studentName = resp[i].name;
            }
            $('#studentId').val('');
            $('#studentEmail').val('');
            $('#studentName').val('');
            $("#studentId").val(studentId);
            $("#studentEmail").val(studentEmail);
            $("#studentName").val(studentName);
            $("#yourModal").modal('show')
        }
    });
}


function validateQuizForm() {

    var quizTypes = document.getElementById("quizType");
    var SelectedQuizType = quizTypes.options[quizTypes.selectedIndex].value;
    if (SelectedQuizType === 'questionPool') {

        $("#storeQuizForm").submit(function (e) {
            var check = $("input[name='selected_questions[]']:checked").length;
            if (check === 0) {
                alert("Please select atleast one question");
                e.preventDefault(e);
                return false;
            }
        });
    }
}

function searchQuestion() {

    var input, filter, table, tr, td, i;
    input = document.getElementById("questionSearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("questionPoolTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function searchByKeyword() {

    var input, filter, table, tr, studentNametd, i;
    input = document.getElementById("searchKeyword");
    filter = input.value.toUpperCase();
    table = document.getElementById("studentResultTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        studentNametd = tr[i].getElementsByTagName("td")[0];
        quizNametd = tr[i].getElementsByTagName("td")[1];
        if (studentNametd || quizNametd) {
            if (studentNametd.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else if (quizNametd.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

$(document).ready(function () {
    App.init();
});

function chooseQuizType() {

    var selected_quiz_type = $('#quizType').val();

    if (selected_quiz_type == 'newQuiz') {

        $('#questionPoolPanel').hide();

    } else if (selected_quiz_type == 'questionPool') {

        $('#questionPoolPanel').show();

    }

}

function changeTimerStatus(quizNumber) {


    var isTimerOn = document.getElementById("timerSwitch" + quizNumber).checked;
    if (isTimerOn) {
        document.getElementById("timerSwitchStatus" + quizNumber).value = 'On';
    } else {
        document.getElementById("timerSwitchStatus" + quizNumber).value = 'Off';
    }

    document.getElementById("timerSwitchForm" + quizNumber).submit();



}

function submitForm(quizNumber, questionsAdded) {

    var selectedValue = document.getElementById("teacherQuizStatus" + quizNumber).value;

    var result = "";
    if (selectedValue == 'Finish' && questionsAdded == 0) {
        alert("Please add atleast one question !");
        $('select option:first-child').attr("selected", "selected");
    } else {
        var result = confirm("Are you sure?");
        if (result) {
            document.getElementById("saveForm" + quizNumber).submit();
        }
    }

}

function chooseQuizStatus(quizNumber, questionsAdded, noOfQuestions) {


    var selected_status = $('#teacherQuizStatus' + quizNumber).val();

    if (selected_status == 'InProgress') {

        $('#saveStatus' + quizNumber).hide();


    } else if (selected_status == 'Finish') {

        if (questionsAdded != noOfQuestions) {
            alert("Please add all " + noOfQuestions + " questions before you select finish");
            document.getElementById("teacherQuizStatus" + quizNumber).selectedIndex = 0;
        } else {
            $('#saveStatus' + quizNumber).show();
        }
    }


}