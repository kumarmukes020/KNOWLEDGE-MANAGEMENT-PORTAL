<?php
include('../includes/header.php');
include('../includes/functions.php');

// Allow only super admin
if($_SESSION['role'] != 'super_admin'){
    die("Access Denied");
}

if(isset($_POST['submit'])){

    $folder_name = trim($_POST['folder_name']);

    // Clean folder name (security)
    $folder_name = preg_replace('/[^A-Za-z0-9_\-]/','', $folder_name);

    if(empty($folder_name)){
        $error = "Folder name is required.";
    } else {

        $folderPath = "../uploads/" . $folder_name;

        if(!file_exists($folderPath)){
            mkdir($folderPath, 0777, true);
        } else {
            $error = "Folder already exists.";
        }

        if(!isset($error)){

            $stmt = $conn->prepare("INSERT INTO folders(folder_name) VALUES (?)");
            $stmt->bind_param("s", $folder_name);
            $stmt->execute();

            logActivity(
                $conn,
                $_SESSION['user_id'],
                "Create Folder",
                "Created folder '$folder_name'"
            );

            $success = "Folder Created Successfully!";
        }
    }
}
?>

<div class="card p-4 shadow">
    <h4>Add Folder (Super Admin)</h4>
    <hr>

    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

    <form method="POST">

        <div class="mb-3">
            <label>Folder Name</label>
            <input type="text" name="folder_name" class="form-control"
                   required placeholder="Example: Reports">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">
            Create Folder
        </button>

        <a href="dashboard.php" class="btn btn-secondary">Back</a>

    </form>
</div>

<?php include('../includes/footer.php'); ?>