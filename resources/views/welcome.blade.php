<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        @font-face {
            font-family: 'sfpro';
            src: url(..\htdocs\past\detik\ctarsa\assets\font\sfpro.ttf);
        }
        /* Your existing styles */

        /* Additional styles */
        /* Additional styles */
        .image-section {
            border-radius: 10px; 
            width: 50%;
            height: 100vh;
            background-image: url('https://www.mhskids.org/wp-content/uploads/milton-hershey-school-academics-senior-division-students.jpg');
            background-size: cover;
            background-position: center;
        }

        /* You can adjust the width and padding as needed */
        .form-section {
            width: 50%;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        

        body {
            margin: 0;
            padding: 0;
            font-family: 'sfpro', 'Times New Roman';
            background: #F4FBFF;
        }

        .container {
            display: flex;
            align-items: flex-start;
        }

        .header {
            height: 100px;
            background-color:  dodgerblue;
            display: flex;
            align-items: center;
            padding: 10px;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .header img {
            height: 100px; 
            margin-right: 20px; 
        }

        .header nav {
            flex-grow: 1; 
            font-family: 'calibri';
            align-items: center;
            font-size: 150%;
            font-weight: bold;
        }

        .header ul {
            list-style: none;
            margin: 0;
            align-items: center;
            padding: 0;
            display: flex;
            justify-content: flex-end;
        }

        .header li {
            margin-left: 40px; 
        }

        .header li:last-child {
            margin-right: 0; 
        }

        .header a {
            text-decoration: none;
            color: white;
        }

        .header a:hover {
            font-size: larger;
        }

        .register-button {
            font-family: 'calibri';
            font-size: 100%;
            font-weight: bold;
            background-color: white;
            color: orange; 
            border: none;
            border-radius: 30px; 
            padding: 15px 30px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
        }

        .register-button:hover {
            background-color: orange; 
            color: white; 
        }

        .section1 {
            background-color: #f9f9f9; 
            padding: 80px 0; 
            position: relative;
            height: 100vh; 
            overflow: hidden;
            display: flex; 
            flex-direction: column; 
            flex: 1;
            box-sizing: border-box;
        }

        .section1::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 300px;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 50%, #f0f0f0 100%);
        }

        .image-container {
            position: absolute;
            top: 0;
            left: 0;
            flex: 1;
            width: 100%;
            height: 100%; 
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .content {
            position: absolute;
            top: 46%; 
            left: 46%; 
            transform: translate(-50%, -50%); 
            text-align: center;
        }

        .flying-text { 
            text-shadow: 0px 4px 10px orange;
            color: whitesmoke; 
            font-family: 'sfpro', sans-serif;
            animation: flyingAnimation 3s infinite;
            font-size: larger;
        }

        .cta-button {
            background-color: rgb(110, 102, 161); 
            color: white; 
            padding: 15px 30px; 
            font-size: 18px; 
            font-weight: bolder;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
            position: relative;
            z-index: 1; 
        }

        .cta-button:hover {
            background-color: darkslateblue; 
        }

        @media (max-width: 767px) {
            .content {
                padding: 10px;
            }
            
            .flying-text {
                font-size: 32px; 
            }
            
            .cta-button {
                padding: 10px 20px; 
                font-size: 16px; 
            }
        }

    </style>
</head>
    <body class="antialiased">
    <div class="header">
        <img src="https://i.ibb.co/Gcc0yhH/st-small-507x507-pad-600x600-f8f8f8-removebg-preview.png" alt="Your Logo">
        <nav>
            <ul>
                 <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}"><button class="register-button">Register</button></a></li>
            </ul>
        </nav>
    </div>

    <section class="section1" id="section1">
        <div class="image-container">
            <img src="https://i.ibb.co/yVgs3mg/dccc96d88c2e4b9c1183b871b83d9f82.jpg" alt="Your Image">
        </div>
        <div class="content">
            <p class="flying-text" style="font-size: 24px;">Welcome to our school registration system !</p>
            <h1 class="flying-text" style="font-size: 48px;  font-weight: 900; font-family: sans-serif;">WATERTOWN SCHOOL 2023</h1>
            <p class="flying-text" style="font-size: 18px;"> School period starts soon. Make your registration now.</p>
        </div>
    </section>

    <!-- JavaScript (if needed) -->
    <script src="script.js"></script>
</body>
</html>

