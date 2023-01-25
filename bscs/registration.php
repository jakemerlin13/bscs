<?php
include("connection.php");

$firstnameERR = $lastnameERR = $middleInitialERR = $contactERR = $studentIDERR = $genderERR = $usernameERR = $passwordERR = "";
$firstname = $lastname = $middleInitial = $contact = $studentID = $gender = $username = $password = "";

$acc = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST['firstname'])) {
    $firstnameERR = "* Firstname is required.";
    $acc = false;
  } else {
    $firstname = test_input($_POST["firstname"]);
  }

  if (empty($_POST['middleInitial'])) {
    $middleInitialERR = "* Middle Initial is required.*";
    $acc = false;
  } else {
    $middleInitial = test_input($_POST["middleInitial"]);
  }

  if (empty($_POST['lastname'])) {
    $lastnameERR = "* Lastname is required.*";
    $acc = false;
  } else {
    $lastname = test_input($_POST["lastname"]);
  }

  if (empty($_POST['gender'])) {
    $genderERR = "* Select gender.*";
    $acc = false;
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST['contact'])) {
    $contactERR = "* Contact Number is required.*";
    $acc = false;
  } else {
    $contact = test_input($_POST["contact"]);
  }

  if (empty($_POST['studentID'])) {
    $studentIDERR = "* Student ID is required.*";
    $acc = false;
  } else {
    $studentID = test_input($_POST["studentID"]);
  }

  if (empty($_POST['username'])) {
    $usernameERR = "* Student ID is required.*";
    $acc = false;
  } else {
    $username = test_input($_POST["username"]);
  }

  if (empty($_POST['password'])) {
    $passwordERR = "* password is required.*";
    $acc = false;
  } else {
    $password = test_input($_POST["password"]);
  }
  if ($acc) {

    $sql = "INSERT INTO `user`(`firstname`, `middle_initial`, `lastname`, `gender`, contact_number, student_id) VALUES ('$firstname','$middleInitial','$lastname','$gender','$contact','$studentID')";
    $user = mysqli_query($con, $sql);
    $userID = mysqli_insert_id($con);

    $jsql = "INSERT INTO `login`( `userID`, `username`, `password`) VALUES ('$userID','$username','$password')";
    $login = mysqli_query($con, $jsql);

    echo "<script> alert('registered successfully');window.location='index.php'</script>";
  }
}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/445aa1d2b6.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <title>Document</title>
</head>

<body>
  <div class=" bg-no-repeat bg-cover h-screen w-screen fixed" style="background-image: url(img/background1.jpg)">

    <a href="index.php">
      <button class="absolute text-4xl mt-4 ml-16 rounded-full bg-sky-700 hover:bg-blue-700 text-sky-200 font-bold py-2 px-8 border border-none">
        <i class="fa-solid fa-left-long"></i>
      </button>
    </a>
    <div class="text-center">
      <h1 class=" text-9xl text-cyan-400" style="font-size:250px; font-family: 'Rubik Mono One', sans-serif; text-shadow: 20px 20px black;">BSCS</h1>
      <h5 class="text-cyan-400" style="font-size: 50px; font-family: 'Rubik Mono One', sans-serif; text-shadow: 12px 8px black;">Create Your Account</h5>
    </div>

    <div class="block p-6 rounded-lg shadow-lg bg-white max-w-md mx-auto mt-8">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="grid grid-cols-2 gap-4">
          <div class="form-group mb-6">
            <input name="firstname" id="firstname" type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-describedby="emailHelp123" placeholder="First name">
            <div class="text-center mt-2">
              <span class="text-red-600 text"><?php echo " " . $firstnameERR; ?></i></span>
            </div>

          </div>
          <div class="form-group mb-6">
            <input name="lastname" id="lastname" type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-describedby="emailHelp124" placeholder="Last name">
            <div class="text-center mt-2">
              <span class="text-red-600 text"><?php echo " " . $lastnameERR; ?></span>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div class="form-group mb-6">
            <input name="middleInitial" id="middleInitital" type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-describedby="emailHelp123" placeholder="Middle initial">
            <div class="text-center mt-2">
              <span class="text-red-600 text"><?php echo " " . $middleInitialERR; ?></span>
            </div>
          </div>

          <div class="form-group mb-6">
            <input name="contact" id="contact" type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-describedby="emailHelp124" placeholder="Contact number">
            <div class="text-center mt-2">
              <span class="text-red-600 text"><?php echo " " . $contactERR; ?></i></span>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div class="form-group mb-6">
            <input name="studentID" id="studentID" type="text" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-describedby="emailHelp123" placeholder="Student ID">
            <div class="text-center mt-2">
              <span class="text-red-600 text"><?php echo " " . $studentIDERR; ?></i></span>
            </div>
          </div>

          <div class="form-group mb-6">
            <select name="gender" id="gender" class=" block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-describedby="emailHelp124">
              <option value="">Choose Gender</option>
              <?php
              $bsql = "SELECT `gender` FROM `gender`";
              $gender = mysqli_query($con, $bsql);
              while ($row = mysqli_fetch_assoc($gender)) :;
              ?>
                <option value="<?php echo $row['gender'] ?>"><?php echo $row['gender']; ?></option>
              <?php endwhile; ?>
            </select>

            <div class="text-center mt-2">
              <span class="text-red-600 text"><?php echo " " . $genderERR; ?></i></span>
            </div>
          </div>
        </div>

        <div class="form-group mb-6">
          <input name="username" id="username" type="text" class="text-center form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Create Username">
          <div class="text-center mt-2">
            <span class="text-red-600 text"><?php echo " " . $usernameERR; ?></i></span>
          </div>
        </div>

        <div class="form-group mb-6">
          <input name="password" id="password" type="password" class="text-center form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Create Password">
          <div class="text-center mt-2">
            <span class="text-red-600 text"><?php echo " " . $passwordERR; ?></i></span>
          </div>
        </div>

        <div class="flex justify-center">
          <div class="mb-3 w-96">
            <button onclick="register()" type="submit" name="submit" id="submit" class=" w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Register</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</body>

</html>