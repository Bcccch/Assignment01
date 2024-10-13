<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web Programming :: Assignment 01">
    <meta name="keywords" content="Web, Programming">
    <meta name="author" content="Nguyen Ha Bach">
    <link rel="stylesheet" href="style.css">
    <title>COS30020-Advanced Web Development-Assignment01</title>
</head>

<body>
    <?php
    function cleanInput($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $errMsg = "";

    if (isset($_GET['title'])) {
        $title = cleanInput($_GET['title']);
        if (empty($title)) {
            $errMsg .= "<li><span class='error'>Please Enter Title ! </span></li>";
        }
    }

    $titleValidation = "/^[a-zA-Z0-9 ,.!]{1,20}$/";

    if (isset($title) && !preg_match($titleValidation, $title)) {
        $errMsg .= "<li><span class='error'>Please Enter Correct Format - Maximum of 20 Characters !</span></li>";
    }

    if (!empty($errMsg)) {
        echo "
            <div class='center'>
                <fieldset>
                    <ul>
                        $errMsg
                    </ul>
                </fieldset>
                <div class='footer-link'>
                    <a href='searchjobform.php'>Try Again</a>
                    <a href='index.php'>Return To Home Page</a>
                </div>
            </div>";
    } else {
        echo "<h1>Title: " . (isset($title) ? $title : "No title provided") . "</h1>";
        echo "<a href='searchjobform.php'>Search Another Job</a><br><br>";
        echo "<a href='index.php'>Return to Home Page</a>";
    }
    ?>
</body>

</html>