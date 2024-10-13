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

    function validateInput($field, $name, &$errMsg, $validationPattern = "", $isRequired = true, $customErrMsg = "")
    {
        if (isset($_POST[$field]) && !empty($_POST[$field])) {
            $input = cleanInput($_POST[$field]);
            if ($validationPattern && !preg_match($validationPattern, $input)) {
                $errMsg .= $customErrMsg ?: "$name is invalid.<br>";
                return null;
            }
            return $input;
        } elseif ($isRequired) {
            $errMsg .= "$name is required.<br>";
        }
        return null;
    }

    $errMsg = "";

    $positionId = validateInput('positionId', 'Position ID', $errMsg, "/^PID\d{4}$/", true, "Please Enter Correct Format - PIDxxxx (x = digit) ! <br>");
    $title = validateInput('title', 'Title', $errMsg, "/^[a-zA-Z0-9 ,.!]{1,20}$/", true, "Please Enter Correct Format - Maximum of 20 Characters ! <br>");
    $description = validateInput('description', 'Description', $errMsg, "/^.{1,250}$/", true, "Please Enter Correct Format - Maximum of 250 Characters ! <br>");
    $closingDate = validateInput('closingDate', 'Closing Date', $errMsg, "/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{2}$/", true, "Please Enter Correct Format - Date/Month/Year ! <br>");
    $position = validateInput('position', 'Position', $errMsg) === 'fullTime' ? 'full time' : 'part time';
    $contract = validateInput('contract', 'Contract', $errMsg) === 'onGoing' ? 'on-going' : 'fixed term';
    $applicationMethod = isset($_POST['applicationMethod']) ? $_POST['applicationMethod'] : [];
    $location = validateInput('location', 'Location', $errMsg);

    if ($errMsg) {
        echo "<div class='center'><fieldset><p class='error'>$errMsg</p></fieldset><div class='footer-link'><a href='postjobform.php'>Return to post job form</a><br><a href='index.php'>Home page</a></div></div>";
        exit;
    }

    $foldername = "data/jobposts";
    $filename = "$foldername/jobs.txt";
    umask(0007);

    if (!file_exists($foldername)) {
        mkdir($foldername, 02770);
    }

    $alldata = [];
    $newpost = true;

    if (file_exists($filename)) {
        $positionIdData = [];
        $handle = fopen($filename, "r");
        while (($onedata = fgets($handle)) !== false) {
            $data = explode("\t", $onedata);
            $alldata[] = $data;
            $positionIdData[] = $data[0];
        }
        fclose($handle);
        $newpost = !in_array($positionId, $positionIdData);
    }

    if (!$newpost) {
        echo "<div class='center'><fieldset><p class='error'>Please Enter Another ID - ID Already Exists.</p></fieldset><div class='footer-link'><a href='postjobform.php'>Return to post job form</a><br><a href='index.php'>Home page</a></div></div>";
    } else {
        $handle = fopen($filename, "a");
        $dataString = implode("\t", array_merge([$positionId, $title, $description, $closingDate, $position, $contract], $applicationMethod, [$location])) . "\n";
        fputs($handle, $dataString);
        fclose($handle);

        $newPostData = [$positionId, $title, $description, $closingDate, $position, $contract, $applicationMethod[0] ?? '', $applicationMethod[1] ?? '', $location];
        $alldata[] = $newPostData;

        echo "<table><tr><th>Position ID</th><th>Title</th><th>Description</th><th>Closing Date</th><th>Position</th><th>Contract</th><th>Application by</th><th>Location</th></tr>";
        echo "<tr><td>{$newPostData[0]}</td><td>{$newPostData[1]}</td><td>{$newPostData[2]}</td><td>{$newPostData[3]}</td><td>{$newPostData[4]}</td><td>{$newPostData[5]}</td><td>" . implode(", ", array_filter(array_slice($newPostData, 6, 2))) . "</td><td>{$newPostData[8]}</td></tr>";
        echo "</table>";

        echo "<p class='success'>Your Job Is Successfully Posted !</p>";
        echo "<div class='footer-link'><a href='postjobform.php'>Return to post job form</a><br><a href='index.php'>Home page</a></div>";
    }
    ?>
</body>

</html>