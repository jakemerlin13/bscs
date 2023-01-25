<?php
include("connection.php");
$id = $_GET['ID'];

$sql = "SELECT * FROM `user` WHERE userID = $id";
$user = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($user);

$bsql = "SELECT * FROM `image` WHERE userID = $id";
$image = mysqli_query($con, $bsql);
$img = mysqli_fetch_assoc($image);

$csql = "SELECT * FROM `background` WHERE userID = $id";
$background = mysqli_query($con, $csql);
$cover = mysqli_fetch_assoc($background);

if (isset($_FILES["coverImg"]["name"])) {
    $ids = $_POST["ids"];

    $src = $_FILES["coverImg"]["tmp_name"];
    $imageName = uniqid() . $_FILES["coverImg"]["name"];

    $target = "background/" . $imageName;

    move_uploaded_file($src, $target);

    $squery = "SELECT * FROM `background` WHERE  userID = $ids";
    $select = mysqli_query($con, $squery);
    $rows = mysqli_fetch_all($select);

    if ($rows) {
        $query = "UPDATE `background` SET `bgimage`='$imageName' WHERE  userID = $ids";
        mysqli_query($con, $query);
        echo header("Location: profile.php?ID={$id}");
    } else {
        $query = "INSERT INTO `background`(`userID`, `bgimage`) VALUES ('$ids','$imageName')";
        mysqli_query($con, $query);
        echo header("Location: profile.php?ID={$id}");
    }
}

