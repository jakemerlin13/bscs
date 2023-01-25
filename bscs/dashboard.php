<?php
include("connection.php");
session_start();

$sql = "SELECT `userID`, `firstname`, `middle_initial`, `lastname`, `gender`, `contact_number`, `student_id` FROM `user` ORDER BY `lastname` ASC";
$user = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($user);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/445aa1d2b6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <div class="bg-no-repeat bg-cover h-full w-screen fixed" style="background-image: url(img/background1.jpg)">
        <a href="logout.php">
            <button class="mt-4 ml-4 rounded-full bg-sky-700 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700">
                <i class="fa-solid fa-power-off"></i>
            </button>
        </a>
        <div class="text-center">
            <h1 class=" text-9xl text-cyan-400" style="font-size:150px; font-family: 'Rubik Mono One', sans-serif; text-shadow: 15px 15px black;">BSCS</h1>
            <h5 class="text-cyan-400" style="font-size: 50px; font-family: 'Rubik Mono One', sans-serif; text-shadow: 12px 8px black;">Students List</h5>
        </div>
        <div class = "container mx-auto">
        <table id="example" class=" container display bg-amber-200" style=" width:100%">
            <thead>
                <tr class="">
                    <th>Studen ID</th>
                    <th>Firstname</th>
                    <th>Middle Initial</th>
                    <th>Lastname</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php do{?>
                <tr>
                    <td><?php echo $row['student_id'];?></td>
                    <td><?php echo $row['firstname'];?></td>
                    <td><?php echo $row['middle_initial'];?></td>
                    <td><?php echo $row['lastname'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['contact_number'];?></td>
                    <td><a href="profile.php?ID=<?php echo $row['userID'];?>">View</a></td>
                </tr>
                <?php }while($row = mysqli_fetch_assoc($user))?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Studen ID</th>
                    <th>Firstname</th>
                    <th>Middle Initial</th>
                    <th>Lastname</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>

</html>