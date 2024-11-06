<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bonheur+Royale&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
        body{ 
            background-color: #E6E6E6;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            
        }   
        h1 {
            font-size: 3em;
            color: #44576D;
            cursor: pointer;
            font-weight: 150;
            font-style: normal;
            position: relative;
            font-size: 6em;
            margin: 0;
            font-family: "Bonheur Royale", serif;
            font-style: normal;
            font-weight: 150;
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
    <div>
        <p>Login Form:</p>
        <select name="" id="">Login / Signup</select>
        <form action="login">Login Here</form>
        <input type="Username">Username
        <input type="Password">Password
        <button>Submit</button> 
    </div>
</body>
</html>