if (isset($_FILES["fileImg"]["name"])) {
    $ids = $_POST["id"];

    $src = $_FILES["fileImg"]["tmp_name"];
    $imageName = uniqid() . $_FILES["fileImg"]["name"];

    $target = "imgs/" . $imageName;

    move_uploaded_file($src, $target);

    $squery = "SELECT * FROM `image` WHERE userID = $ids";
    $select = mysqli_query($con, $squery);
    $rows = mysqli_fetch_all($select);

    if ($rows) {
        $query = "UPDATE `image` SET image = '$imageName' WHERE userID = $ids";
        mysqli_query($con, $query);
        echo header("Location: profile.php?ID={$id}");
    } else {
        $query = "INSERT INTO `image`(`userID`, `image`) VALUES ('$ids','$imageName')";
        mysqli_query($con, $query);
        echo header("Location: profile.php?ID={$id}");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/445aa1d2b6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>

    <div class="container">
        <div class="relative card border w-96 hover:shadow-none relative flex flex-col w-screen h-screen shadow-lg">
            <a href="dashboard.php" class="absolute z-10">
                <img class="hover:text-gray-700 hover:opacity-90" src="img/comscie logo.png" alt="" width=120>
            </a>
            <!-- upload background photo -->
            <form action="" id="forms" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="ids" id="ids" value="<?php echo $row['userID']; ?>">
                <img id="cover" class="max-h-96 w-screen absolute top-0 object-fit" style="z-index:-1" src="background/<?php echo $cover['bgimage']; ?>" alt="" />

                <div  class="absolute top-2 right-5 text-white text-5xl">
                    <div id="uploads">
                        <label for="coverImg"><i class="fa-sharp fa-solid fa-camera-retro text-white hover:opacity-60" style=" -webkit-text-stroke-width:2px; -webkit-text-stroke-color:black;"></i></label>
                        <input type="file" name="coverImg" id="coverImg" style="display: none;" accept=".jpg, .jpeg, .png" >
                    </div>

                    <div class="flex space-x-2">                
                    <div id="confirmed" class="text-white text-green-600 hover:opacity-90" style="display: none;">
                            
                            <button type="submit" ><i class="fa-solid fa-circle-check bg-white rounded-full"></i> </button>
                        </div>

                        <div id="cancels" class="text-white text-red-600 hover:opacity-90" style="display: none;">
                            <i class="fa-sharp fa-solid fa-circle-xmark bg-white rounded-full"></i>
                        </div>

                    </div>
                </div>
            </form>


            <div class="profile w-full flex m-3 ml-4 text-white">
                <!-- upload profile -->
                <form class="relative" action="" id="form" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="id" id="id" value="<?php echo $row['userID']; ?>">
                    <div class="relative ml-16 mt-4">
                        <img id="image" class="w-80 h-80 p-1 bg-white rounded-full" src="imgs/<?php echo $img['image']; ?>" alt="" />
                    </div>

                    <div id="upload" class="absolute right-0 bottom-0 text-5xl hover:opacity-90 text-sky-500 bg-slate-200 rounded-full p-3">
                        <label for="fileImg"><i class="fa-sharp fa-solid fa-camera-retro"></i></label>
                        <input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png" style="display: none;">
                    </div>

                    <div id="cancel" class="absolute bottom-0 text-5xl right-0 text-red-600 hover:text-red-500" style="display:none;">
                        <i class="fa-sharp fa-solid fa-circle-xmark bg-white rounded-full"></i>
                    </div>

                    <div id="confirm" class="absolute bottom-0 text-5xl left-16 text-green-600 hover:text-green-500" style="display:none;">
                        
                        <button type="submit"><i class="fa-solid fa-circle-check bg-white rounded-full"></i></button>
                    </div>
                </form>

                <div class="relative title mt-10 ml-6 font-bold flex flex-col">
                    <div class="text-7xl pt-4 pr-4 text-orange-100 name break-words" style="-webkit-text-stroke-width:2px; -webkit-text-stroke-color:black;"><?php echo strtoupper($row['firstname'] . ' ' . $row['middle_initial'] . ' ' . $row['lastname']) ?></div>
                    <div class="text-5xl text-gray-200 name break-words" style="-webkit-text-stroke-width:2px; -webkit-text-stroke-color:black;"><?php echo $row['gender']; ?></div>
                    <div class="text-5xl text-gray-200 name break-words" style="-webkit-text-stroke-width:2px; -webkit-text-stroke-color:black;"><?php echo $row['student_id']; ?></div>
                    <div class="text-5xl text-gray-200 name break-words" style="-webkit-text-stroke-width:2px; -webkit-text-stroke-color:black;"><?php echo $row['contact_number']; ?></div>
                </div>
            </div>
            <div class="buttons flex absolute bottom-0 font-bold right-0 text-xs text-gray-500 space-x-0 my-3.5 mr-3">
                <div class="add border rounded-l-2xl rounded-r-sm border-gray-300 p-1 px-4 cursor-pointer hover:bg-gray-700 hover:text-white">Contact</div>
                <!-- <div class="add border rounded-r-2xl rounded-l-sm border-gray-300 p-1 px-4 cursor-pointer hover:bg-gray-700 hover:text-white">Bio</div> -->
            </div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    document.getElementById("coverImg").onchange = function() {
        document.getElementById("cover").src = URL.createObjectURL(coverImg.files[0]); // Preview new image

        document.getElementById("confirmed").style.display = "block";
        document.getElementById("cancels").style.display = "block";

        document.getElementById("uploads").style.display = "none";
    }

    var coverImage = document.getElementById('cover').src;
    document.getElementById("cancels").onclick = function() {
        document.getElementById("cover").src = coverImage; // Back to previous image

        document.getElementById("confirmed").style.display = "none";
        document.getElementById("cancels").style.display = "none";

        document.getElementById("uploads").style.display = "block";
    }

    //Upload Profile
    document.getElementById("fileImg").onchange = function() {
        document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

        document.getElementById("cancel").style.display = "block";
        document.getElementById("confirm").style.display = "block";

        document.getElementById("upload").style.display = "none";
    }

    var userImage = document.getElementById('image').src;
    document.getElementById("cancel").onclick = function() {
        document.getElementById("image").src = userImage; // Back to previous image

        document.getElementById("cancel").style.display = "none";
        document.getElementById("confirm").style.display = "none";

        document.getElementById("upload").style.display = "block";
    }
</script>