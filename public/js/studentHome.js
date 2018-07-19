function startQuiz() {

    var selected_quiz = $('#quizNumber').val();
    var attempt = "firstAttempt";
    var url = "{{ route('take.quiz', [':id',':id1']) }}";
    url = url.replace(':id', selected_quiz);
    url = url.replace(':id1', attempt);


    document.location.href = url;
}

function retakeQuiz() {

    var selected_quiz = $('#quizNo').val();
    var attempt = "reAttempt";
    var url = "{{ route('take.quiz', [':id',':id1']) }}";
    url = url.replace(':id', selected_quiz);
    url = url.replace(':id1', attempt);


    document.location.href = url;
}

function showCorrectAnswer(questionType, isRangeAllowed) {

    var enteredAnswer = "";
    if (questionType == 'MultipleChoice' || questionType == 'TrueFalse') {
        enteredAnswer = $('input[name=radio]:checked').val();

    } else if (questionType == 'MultipleAnswer') {
        var values = new Array();
        var count = 1;
        var checkedLength = $(".checkboxField:checked").length;

        $.each($("input[name='selected_ids[]']:checked"), function () {

            var idNmae = "choice" + count;

            if (count == checkedLength) {
                enteredAnswer += document.getElementById(idNmae).value;
            } else {
                enteredAnswer += document.getElementById(idNmae).value;
                enteredAnswer += ",";
            }
            values.push($(this).val());
            count++;
        });
    } else {
        enteredAnswer = document.getElementById("answer").value;
    }
    if (enteredAnswer === undefined) {
        enteredAnswer = "";
    }

    var actualAnswer = document.getElementById("questionAnswer").value;
    var min, max;
    if (questionType == 'NumericQuestion') {
        if (isRangeAllowed == 'Yes') {
            min = parseInt(actualAnswer) - 5;
            max = parseInt(actualAnswer) + 5;

            if ((min <= enteredAnswer) && (enteredAnswer <= max)) {
                alert(enteredAnswer);
                $('#exactAnswer').show();
                $('#correctAnswer').hide();
                $('#wrongAnswer').hide();
            }
        }
    } else if (enteredAnswer.toUpperCase() === actualAnswer.toUpperCase()) {

        $('#correctAnswer').show();
        $('#wrongAnswer').hide();
    } else {

        $('#wrongAnswer').show();
        $('#correctAnswer').hide();
    }

    setTimeout("submitAnswerForm()", 2500);
}

function submitAnswerForm() {

    document.getElementById("submitQuiz").submit();
}