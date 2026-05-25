<?php
include('../includes/header.php');
include('../includes/functions.php');

// Only admin or super_admin
if(!in_array($_SESSION['role'], ['admin','super_admin'])){
    die("Access Denied");
}

// Handle Upload
if(isset($_POST['submit'])){

    $folder_id = intval($_POST['folder_id']);

    $stmt = $conn->prepare("SELECT folder_name FROM folders WHERE id=?");
    $stmt->bind_param("i",$folder_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 0){
        $error = "Invalid Folder Selected.";
    } else {

        $folder = $result->fetch_assoc()['folder_name'];

        if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){

            $file = $_FILES['file'];
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            $stored_name = uniqid().".".$ext;
            $uploadDir = "../uploads/".$folder;

            if(!file_exists($uploadDir)){
                mkdir($uploadDir,0777,true);
            }

            $uploadPath = $uploadDir."/".$stored_name;

            if(move_uploaded_file($file['tmp_name'],$uploadPath)){

                $insert = $conn->prepare("INSERT INTO files(folder_id,file_name,stored_name,uploaded_by)
                                          VALUES(?,?,?,?)");

                $insert->bind_param("issi",
                    $folder_id,
                    $file['name'],
                    $stored_name,
                    $_SESSION['user_id']
                );

                $insert->execute();

                logActivity(
                    $conn,
                    $_SESSION['user_id'],
                    "Upload File",
                    "Uploaded file '".$file['name']."' in folder '".$folder."'"
                );

                $success = "File Uploaded Successfully!";
            } else {
                $error = "Upload Failed.";
            }

        } else {
            $error = "No file selected.";
        }
    }
}
?>

<div class="card p-4 shadow">
<h4>Upload File</h4>
<hr>

<?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
<?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

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

<button type="submit" name="submit" class="btn btn-primary">Upload</button>

</form>
</div>

<?php include('../includes/footer.php'); ?>