<?php 
include('../includes/header.php');
include('../includes/functions.php');

if(isset($_POST['submit'])){

    $folder_name = preg_replace('/[^A-Za-z0-9_\-]/','',$_POST['folder_name']);

    if(empty($folder_name)){
        echo "<div class='alert alert-danger'>Folder name required</div>";
    } else {

        $path = "../uploads/".$folder_name;

        if(!file_exists($path)){
            mkdir($path,0777,true);

            $stmt = $conn->prepare("INSERT INTO folders(folder_name,created_by)
                                    VALUES(?,?)");

            $stmt->bind_param("si",$folder_name,$_SESSION['user_id']);
            $stmt->execute();

            echo "<div class='alert alert-success'>Folder Created</div>";

        } else {
            echo "<div class='alert alert-warning'>Folder already exists</div>";
        }
    }
}
?>

<h4>Add Folder</h4>

<form method="POST">
    <input type="text" 
           name="folder_name" 
           class="form-control mb-3" 
           placeholder="Folder Name" 
           required>

    <button class="btn btn-primary" name="submit">
        Create
    </button>
</form>

<?php include('../includes/footer.php'); ?>