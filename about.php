<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web Programming :: Asignment 01">
    <meta name="keywords" content="Web, Programming">
    <meta name="author" content="Nguyen Ha Bach">
    <link rel="stylesheet" href="style.css">
    <title>COS30020-Advanced Web Development-Assignment01</title>
</head>

<body>
    <div class="header">
        <h1>Job Vacancy Posting System</h1>
    </div>
    <h1>About This Asignment</h1>
    <p>This is a PHP webpage for presenting what I have done during the asignment 01.</p>
    <p>Req.1. List your answers in bullet point for each question. The requirements are as follow:</p>
    <ul>
        <li>What is the PHP version installed in mercury? (Use PHP function to generate this answer)</li>
        <?php
            $version = phpversion();
            echo $version;
        ?>
        <li>What tasks you have not attempted or not completed?</li>
        <p>I have tried all the tasks in the assignment, expect the last two tasks.</p>
        <li>What special features have you done, or attempted, in creating the site that we should
        know about?</li>
        <p>I have completed most of the features listed in the requirements. I also tried to make the UI better by using CSS. There are more features I want to implemented but the deadline was too close.</p>
    </ul>

    <p>Req. 2. Provide a screen shot for the following:</p>
    <ul>
        <li>What discussion points did you participated on in the unit’s discussion board for
        Assignment 1? If you did not participate, state your reason.</li>
        <p>I have discussed a bit with the lecturer about the progress of the assignment in class.</p>
    </ul>

    <p>Provide a link to return to the Home page.</p>
    <a href="index.php">Return To Home Page</a>
</body>

</html>