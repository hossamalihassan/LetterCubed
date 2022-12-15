<?php 

    function change_user_profile_pic($user_id, $user_name, $conn) {
        if(empty($_FILES["profile_pic"]["name"])) return;

        $pic_path_info = pathinfo($_FILES["profile_pic"]["name"]);
        $pic_filename = $user_name . "-profile-picture." . $pic_path_info["extension"];
        $pic_tmpname = $_FILES["profile_pic"]["tmp_name"];
        $pic_folder = "../lettercubed/img/profile_pics/" . $pic_filename;

        $update_pic = "UPDATE users SET user_profile_img = '$pic_filename' WHERE user_id = $user_id;";

        if(mysqli_query($conn, $update_pic) && move_uploaded_file($pic_tmpname, $pic_folder)) {
            header("location: ../lettercubed/profile.php?user_name=$user_name");
        }
    }

?>