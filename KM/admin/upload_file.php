<?php 
include('../includes/header.php');
include('../includes/functions.php');

if(isset($_POST['submit'])){

    $folder_id = intval($_POST['folder_id']);

    // Validate folder exists
    $stmt = $conn->prepare("SELECT folder_name FROM folders WHERE id=?");
    $stmt->bind_param("i",$folder_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 0){
        echo "<div class='alert alert-danger'>Invalid Folder</div>";
    } else {

        $folder = $result->fetch_assoc()['folder_name'];

        if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){

            $file = $_FILES['file'];

            // Allow all types (or restrict if needed)
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $stored_name = uniqid().".".$ext;

            $uploadDir = "../uploads/".$folder;

            if(!file_exists($uploadDir)){
                mkdir($uploadDir,0777,true);
            }

            $uploadPath = $uploadDir."/".$stored_name;

            if(move_uploaded_file($file['tmp_name'],$uploadPath)){

                $insert = $conn->prepare("
                    INSERT INTO files(folder_id,file_name,stored_name,uploaded_by)
                    VALUES(?,?,?,?)
                ");

                $insert->bind_param("issi",
                    $folder_id,
                    $file['name'],
                    $stored_name,
                    $_SESSION['user_id']
                );

                $insert->execute();

                echo "<div class='alert alert-success'>File Uploaded Successfully</div>";

            } else {
                echo "<div class='alert alert-danger'>Upload Failed</div>";
            }

        } else {
            echo "<div class='alert alert-danger'>Select a file</div>";
        }
    }
}
?>

<h4>Upload File</h4>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Select Folder</label>
<select name="folder_id" class="form-control" required>
<option value="">-- Select Folder --</option>

<?php
$folders = $conn->query("SELECT * FROM folders ORDER BY folder_name ASC");
while($row = $folders->fetch_assoc()){
    echo "<option value='".$row['id']."'>".$row['folder_name']."</option>";
}
?>

</select>
</div>

<div class="mb-3">
<label>Select File</label>
<input type="file" name="file" class="form-control" required>
</div>

<button class="btn btn-primary" name="submit">Upload</button>

</form>

<?php include('../includes/footer.php'); ?>