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

        'UserLoginLabel' => 'User Login',
        'AdminLoginLabel' => 'Admin Login',
        'UserRegisterLabel' => 'User Register',
        'LogoutLabel' => 'Logout',

    /* Login */

    'EmailAddress' => 'E-mail address',
    'Password' => 'Password',
    'StudentLogin' => 'Student Login',
    'TeacherLogin' => 'Teacher Login',
    'StudentRegister' => 'Student Register',
    'RememberMeCheckbox' => 'Remember Me',
    'LoginButton' => 'Login',
    'ForgotPassword' => 'Forgot Password',
    'UserLoginHeader' => 'User Login',
    'AdminLoginHeader' => 'Admin Login',

    /* Register */

    'RegisterHeader' => 'Register',
    'StudentNameLabel' => 'Name',
    'StudentVorNameLabel' => 'Last name',
    'PasswordLabel' => 'Password',
    'ConfirmPasswordLablel' => 'Confirm Password',
    'EmailAddress' => 'E-mail address',
    'SexLabel' => 'Sex',
    'AgeLablel' => 'Age',
    'DiseaseLabel' => 'Disease',
    'DateOfJoiningLabel' => 'Date of joining',
    'RegisterButton' => 'Register',

     /* Menu tabs - Teacher */

    'HomeMenu' => 'Home',
    'StudentResultsMenu' => 'Student Results',
    'CreateQuizMenu' => 'Create Quiz',

    /* Menu tabs - Student */

    'LeaderBoardTab' => 'Leader Board',
    'PointsHistoryTab' => 'Points History',
    'QuizTab' => 'Quiz',
    'RetakeQuizTab' => 'Retake Quiz',
    'DailyChallengeTab' => 'Daily Challenge',

    /* Menu tabs description- Student */

    'LeaderBoardLabel' => 'Leaderboard',
    'LeaderBoardDesc' => 'You can see where you stand in terms of points scored',
    'PointsHistoryLabel' => 'History',
    'PointsHistoryDesc' => 'Here, you will see information about the points scored in each quiz',
    'QuizLabel' => 'Quiz',
    'QuizDescLine1' => 'Points distribution : (Easy - 2 points, Medium - 4 points, Hard - 8 points) ',
    'QuizDescLine2' => 'Get the difiicult questions right to get more points',
    'NoQuizNotification' => 'No more quiz available at this point of time.',
    'RetakeQuizLabel' => 'Retake Quiz',
    'RetakeQuizDescLine1' => 'All completed quizes are listed out here. ',
    'RetakeQuizDescLine2' => 'You can retake the quiz. However, points will not be updated. ',
    'RetakeQuizDescLine3' => 'This is just for learning ',
    'RetakeQuizNotification' => 'No more quiz available at this point of time.',
    'DailyChallengeLabel' => 'Daily Challenge',
    'DailyChallengeDescLine1' => 'One question per day',
    'DailyChallengeDescLine2' => 'Take this daily challenge and boost your points.',
    'NoChallengeNotification' => 'You have already taken todays challenge. Come back tomorrow !',


 /* Teacher home */

    'AdminDashboard' => 'Admin Dashboard',
    'HomeDesc' => 'Here, you can view and edit the questions in each quiz',

     /* Teacher home table */

    'HomeLabel' => 'Home',
    'QuizNumber' => 'Quiz Number',
    'QuizName' => 'Quiz Name',
    'QuestionAdded' => 'Question Added',
    'Status' => 'Status',
    'Timer' => 'Timer',
    'InprogressStatus' => 'In progress',
    'FinishStatus' => 'Finish',
    'AddQuestions' => 'Add Questions',
    'EditQuestions' => 'Edit Questions',

     /* Students results table */

     'StudentResultsLabel' => 'Student Results',
     'StudentResultsDesc' => 'Here, you will see information about the quiz that is taken by
     the students',
     'StudentName' => 'Student Name',
     'QuizName' => 'Quiz Name',
     'TotalQuestions' => 'Total Questions',
     'CorrectAnswers' => 'Correct Answers',
     'WrongAnswers' => 'Wrong Answers',
     'PointsEarned' => 'PointsEarned',
     'SearchPlaceholder' => 'Search...',

     /* Create quiz tab */

     'CreateQuizLabel' => 'Create Quiz',
     'QuizNumber' => 'Quiz Number',
     'QuizName' => 'Quiz Name',
     'SelectWithNewQuestion' => 'with new questions',
     'SelectFromPool' => 'from question pool',
     'SelectHeader' => 'Select',
     'QuestionsHeader' => 'Questions',
     'SearchPlaceholderPool' => 'Search question by keyword',
     'NoQuestionPoolMsg' => 'No questions in the pool !',
     'AddButton' => 'Add',

     /* Student Info dialog */

     'StudentInfoHeader' => 'Student Info',
     'ID' => 'ID :',
     'Name' => 'Name :',
     'Email' => 'Email :',
     
     /* Add/Edit question page */

     'EditQuestionHeader' => 'Edit Questions',
     'AddQuestionHeader' => 'Add Question',
     'QuizNumberLabel' => 'Quiz Number',
     'QuestionNumberLabel' => 'Question Number',
     'QuestionLabel' => 'Question',
     'QuestionTypeLabel' => 'Choose Question Type',
     'MultipleChoiceQT' => 'Multiple Choice',
     'MultipleAnswerQT' => 'Multiple Answers',
     'TrueOrFalseQT' => 'True or False',
     'FillupQT' => 'Fill in the blanks',
     'NumericQT' => 'Numeric',
     'OrderOptionsQT' => 'Order the options',
       /* New */
     'ImageAsOptionsQT' => 'Image as options',
     'ImageTypeQT' => 'Image type',
     'VideoTypeQT' => 'Video type',

     'AnswerLabel' => 'Answer',
     'TrueLabel' => 'True',
     'FalseLabel' => 'False',
     'RangeLabel' => 'Range',
     'RangeYesLabel' => 'Yes',
     'RangeNoLabel' => 'No',
     'MultipleChoiceDesc' => 'Please select the correct answer',
     'OrderOptionsDesc' => 'Please select the correct answer',
     'MultipleAnswersDesc' => 'Please select all the correct answers',
     'Choice1Label' => 'Choice 1',
     'Choice2Label' => 'Choice 2',
     'Choice3Label' => 'Choice 3',
     'Choice4Label' => 'Choice 4',
     /* New */
     'Image1Label' => 'Image 1',
     'Image2Label' => 'Image 2',
     'Image3Label' => 'Image 3',
     'Image4Label' => 'Image 4',

     'DifficultyLevelLabel' => 'Difficulty Level',
     'EasyLabel' => 'Easy',
     'MediumLabel' => 'Medium',
     'HardLabel' => 'Hard',
     'AddButton' => 'Add',
     'EditButton' => 'Edit',
     'BackButton' => 'Back',
     'UpdateButton' => 'Update',

     /* Messages */

     'CorrectAnsMsg' => 'Correct Answer!',
     'CorrectAnsRangeMsg' => 'Correct Answer! However, the exact answer is ',
     'WrongAnsMsg' => 'Wrong Answer! Correct answer is ',
      /* New */
      'ImageAsOptionsDZmsg' => 'Please add 4 images in this area',
      'ImageTypeDZmsg' => 'Drop an image in this area',
      'VideoTypeDZmsg' => 'Drop a video in this area',


     /* View quiz page */

     'ViewQuestionHeader' => 'View Questions',

      /* Teacher home */

    'UserDashboard' => 'User Dashboard',
    'HomeDesc' => 'Here, you can view and edit the questions in each quiz',

     /* Leader board table */

     'RankLabel' => 'Rank',
     'UserIdLabel' => 'User ID',
     'NameLabel' => 'Name',
     'QuizPointsLabel' => 'Quiz Points',
     'DailyChallengePointsLabel' => 'Daily Challenge Points',
     'TotalPointsLable' => 'Total Points',

     /* Points History table */

     'QuizNumberLabel' => 'Quiz Number',
     'TotalQuestionsLabel' => 'Total Questions',
     'CorrectAnswersLabel' => 'Correct Answers',
     'WrongAnswersLabel' => 'Wrong Answers',
     'PointsEarnedLable' => 'Points Earned',

     /* Quiz/Retake quiz tab content */

     'QuizHeader' => 'Quiz',
     'ChooseQuizLabel' => 'Choose Quiz',
     'StartQuizButton' => 'Start Quiz',
     'SubmitButton' => 'Submit',
     'NextButton' => 'Next',
     'TimeRemainingLabel' => 'Time Remaining : ',
     'DifficultyLevelLabel' => 'Difficulty Level :',

      /* Quiz summary */

      'QuizSummaryHeader' => 'Quiz Summary',
      'YourPointsLabel' => 'Your Points :',
      'QuizNoSummaryLabel' => 'Quiz Number :',
      'QuizNameSummaryLabel' => 'Quiz Name :',
      'TotatlQuestionSummaryLabel' => 'Totatl Questions :',
      'CorrectAnsSummaryLabel' => 'Correct Answers :',
      'WrongAnsSummaryLabel' => 'Wrong Answers : ',
      'BackButton' => 'Back',

      /* Alerts */

      'SelectQuestionAlert' => 'Please select atleast one question',
      'AddQuestionAlert' => 'Please add atleast one question !',
      'ConfirmAlert' => 'Are you sure ?',
      'SelectAnswerAlert' => 'Please select the answer',

      /* New */
      'AddOneImageAlert' => 'Please add atleast one image',
      'AddFourImageAlert' => 'Please add four images',
      'AddOneVideoAlert' => 'Please add atleast one video',
      'ImageChangedAlert' => 'Image has been changed please click update',
      'VideoChangedAlert' => 'Video has been changed please click update',

      /* New */ /* Home notifications */
      'Congradulations' => 'Congradulations!',
      'Alert' => 'Alert!',
      'TopTableNotification' => 'You top the table.',
      'OneQuizNotification' => 'One new quiz is available.',
      'QuizesNotification' => 'new quizes are available.',
      'QuizesNotification1' => 'you are',
      'QuizesNotification2' => 'points away from surpassing',
      'QuizesNotification3' => 'and climb up to rank',

      /* New */ /* Home notifications */
      'PhysicalFunctionsTab' => 'Physical Functions',
      'CognitiveFunctionsTab' => 'Cognitive Functions',
      'RelationshipsTab' => 'Relationships',
      'EmotionsTab' => 'Emotions',
      'UserProfileTab' => 'User profile',
      'MovementDataTab' => 'MovementData',
      'ParticipationTab' => 'Participation',
      'EvaluationTab' => 'Evaluation',
      'ResultsTab' => 'Results',

      /* New */ /* Home notifications */
      'PhysicalFunctionsLabel' => 'Physical Functions',
      'PhysicalFunctionsDesc' => 'Here the user can enter the weights for physical functions like Movement, Pain, Sleeping behaviour and senses',
      'CognitiveFunctionsLabel' => 'Cognitive Functions',
      'CognitiveFunctionsDesc' => 'Here the user can enter the weights for cognitive functions like Communicative skills and control',
      'RelationshipsLabel' => 'Relationships',
      'RelationshipsDesc' => 'Here the user can enter the weights for Relationships under functional value and emotional value',
      'EmotionsLabel' => 'Emotions',
      'EmotionsDesc' => 'Here the user can enter the weights for Emotions like positive effects and negative effects',
      'UserProfileLabel' => 'UserProfile',
      'UserProfileDesc' => 'Here you can view the user details',
      'MovementDataLabel' => 'Movement data',
      'ParticipationLabel' => 'Participation',
      'ParticipationDesc' => 'Here the user can view the values of participation elements like nutrition, hygiene, house hold, self care and self-determination',
      'EvaluationLabel' => 'Evaluation',
      'EvaluationDesc' => 'Here the user can view the evaluation of results from all the four pillers (Physical functions, cognitive functions, relationships and emotions)',
      'ResultsLabel' => 'Results',
      'ResultsDesc' => 'Here the user can view the individual results of all the four pillers (Physical functions, cognitive functions, relationships and emotions) and the overall results for the well being and the quality of life',

      /* New */ /* User details headers */
      'UserIDLabel' => 'User ID',
      'FirstNameLabel' => 'First name',
      'LastNameLabel' => 'Last name',
      'EmailLabel' => 'Email',
      'SexLabel' => 'Sex',
      'SexMaleLabel' => 'Male',
      'SexFemaleLabel' => 'Female',
      'AgeLabel' => 'Age',
      'DiseaseLabel'=>'Disease',
      'JoiningDateLabel'=>'Date of joining',

      /* New */ /* Movement data headers */
      'CurrentDateLabel' => 'Current date',
      'wellbeingQtn' => 'How well do you feel right now?',
      'veryWell' => 'Very well',
      'well' => 'Well',
      'notWell' => 'Not well',
      'notSoWell' => 'Not so well',
      'happeningQtn' => 'Are there any accidents or happenings in the last month? (e.g. Falling down etc.)',

      /* New */ /* Physical function headers */
      'MovementHeader' => 'Movement',
      'PainHeader' => 'Pain',
      'SleepingBehaviour' => 'Sleeping behaviour',
      'Senses' => 'Senses',

      /* New */ /* Cognitive function headers */
      'CommunicativeSkillsHeader' => 'Communicative skills',
      'ControlHeader' => 'Control',

      /* New */ /*Relationships headers */
      'FunctionalValueHeader' => 'Functional value',
      'EmotionalValueHeader' => 'Emotional value',


      /* New */ /*Emotions headers */
      'PositiveEffectsHeader' => 'Positive effects',
      'NegativeEffectsHeader' => 'Negative effects',

      /* New */ /* Physical function questions - movement*/
      'accidentQtn' => 'Did you fall down in the last seven days?',
      'yesLabel' => 'Yes',
      'NoLabel' => 'No',
      'holdPositionQtn' => 'How well can you hold your position?',
      'changePositionQtn' => 'How well can you change your position?',
      'walkQtn' => 'How well can you walk?',
      'climbStairsQtn' => 'How well can you climb stairs?',

            /* New */ /* Physical function range slider label - movement */
            'noEffortsM' => 'No efforts',
            'withLessEffortsM' => 'With less efforts',
            'withMoreEffortsM' => 'With more efforts',
            'notPossibleM' => 'Not possible',

      /* New */ /* Physical function questions - pain*/
      'knownPainQtn' => 'How intense is your known pain in the last seven days?',
      'unknownPainQtn' => 'How intense is your unknown pain in the last seven days?',

            /* New */ /* Physical function range slider label - pain */
            'noPain' => 'No pain',
            'lessPain' => 'Less pain',
            'morePain' => 'More pain',
            'intensePain' => 'Intense pain',

      /* New */ /* Physical function questions - sleeping behaviour*/
      'fallAsleepQtn' => 'How easy is it for you to fall asleep?',
      'sleepingDurationQtn' => 'How easy is it for you to sleep throughout the night?',

            /* New */ /* Physical function range slider label - sleeping behaviour */
            'noEffortsSlp' => 'No efforts',
            'withLessEffortsSlp' => 'With less efforts',
            'withMoreEffortsSlp' => 'With more efforts',
            'notPossibleSlp' => 'Not possible',

      /* New */ /* Physical function questions - senses*/
      'seeingQtn' => 'How good can you see?',
      'hearingQtn' => 'How good can you hear?',

            /* New */ /* Physical function range slider label - senses*/
            'noEffortsSenses' => 'No efforts',
            'withLessEffortsSenses' => 'With less efforts',
            'withMoreEffortsSenses' => 'With more efforts',
            'notPossibleSenses' => 'Not possible',



      /* New */ /* Cognitive function questions */
      'CommunicativeSkillsHeader' => 'Communicative skills',
      'ControlHeader' => 'Control',

      /* New */ /* Cognitive function questions - Communicative skills*/
      'expressionQtn' => 'How well can you express yourself?',
      'understandQtn' => 'How well can you understand?',

            /* New */ /* Cognitive function range slider label - Communicative skills */
            'noEffortsComm' => 'No efforts',
            'withLessEffortsComm' => 'With less efforts',
            'withMoreEffortsComm' => 'With more efforts',
            'notPossibleComm' => 'Not possible',

      /* New */ /* Cognitive function questions - Cotrol*/
      'concentrateQtn' => 'How well can you concentrate in the last seven days?',
      'memoryQtn' => 'How well can you remember things that happened in the last seven days?',
      'orientationQtn' => 'How well can you orient yourself in the last seven days?',

            /* New */ /* Cognitive function range slider label - Communicative skills */
            'noEffortsCon' => 'No efforts',
            'withLessEffortsCon' => 'With less efforts',
            'withMoreEffortsCon' => 'With more efforts',
            'notPossibleCon' => 'Not possible',

      /* New */ /* Relationship questions */
      'FunctionalValueHeader' => 'Functional values',
      'EmotionalValueHeader' => 'Emotional values',

      /* New */ /* Relationship questions - functional value*/
      'fFamilyQtn' => 'How important is the support from your family?',
      'fFriendsQtn' => 'How important is the support from your friends?',
      'fPartnershipQtn' => 'How important is the support from your partnership?',
      'fNursingStaffQtn' => 'How important is the support from your nursing staffs?',
      'fAcquaintancesQtn' => 'How important is the support from your acquaintances?',

            /* New */ /* Relationship range slider label - functional value */
            'veryImportantFV' => 'Very important',
            'importantFV' => 'Important',
            'lessImportantFV' => 'Less important',
            'notImportantFV' => 'Not important',

      /* New */ /* Relationship questions - emotional value*/
      'eFamilyQtn' => 'How satisfying is the support from your family?',
      'eFriendsQtn' => 'How satisfying is the support from your friends?',
      'ePartnershipQtn' => 'How satisfying is the support from your partnership?',
      'eNursingStaffQtn' => 'How satisfying is the support from your nursing staffs?',
      'eAcquaintancesQtn' => 'How satisfying is the support from your acquaintances?',

            /* New */ /* Relationship range slider label - emotional value */
            'verySatisfiedEV' => 'Very Satisfied',
            'satisfiedEV' => 'Satisfied',
            'lessSatisfiedEV' => 'Less Satisfied',
            'notSatisfiedEV' => 'Not Satisfied',


      /* New */ /* Emotions questions */
      'PositiveEffectsHeader' => 'Positive effects',
      'NegativeEffectsHeader' => 'Negative effects',

      /* New */ /* Emotions questions -  positive effects*/
      'motivationQtn' => 'How often do you feel motivated in the last seven days?',
      'highMoodQtn' => 'How often you were in high mood in the last seven days?',
      'relaxationQtn' => 'How often you relaxed in the last seven days',

            /* New */ /* Emotions range slider label - positive effects */
            'neverPE' => 'Never',
            'lessOftenPE' => 'Less often',
            'moreOftenPE' => 'More often',
            'alwaysPE' => 'Always',

      /* New */ /* Emotions questions - negative effects*/
      'indifferenceQtn' => 'How often do you feel indifferent in the last seven days?',
      'sadnessQtn' => 'How often you were sad in the last seven days?',
      'frustrationQtn' => 'How often you were frustrated in the last seven days',

            /* New */ /* Emotions range slider label - negative effects */
            'neverNE' => 'Never',
            'lessOftenNE' => 'Less often',
            'moreOftenNE' => 'More often',
            'alwaysNE' => 'Always',

      /* New */ /* Admin tab headers */
      'registerUser' => 'Register user',
      'listOfUsers' => 'list of users',

      /* New */ /* dashboard headers */
      'adminHeader' => 'Admin dashboard',
      'userHeader' => 'User dashboard',

      /* New */ /* Participation table headers */
      'userIdHeader' => 'User ID',
      'NutritionHeader' => 'Nutrition',
      'hygieneHeader' => 'Hygiene',
      'householdHeader' => 'Household',
      'selfcareHeader' => 'self care',
      'self-determinationHeader' => 'Self-determination',

      /* New */ /* Participation table headers */
      'userIdHeader' => 'User ID',
      'physicalFunctionsResultsHeader' => 'Physical functions results',
      'cognitiveFunctionsResultsHeader' => 'Cognitive functions results',
      'relationshipResultsHeader' => 'Relationship results',
      'emotionsResultsHeader' => 'Emotions results',
      'participationResultsHeader' => 'Participation results',
      'wellbeingResultsHeader' => 'Well being',
      'accidentResultsHeader' => 'Accidents',
      'qualityOfLifeResultsHeader' => 'Quality of life',

];