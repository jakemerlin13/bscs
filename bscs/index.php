<?php
include("connection.php");
session_start();
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT `username`, `password` FROM `login` WHERE username = '$username' AND password = '$password'";
    $login = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($login);
    $total = $login->num_rows;

    if ($total > 0) {

        $_SESSION['id'] = $row['loginID'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        echo header("Location: dashboard.php");
    }else{
        $error = "Incorrect Username or Password";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/445aa1d2b6.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class=" bg-no-repeat bg-cover h-screen w-screen fixed" style="background-image: url(img/background1.jpg)">
        <div class="text-center">
            <h1 class=" text-9xl text-cyan-400" style="font-size:300px; font-family: 'Rubik Mono One', sans-serif; text-shadow: 24px 24px black;">BSCS</h1>
            <h5 class="text-cyan-400" style="font-size: 50px; font-family: 'Rubik Mono One', sans-serif; text-shadow: 12px 8px black;">Bachelor of Science in Computer Science</h5>
        </div>
        <img class="absolute left-48 bottom-40" src="img/computer with webcam1.png" alt="" width="400">
        <img class="absolute right-36 bottom-40" src="img/computer.png" alt="" width="400">
        <img class="absolute left-4 top-4" src="img/UdD-Logo.original.png" alt="" width="180">
        <img class="absolute right-0 top-0" src="img/site.png" alt="" width="140">
        <img class="absolute top-28 right-0" src="img/comscie logo.png" alt="" width="150">

        <form class="w-full max-w-sm mx-auto mt-20" method="post">
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        <i class="fa-sharp fa-solid fa-circle-user text-3xl text-black"></i>
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="username" id="username" class=" bg-gray-200 appearance-none border-2 border-gray-200 rounded-2xl w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Username">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                        <i class="fa-solid fa-lock text-3xl text-black ml-0"></i>
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="password" id="password" class=" bg-gray-200 appearance-none border-2 border-gray-200 rounded-2xl w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white" type="password" placeholder="Password">
                </div>
            </div>
            <?php if(isset($error)){?>

                <div class="text-red-900 text-right mr-20 mb-3"><i class="fa-solid fa-circle-exclamation"></i><?php echo " ".$error;?></div>
                <?php }?>
            <div class="md:flex md:items-center mb-4 text-center">
                <div class="md:w-1/5"></div>
                <div class="md:w-2/3">
                    <button name="submit" id="submit" class="mr-20 shadow bg-sky-500 hover:bg-sky-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-24 rounded" type="submit">
                        Login
                    </button>
                </div>
            </div>

            <div class="md:flex md:items-center text-center">
                <div class="md:w-1/5"></div>
                <div class="md:w-2/3">
                    <a href="registration.php">
                        <button class="mr-6 shadow bg-sky-900 hover:bg-sky-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-20 rounded" type="button">
                            Sign Up
                        </button>
                    </a>
                </div>
            </div>
        </form>
    </div>


</body>

</html>