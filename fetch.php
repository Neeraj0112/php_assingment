<form action="" method="post">
    <input type="email" name="email" placeholder="email">
    <input type="submit">
</form>

<?php

if(isset($_POST["email"])){
    $email = $_POST["email"];
    $directory = "uploads/"; // Specify the directory where the PDF files are stored
    $fileName = $email . ".pdf";
    $file = $directory . $email . ".pdf"; // Retrieve all files with .pdf extension in the directory
    
    if(file_exists($file)){
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=" . $fileName);

         // Read the file and output its contents
        readfile($file);
    }else{
        echo "Record not found";
    }

}

?>