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

    'UserLoginLabel' => 'Nutzer Login',
    'AdminLoginLabel' => 'Admin Bereich',
    'UserRegisterLabel' => 'Registrierung',
    'LogoutLabel' => 'Logout',


    /* Login */

    'EmailAddress' => 'E-mail Addresse',
    'Password' => 'Passwort',
    'StudentLogin' => 'Nutzer Login',
    'TeacherLogin' => 'Admin Bereich',
    'StudentRegister' => 'Registrierung',
    'RememberMeCheckbox' => 'angemeldet bleiben',
    'LoginButton' => 'Login',
    'ForgotPassword' => 'Passwort vergessen',
    'UserLoginHeader' => 'Nutzer Login',
    'AdminLoginHeader' => 'Admin Login',

    /* Register */

    'RegisterHeader' => 'Registrierung',
    'StudentNameLabel' => 'Nachname',
    'StudentVorNameLabel' => 'Vorname',
    'PasswordLabel' => 'Passwort',
    'ConfirmPasswordLablel' => 'Passwort bestätigen',
    'EmailAddress' => 'Addresse',
    'SexLabel' => 'Geschlecht',
    'AgeLablel' => 'Alter',
    'DiseaseLabel' => 'Diagnose',
    'DateOfJoiningLabel' => 'Entrittsdatum',
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

    'AdminDashboard' => 'Nutzer Bereich',
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
     'ImageAsOptionsQT' => 'Bildauswahl',
     'ImageTypeQT' => 'Bild Typ',
     'VideoTypeQT' => 'Video Typ',
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
     'Image1Label' => 'Bild 1',
     'Image2Label' => 'Bild 2',
     'Image3Label' => 'Bild 3',
     'Image4Label' => 'Bild 4',
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
     'ImageAsOptionsDZmsg' => 'Bitte fügen Sie 4 Bilder in diesem Bereich ein',
     'ImageTypeDZmsg' => 'Bild hier ablegen',
     'VideoTypeDZmsg' => 'Video hier ablegen',
     

     /* View quiz page */

     'ViewQuestionHeader' => 'Fragenübersicht',

      /* Teacher home */

    'UserDashboard' => 'Nutzer Übersicht',
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

      'AddOneImageAlert' => 'Bitte mindestens ein Bild einfügen',
      'AddFourImageAlert' => 'Bitte ergänzen Sie 4 Bilder ',
      'AddOneVideoAlert' => ' Bitte ergänzen Sie mindestens 1 Video',
      'ImageChangedAlert' => 'Das Bild wurde geändert, bitte aktualisieren Sie die Seite. ',
      'VideoChangedAlert' => 'Das Video wurde geändert, bitte aktualisieren Sie die Seite. ',

      /* New */ /* Home notifications */
      'Congradulations' => 'Herzlichen Glückwunsch!',
      'Alert' => 'Achtung!',
      'TopTableNotification' => 'Sie sind Tabellenführer!',
      'OneQuizNotification' => 'Ein neues Quiz ist verfügbar.',
      'QuizesNotification' => 'Es stehen neue Quiz zur Verfügung',
      'QuizesNotification1' => 'Sie sind',
      'QuizesNotification2' => 'Punkte fehlen zum Gewinner',
      'QuizesNotification3' => 'und klettere einen weiteren Rang',

      /* New */ /* Tabs */
      'PhysicalFunctionsTab' => 'Körperliche Funktionen',
      'CognitiveFunctionsTab' => 'Kognitive Funktionen',
      'RelationshipsTab' => 'Beziehungen',
      'EmotionsTab' => 'Gefühle',
      'UserProfileTab' => 'Patienten Profil',
      'MovementDataTab' => 'Bewegungsdaten',
      'ParticipationTab' => 'Teilhabe',
      'EvaluationTab' => 'Evaluation',
      'ResultsTab' => 'Ergebnisse',

      /* New */ /* Home notifications */
      'PhysicalFunctionsLabel' => 'Körperliche Funktionen',
      'PhysicalFunctionsDesc' => 'Zunächst möchten wir Ihnen spezifische Fragen zu Ihrem körperlichen Befinden stellen. Bitte schätzen Sie Ihre körperlichen Funktionen entsprechend der Skalen ein',
      'CognitiveFunctionsLabel' => 'Kognitive Funktionen',
      'CognitiveFunctionsDesc' => 'Nun möchten wir Ihnen spezifische Fragen zu Ihrem kognitiven Befinden stellen. Bitte schätzen Sie Ihre kognitiven Funktionen entsprechend der Skalen ein',
      'RelationshipsLabel' => 'Beziehungen',
      'RelationshipsDesc' => 'Nun möchten wir Ihnen spezifische Fragen zu Ihrem sozialen Beziehungen stellen. Bitte beschreiben Sie Ihre Beziehungen und deren Wichtigkeit entsprechend der Skalen',
      'EmotionsLabel' => 'Gefühle',
      'EmotionsDesc' => 'Abschließend möchten wir Ihnen spezifische Fragen zu Ihrer Gefühlslage stellen. Bitte beschreiben Sie Ihre Gefühlslage entsprechend der Skalen',
      'UserProfileLabel' => 'Patienten Profil',
      'UserProfileDesc' => 'Hier sehene Sie die Nutzerdetails',
      'MovementDataLabel' => 'Bewegungsdaten',
      'ParticipationLabel' => 'Teilnahme',
      'ParticipationDesc' => 'Here the user can view the values of participation elements like nutrition, hygiene, house hold, self care and self-determination',
      'EvaluationLabel' => 'Evaluation',
      'EvaluationDesc' => 'Here the user can view the evaluation of results from all the four pillers (Physical functions, cognitive functions, relationships and emotions)',
      'ResultsLabel' => 'Ergebnisse',
      'ResultsDesc' => 'Here the user can view the individual results of all the four pillers (Physical functions, cognitive functions, relationships and emotions) and the overall results for the well being and the quality of life',

      /* New */ /* User details headers */
      'UserIDLabel' => 'Nutzer ID',
      'FirstNameLabel' => 'Nachname',
      'LastNameLabel' => 'Vorname',
      'EmailLabel' => 'Addresse',
      'SexLabel' => 'Geschlecht',
      'SexMaleLabel' => 'Männlich',
      'SexFemaleLabel' => 'Weiblich',
      'AgeLabel' => 'Alter',
      'DiseaseLabel'=>'Diagnose',
      'JoiningDateLabel'=>'Eintrittsdatum',

       /* New */ /* Movement data headers */
       'CurrentDateLabel' => 'Datum',
       'wellbeingQtn' => 'Wie wohl fühlen Sie sich momentan?',
            'veryWell' => 'Sehr wohl',
            'well' => 'Wohl',
            'notWell' => 'Unwohl',
            'notSoWell' => 'Sehr unwohl',
       'happeningQtn' => 'Gab es in der letzten Zeit besondere Ereignisse? (z.B. Sturz etc.)',
      
      /* New */ /* Physical function headers */
      'MovementHeader' => 'Bewegung',
      'PainHeader' => 'Schmerzen',
      'SleepingBehaviour' => 'Schlafgewohnheiten',
      'Senses' => 'Sinne',


      /* New */ /* Cognitive function headers */
      'CommunicativeSkillsHeader' => 'Kommunikative Fähigkeiten',
      'ControlHeader' => 'Kontolle',

      /* New */ /*Relationships headers */
      'FunctionalValueHeader' => 'Funktionaler Wert',
      'EmotionalValueHeader' => 'Emotionaler Wert',


      /* New */ /*Emotions headers */
      'PositiveEffectsHeader' => 'Positive Affekte',
      'NegativeEffectsHeader' => 'Negative Affekte',

      /* New */ /* Physical function questions - movement*/
      'accidentQtn' => 'Sind Sie in letzter Zeit gestürtzt?',
      'yesLabel' => 'Ja',
      'NoLabel' => 'Nein',
      'holdPositionQtn' => 'Wie gut können Sie Ihre Position halten?',
      'changePositionQtn' => 'Wie gut können Sie Ihre Position wechslen?',
      'walkQtn' => 'Wie gut können Sie gehen?',
      'climbStairsQtn' => 'Wie gut können Sie treppensteigen?',

            /* New */ /* Physical function range slider label - movement */
            'noEffortsM' => 'Ohne Mühe',
            'withLessEffortsM' => 'Mit wenig Mühe',
            'withMoreEffortsM' => 'Mit viel Mühe',
            'notPossibleM' => 'Nicht möglich',

      /* New */ /* Physical function questions - pain*/
      'knownPainQtn' => 'Haben Sie Ihnen bekannte Schmerzen? Wenn ja, wie stark waren diese in den letzten 7 Tagen?',
      'unknownPainQtn' => 'Sind in den letzten 7 Tagen unbekannte Schmerzen bei Ihnen aufgetreten? Wenn ja, wie stark waren diese?',

            /* New */ /* Physical function range slider label - pain */
            'noPain' => 'Keine Schmerzen',
            'lessPain' => 'Wenig Schmerzen',
            'morePain' => 'Starke Schmerzen',
            'intensePain' => 'Sehr starke Schmerzen',

      /* New */ /* Physical function questions - sleeping behaviour*/
      'fallAsleepQtn' => 'Wie leicht fällt es Ihnen einzuschlafen?',
      'sleepingDurationQtn' => 'Wie leicht fällt es Ihnen durchzuschlafen?',

            /* New */ /* Physical function range slider label - sleeping behaviour */
            'noEffortsSlp' => 'Ohne Mühe',
            'withLessEffortsSlp' => 'Mit wenig Mühe',
            'withMoreEffortsSlp' => 'Mit viel Mühe',
            'notPossibleSlp' => 'Nicht möglich',

      /* New */ /* Physical function questions - senses*/
      'seeingQtn' => 'Wie gut können Sie sehen?',
      'hearingQtn' => 'Wie gut können Sie hören?',

            /* New */ /* Physical function range slider label - senses*/
            'noEffortsSenses' => 'Ohne Mühe',
            'withLessEffortsSenses' => 'Mit wenig Mühe',
            'withMoreEffortsSenses' => 'Mit viel Mühe',
            'notPossibleSenses' => 'Nicht möglich',



      /* New */ /* Cognitive function questions */
      'CommunicativeSkillsHeader' => 'Kommunikative Fähigkeiten',
      'ControlHeader' => 'Kontolle',

      /* New */ /* Cognitive function questions - Communicative skills*/
      'expressionQtn' => 'Wie leicht fällt es Ihnen sich auszudrücken?',
      'understandQtn' => 'Wie leicht fällt es Ihnen andere zu verstehen?',

            /* New */ /* Cognitive function range slider label - Communicative skills */
            'noEffortsComm' => 'Ohne Mühe',
            'withLessEffortsComm' => 'Mit wenig Mühe',
            'withMoreEffortsComm' => 'Mit viel Mühe',
            'notPossibleComm' => 'Nicht möglich',

      /* New */ /* Cognitive function questions - Cotrol*/
      'concentrateQtn' => 'Wie leicht fiel es Ihnen in den letzten 7 Tagen sich 10 min auf etwas zu konzentrieren?',
      'memoryQtn' => 'Wie gut konnten Sie sich in den letzten 7 Tagen an wichtige Dinge erinnern?',
      'orientationQtn' => 'Wie gut konnten Sie sich in den letzten 7 Tagen in Ihrer Umgebung zurechtfinden?',

            /* New */ /* Cognitive function range slider label - Communicative skills */
            'noEffortsCon' => 'Ohne Mühe',
            'withLessEffortsCon' => 'Mit wenig Mühe',
            'withMoreEffortsCon' => 'Mit viel Mühe',
            'notPossibleCon' => 'Nicht möglich',

      /* New */ /* Relationship questions */
      'FunctionalValueHeader' => 'Functional values',
      'EmotionalValueHeader' => 'Emotional values',

      /* New */ /* Relationship questions - functional value*/
      'fFamilyQtn' => 'Wie viel Unterstützung erhalten Sie durch Ihre Familie?',
      'fFriendsQtn' => 'Wie viel Unterstützung erhalten Sie durch Ihre Freunde?',
      'fPartnershipQtn' => 'Wie viel Unterstützung erhalten Sie durch Ihren Partner/ Ihre Partnerin?',
      'fNursingStaffQtn' => 'Wie wichtig ist Ihnen die Unterstützung durch Pflegepersonal?',
      'fAcquaintancesQtn' => 'Wie viel Unterstützung erhalten Sie durch andere Personen',

            /* New */ /* Relationship range slider label - functional value */
            'veryImportantFV' => 'Sehr viel',
            'importantFV' => 'Viel',
            'lessImportantFV' => 'Wenig',
            'notImportantFV' => 'Keine',

      /* New */ /* Relationship questions - emotional value*/
      'eFamilyQtn' => 'Wie erleben Sie die Unterstützung/ Unterstützungsbereitschaft Ihrer Familie?',
      'eFriendsQtn' => 'Wie erleben Sie die Unterstützung/ Unterstützungsbereitschaft Ihrer Freunde?',
      'ePartnershipQtn' => 'Wie erleben Sie die Unterstützung/ Unterstützungsbereitschaft Ihres Partners/ Ihrer Partnerin?',
      'eNursingStaffQtn' => 'Wie zufrieden sind Sie mit der Unterstützung die Sie durch Pflegepersonal erhalten?',
      'eAcquaintancesQtn' => 'Wie erleben Sie die Unterstützung/ Unterstützungsbereitschaft anderer Personen?',

            /* New */ /* Relationship range slider label - emotional value */
            'verySatisfiedEV' => 'Sehr angenehm',
            'satisfiedEV' => 'Angenehm',
            'lessSatisfiedEV' => 'Unangenehm',
            'notSatisfiedEV' => 'Sehr unangenehm',


      /* New */ /* Emotions questions */
      'PositiveEffectsHeader' => 'Positive Affekte',
      'NegativeEffectsHeader' => 'Negative Affekte',

      /* New */ /* Emotions questions -  positive effects*/
      'motivationQtn' => 'Wie oft hatten Sie gute Laune in den letzten 7 Tagen?',
      'highMoodQtn' => 'Wie oft haben Sie sich motiviert gefühlt in den letzten 7 Tagen?',
      'relaxationQtn' => 'Wie oft haben Sie sich entspannt gefühlt in den letzten 7 Tagen?',

            /* New */ /* Emotions range slider label - positive effects */
            'neverPE' => 'Nie',
            'lessOftenPE' => 'Nicht oft',
            'moreOftenPE' => 'Öfters',
            'alwaysPE' => 'Immer',

      /* New */ /* Emotions questions - negative effects*/
      'indifferenceQtn' => 'Wie oft empfanden Sie Gleichgültigkeit in den letzten 7 Tagen?',
      'sadnessQtn' => 'Wie oft fühlten Sie sich traurig in den letzten 7 Tagen?',
      'frustrationQtn' => 'Wie oft waren Sie frustriert in den letzten 7 Tagen?',

            /* New */ /* Emotions range slider label - negative effects */
            'neverNE' => 'Nie',
            'lessOftenNE' => 'Nicht oft',
            'moreOftenNE' => 'Öfters',
            'alwaysNE' => 'Immer',

      /* New */ /* Admin tab headers */
      'registerUser' => 'Nutzer anlegen',
      'listOfUsers' => 'Nutzerliste',

      /* New */ /* dashboard headers */
      'adminHeader' => 'Admin Übersicht',
      'userHeader' => 'Nutzer Übersicht',

      /* New */ /* Participation table headers */
      'userIdHeader' => 'Befragung',
      'NutritionHeader' => 'Ernährung',
      'hygieneHeader' => 'Hygiene',
      'householdHeader' => 'Haushalt',
      'selfcareHeader' => 'Selbstversorgung',
      'self-determinationHeader' => 'Selbstbestimmung',

      /* New */ /* Participation table headers */
      'userIdHeader' => 'Befragung',
      'physicalFunctionsResultsHeader' => 'Ergebnis köperliche Funktionen',
      'cognitiveFunctionsResultsHeader' => 'Ergebnis kognitive Funktionen',
      'relationshipResultsHeader' => 'Ergebnis Beziehungen',
      'emotionsResultsHeader' => 'Ergebnis Gefühle',
      'participationResultsHeader' => 'Kummulierte Ergebnisse Selbstversorgung',
      'wellbeingResultsHeader' => 'Wohlbefinden',
      'accidentResultsHeader' => 'Ereignisse',
      'qualityOfLifeResultsHeader' => 'Lebensqualität',

];