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
    <h1>Job Vacancy Posting System</h1>

    <form action="postjobprocess.php" method="POST">
        <div>
            <label for="positionId">Position ID: </label>
            <input type="text" name="positionId" id="positionId" required>
        </div>
        
        <div>
            <label for="title">Title: </label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="description">Description: </label>
            <textarea name="description" id="description" cols="40" rows="5" required></textarea>
        </div>

        <div>
            <label for="closingDate">Closing date: </label>
            <input type="text" name="closingDate" id="closingDate" value="<?php echo date('d/m/y');?>" size="4" required>
        </div>

        <div>
            <p>Position: 
            <input type="radio" name="position" id="fullTime" value="fullTime">
            <label for="fullTime">Full Time</label>
            <input type="radio" name="position" id="partTime" value="partTime">
            <label for="partTime">Part Time</label></p>
        </div>

        <div>
            <p>Contract: 
            <input type="radio" name="contract" id="onGoing" value="onGoing">
            <label for="onGoing">On-going</label>
            <input type="radio" name="contract" id="fixedTerm" value="fixedTerm">
            <label for="fixedTerm">Fixed Term</label></p>
        </div>

        <div>
            <p>Application by: 
            <input type="checkbox" name="applicationMethod[]" id="postCheckbox" value="post">
            <label for="postCheckbox">Post</label>
            <input type="checkbox" name="applicationMethod[]" id="emailCheckbox" value="email">
            <label for="emailCheckbox">Email</label></p>
        </div>

        <div>
            <label for="location">Location: </label>
            <select name="location" id="location">
                <option disabled selected>---</option>
                <option value="ACT">ACT</option>
                <option value="NSW">NSW</option>
                <option value="NT">NT</option>
                <option value="QLD">QLD</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="VIC">VIC</option>
                <option value="WA">WA</option>
            </select>
        </div>

        <div>
            <input type="submit" value="Post">
            <input type="reset" value="Reset">
        </div>
    </form>
    <p class="footer"><a href="index.php">Return to Home Page</a></p>
    
</body>
</html>