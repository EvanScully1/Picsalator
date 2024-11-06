<?php
    if (isset($_POST['submit'])) {
        $db = new SQLite3('picsalator.db');
        $file = $_FILES['file'];
         
        //check if file is uploaded
        if(isset($file) && $file['error'] === 0) {
            $fileName = basename($file['name']);
            $uploadDirectory = 'uploads/'; // directory for uploaded images
            $filePath = $uploadDirectory . $fileName;

            // create an uploads directory if it does not already exist.
            // 0755: Allows the web server (owner) to read, write, and execute in the directory. ((owner permiss.) 7 =read(4)+write(2)+execute(1), (group,others permiss.) 5 =read(4)+execute(1))
            if(!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true);
            }

            // check file upload type
            // accepted types: jpg, jpeg, png, gif
            // found out how to do this using https://www.php.net/manual/en/function.pathinfo.php
            // from same source: "PATHINFO_EXTENSION (int):The extension of the file."
            $fileType = pathinfo($filePath, PATHINFO_EXTENSION);
            $acceptedTypes = array('jpg', 'jpeg', 'png', 'gif');
            // if accepted type, move images to the directory db folder "images" in picsalator 
            if(in_array(strtolower($fileType), $acceptedTypes)) {
                if(move_uploaded_file($file['tmp_name'], $filePath)) {
                    $statement = $db->prepare(
                            "INSERT into images (filename, filepath) 
                            VALUES (:filename, :filepath)");
                    $statement->bindValue(':filename', $fileName, SQLITE3_TEXT);
                    $statement->bindValue(':filepath', $filePath, SQLITE3_TEXT);

                    if ($statement->execute()) {
                        echo "image uploaded/saved successfully.";
                    } else {
                        echo "image insertion failure.";
                    }
                } else {
                    echo "failed to upload image.";
                }
            } else {
                echo "not an accepted image file type (only jpg, jpeg, png, gif).";
            }
        } else {
            echo "please select an image to upload.";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Images</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bonheur+Royale&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
        body {
            background-color: #E6E6E6;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
        }
        h1 {
            font-size: 3em;
            color: #44576D;
            cursor: pointer;
            font-family: "Bonheur Royale", serif;
            font-weight: 400;
            font-style: normal;
            font-weight: 150;
            font-style: normal;
            position: relative;
            font-size: 6em;
            margin: 0;
        }
        .header {
            display: flex;
            justify-content: space-between; 
            align-items: center; 
            padding: 10px 20px; 
            margin-bottom: 2.5em;
        }
        
        .header nav ul {
            list-style: none;  
            display: flex;  
            gap: 25px;   
            margin: 0;  
            padding: 0;
            font-weight: 400;
            font-style: normal; 
            text-transform: uppercase;
        }

        .header nav ul li a {
            color: inherit; 
            text-decoration: none; 
        }


        .header #login-btn {
            /* Colors: #29353C #44576D #768A96 #AAC7D8 #DFEBF6 #E6E6E6 */
            color: #ff3737;
            text-decoration: none;
            border: none;
            background-color: #44576D;
            padding: 10px;
            font-weight: 500;
            padding-inline: 20px;
            border-radius: 10px;

        }

        .header #login-btn:hover {
            cursor: pointer;
            opacity: 85%;
        }


        #logo-img {
            align-items: center;
            margin-left: 5em;
        }

        #logo-img:hover {
            cursor: pointer;
            opacity: 75%;
        }
    </style>
</head>
<body>
<div class="header">
        <h1 class="text-container">Picsalator</h1>
        <img src="logo.jpg" alt="error loading logo" id="logo-img" width="50px" height="50px">
        <nav>
            <ul>
                <li><a href="client.html">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="upload.php">Upload</a></li>
                <li><a id="login-btn" href="login.php">login</a></li>
            </ul>
        </nav>
    </div>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="file">Choose a file to upload:</label>
        <input type="file" name="file" id="file" accept="image/*" required>
        <button type="submit" name="submit">Upload Image</button>
    </form>
    <?php
        // Connect to SQLite database
        $db = new SQLite3('picsalator.db');

        // Fetch images from the database
        $result = $db->query("SELECT * FROM images");

        // copilot generated to display photos from the database's table 'image'
        echo '<div class="images"><div class="row">';
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo '<div class="image-container">';
            echo '<img src="' . $row['filepath'] . '" alt="' . htmlspecialchars($row['filename']) . '" class="home-img">';
            echo '<button class="share-btn">Share</button>';
            echo '<button class="delete-img-btn">Delete</button>';
            echo '</div>';
        }
        echo '</div></div>';
    ?>
</body>
</html>