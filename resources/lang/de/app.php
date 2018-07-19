<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    /* Navbar */

    'StudentLoginLabel' => 'Schüler Login',
    'TeacherLoginLabel' => 'Admin Bereich',
    'StudentRegisterLabel' => 'Registrierung',
    'LogoutLabel' => 'Logout',


    /* Login */

    'EmailAddress' => 'E-mail Addresse',
    'Password' => 'Passwort',
    'StudentLogin' => 'Schüler Login',
    'TeacherLogin' => 'Admin Bereich',
    'StudentRegister' => 'Registrierung',
    'RememberMeCheckbox' => 'angemeldet bleiben',
    'LoginButton' => 'Login',
    'ForgotPassword' => 'Passwort vergessen',
    'StudentLoginHeader' => 'Schüler Login',
    'TeacherLoginHeader' => 'Admin Login',

    /* Register */

    'RegisterHeader' => 'Registrierung',
    'StudentNameLabel' => 'Name',
    'PasswordLabel' => 'Passwort',
    'ConfirmPasswordLablel' => 'Passwort bestätigen',
    'EmailAddress' => 'E-mail Addresse',
    'RegisterButton' => 'Registrieren',

     /* Menu tabs - Teacher */

    'HomeMenu' => 'Home',
    'StudentResultsMenu' => 'Ergebnisse',
    'CreateQuizMenu' => 'Quiz erstellen',

    /* Menu tabs - Student */

    'LeaderBoardTab' => 'Highscore',
    'PointsHistoryTab' => 'Historie',
    'QuizTab' => 'Quiz',
    'RetakeQuizTab' => 'Quiz wiederholen',
    'DailyChallengeTab' => 'Tägliche Herausforderung',

    /* Menu tabs description- Student */

    'LeaderBoardLabel' => 'Highscore',
    'LeaderBoardDesc' => 'Hier kannst du dich gegen andere messen',
    'PointsHistoryLabel' => 'Historie',
    'PointsHistoryDesc' => 'Hier kannst du deine bisher erreichten Punkte einsehen',
    'QuizLabel' => 'Quiz',
    'QuizDescLine1' => 'Punkteverteilung: (Leicht - 2 Punkte, Mittel - 4 Punkte, Schwer - 8 Punkte) ',
    'QuizDescLine2' => 'Tipp: Nimm die schweren Fragen, um mehr Punkte zu sammeln',
    'NoQuizNotification' => 'Aktuell sind keine weiteren Fragen verfügbar.',
    'RetakeQuizLabel' => 'Quiz wiederholen',
    'RetakeQuizDescLine1' => 'Hier werden alle bisherigen Quiz aufgelistet',
    'RetakeQuizDescLine2' => 'Du kannst das Quiz wiederholen. Dies hat keine Auswirkungen auf deine Punkte.',
    'RetakeQuizDescLine3' => 'Nur zum Üben.',
    'RetakeQuizNotification' => 'Akutell sind keine weiteren Quiz verfügbar.',
    'DailyChallengeLabel' => 'Tägliche Herausforderung',
    'DailyChallengeDescLine1' => 'Eine Frage pro Tag',
    'DailyChallengeDescLine2' => 'Stell dich der täglichen Herausforderung, um deine Punkte zu erhöhen.',
    'NoChallengeNotification' => 'Du hast das Quiz heute schon absolviert. Komm morgen wieder.',


 /* Teacher home */

    'TeacherDashboard' => 'Admin Bereich',
    'HomeDesc' => 'Hier können Sie Fragen einsehen und bearbeiten.',

     /* Teacher home table */

    'HomeLabel' => 'Home',
    'QuizNumber' => 'Quiz Nummer',
    'QuizName' => 'Quiz Name',
    'QuestionAdded' => 'Frage hinzugefügt',
    'Status' => 'Status',
    'Timer' => 'Timer',
    'InprogressStatus' => 'In Bearbeitung',
    'FinishStatus' => 'Vollständig',
    'AddQuestions' => 'Fragen hinzufügen',
    'EditQuestions' => 'Fragen bearbeiten',

     /* Students results table */

     'StudentResultsLabel' => 'Schüler Ergebnisse',
     'StudentResultsDesc' => 'Hier können Sie die Resultate der Schüler einsehen.',
     'StudentName' => 'Schüler Name',
     'QuizName' => 'Quiz Name',
     'TotalQuestions' => 'Summe der Fragen',
     'CorrectAnswers' => 'Richtige Antworten',
     'WrongAnswers' => 'Falsche Antworten',
     'PointsEarned' => 'gesammelte Punkte',
     'SearchPlaceholder' => 'Suche',

     /* Create quiz tab */

     'CreateQuizLabel' => 'Quiz erstellen',
     'QuizNumber' => 'Quiz Nummer',
     'QuizName' => 'Quiz Name',
     'SelectWithNewQuestion' => 'mit neuen Fragen',
     'SelectFromPool' => 'mit Fragen aus dem Pool',
     'SelectHeader' => 'Auswählen',
     'QuestionsHeader' => 'Fragen',
     'SearchPlaceholderPool' => 'Suche Fragen nach Stichwort',
     'NoQuestionPoolMsg' => 'Keine Fragen im Pool',
     'AddButton' => 'Hinzufügen',

     /* Student Info dialog */

     'StudentInfoHeader' => 'Schüler Informationen',
     'ID' => 'Nummer:',
     'Name' => 'Name :',
     'Email' => 'E-Mail :',
     
     /* Add/Edit question page */

     'EditQuestionHeader' => 'Frage bearbeiten',
     'AddQuestionHeader' => 'Frage hinzufügen',
     'QuizNumberLabel' => 'Quiz Nummer',
     'QuestionNumberLabel' => 'Fragen Nummer',
     'QuestionLabel' => 'Frage',
     'QuestionTypeLabel' => 'Wahl des Fragetyps',
     'MultipleChoiceQT' => 'Multiple Choice',
     'MultipleAnswerQT' => 'Viele Antworten',
     'TrueOrFalseQT' => 'Wahr oder Falsch',
     'FillupQT' => 'Fülle die Lücken',
     'NumericQT' => 'Numerisch',
     'OrderOptionsQT' => 'Sortiere die Optionen',
     'AnswerLabel' => 'Antwort',
     'TrueLabel' => 'Wahr',
     'FalseLabel' => 'Falsch',
     'RangeLabel' => 'Bereich',
     'RangeYesLabel' => 'Ja',
     'RangeNoLabel' => 'Nein',
     'MultipleChoiceDesc' => 'Bitte wählen Sie die korrekte Antwort.',
     'OrderOptionsDesc' => 'Bitte wählen Sie die korrekte Antwort.',
     'MultipleAnswersDesc' => 'Bitte wählen Sie die korrekten Antworten',
     'Choice1Label' => 'Auswahl 1',
     'Choice2Label' => 'Auswahl 2',
     'Choice3Label' => 'Auswahl 3',
     'Choice4Label' => 'Auswahl 4',
     'DifficultyLevelLabel' => 'Schwierikeitslevel',
     'EasyLabel' => 'Einfach',
     'MediumLabel' => 'Mittel',
     'HardLabel' => 'Schwer',
     'AddButton' => 'Hinzufügen',
     'EditButton' => 'Bearbeiten',
     'BackButton' => 'Zurück',
     'UpdateButton' => 'aktualisieren',

     /* Messages */

     'CorrectAnsMsg' => 'Richtige Antwort!',
     'CorrectAnsRangeMsg' => 'Richtige Antwort! Die genaue Antwort lautet: ',
     'WrongAnsMsg' => 'Leide eine falsche Antwort! Die Richtige Antwort lautet: ',

     /* View quiz page */

     'ViewQuestionHeader' => 'Fragenübersicht',

      /* Teacher home */

    'StudentDashboard' => 'Schüler Übersicht',
    'HomeDesc' => 'Hier können Sie die Fragen für jedes Quiz einsehen und bearbeiten.',

     /* Leader board table */

     'RankLabel' => 'Rang',
     'UserIdLabel' => 'ID',
     'NameLabel' => 'Name',
     'QuizPointsLabel' => 'Quiz Punkte',
     'DailyChallengePointsLabel' => 'Punkte für die tägliche Herausforderung',
     'TotalPointsLable' => 'Summer der Punkte',

     /* Points History table */

     'QuizNumberLabel' => 'Quiz Nummer',
     'TotalQuestionsLabel' => 'Anzahl der Fragen',
     'CorrectAnswersLabel' => 'Richtige Antworten',
     'WrongAnswersLabel' => 'Falsche Antworten',
     'PointsEarnedLable' => 'erhaltene Punkte',

     /* Quiz/Retake quiz tab content */

     'QuizHeader' => 'Quiz',
     'ChooseQuizLabel' => 'Quiz Auswahl',
     'StartQuizButton' => 'Start',
     'SubmitButton' => 'Übermitteln',
     'NextButton' => 'Nächste',
     'TimeRemainingLabel' => 'verbleibene Zeit: ',
     'DifficultyLevelLabel' => 'Schwierigkeitslevel:',

      /* Quiz summary */

      'QuizSummaryHeader' => 'Quiz Überblick',
      'YourPointsLabel' => 'Deine Punkte:',
      'QuizNoSummaryLabel' => 'Quiz Nummer :',
      'QuizNameSummaryLabel' => 'Quiz Name :',
      'TotatlQuestionSummaryLabel' => 'Summe der Fragen:',
      'CorrectAnsSummaryLabel' => 'Richtige Antworten:',
      'WrongAnsSummaryLabel' => 'Falsche Antworten: ',
      'BackButton' => 'Zurück',


      /* Alerts */

      'SelectQuestionAlert' => 'Bitte wählen Sie mindestens eine Frage.',
      'AddQuestionAlert' => 'Bitte fügen Sie mindestens eine Frage hinzu',
      'ConfirmAlert' => 'Sicher',
      'SelectAnswerAlert' => 'Bitte wählen Sie die Antwort',

];