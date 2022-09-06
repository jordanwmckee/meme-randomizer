<?php
//create meme array of names
$GLOBALS['meme_list'] = array();

$path = './memes';
//pushing names from memes file into array
if ($fh = opendir($path)) {
    while (($entry = readdir($fh)) !== false) {
        if ($entry != "." && $entry !=  "..")
        array_push($meme_list, $entry);
    }
}

//setting initial meme
$index = rand(0, sizeof($meme_list)-1);
$meme = $meme_list[$index];

//if button is pressed, a new meme appears
if(isset($_POST['refresh-meme'])) {
    global $meme_list;
    $index = rand(0, sizeof($meme_list)-1);

    $meme = $meme_list[$index];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Memer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">
        <div id="image-shower">
            <img id="meme" src="./memes/<?php echo $meme ?>" alt="Press for a MEMER">
        </div>
        <div id="button-container">
            <div class="button-top">
                <form method="post">
                    <input type="submit" name="refresh-meme" value="Next MEME" class="btn">    
                </form>
            </div>
            <div class="button-bottom">
                <form method="post" action="upload.php" enctype="multipart/form-data" id="upload_action">
                    <label for="input" class="btn">Upload MEME</label>
                    <input type="file" name="file" id="input"><input type="submit" id="input"> 
                    <script type="text/javascript">
                        document.getElementById("upload_action").onchange = function() {
                        document.getElementById("upload_action").submit();
                    };
                    </script>  
                </form>
            </div>
        </div>
    </div>
    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    #container{
        flex-direction: column;
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
    }
    img{
        height: 100%;
        width: auto;
        object-fit: fit;
    }
    .btn{
        margin-top: 20px;
        text-align: center;
        width: 220px;
        display: block;
        cursor: pointer;
        padding: 10px 20px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: .1rem;
        border: 2px solid crimson;
        color: crimson;
        background-color: transparent;
        border-radius: 5px;
        transition: 0.1s ease rotateZ;
    }
    .btn:hover{
        background-color: crimson;
        color: white;
        transform: rotatez(5deg);
    }
    .btn:active{
        transform: rotateZ(-5deg);
    }
    #button-container{
        flex-direction: row;
    }
    #button-container .button-bottom input{
        display: none;
    }
    #image-shower{
        height: 20vh;
        box-shadow: 0px 0px 22px 0 gray;
        transition: 0.3s ease box-shadow;
    }
    #image-shower:hover{
    box-shadow: 0px 0px 8px 0 gray;
    }

    @media only screen and (min-width: 768px){
        #image-shower{
            height: 30vh;
        }
        .btn{
            font-size: 20px;
            width: 270px;
        }
    }
    @media only screen and (min-width: 1200px){
        #image-shower{
            height: 50vh;
        }
        .btn{
            font-size: 25px;
            width: 320px;
        }
    }
    </style>
</body>
</html>
