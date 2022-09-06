<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uploads</title>
</head>
<body>
    <?php

        //get filename of uploaded file
        $filename = $_FILES['file']['name'];

        //choose where to save the file
        $location = "memes/" .$filename;

        //save uploaded file to file system
        if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) 
        {
            echo '<p>File uploaded successfully.</p>';
        } else 
        {
            echo '<p>Error uploading file.</p>';
        }

    ?> 
    
</body>
</html>

<?php

header("Location: index.php");
die;