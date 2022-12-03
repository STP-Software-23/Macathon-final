<?php






    $file = $_FILES['cv'];
    //print_r($file);
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // get the extension of the file to filter
    $fileExt = explode('.' , $fileName);
    // extension is the second (last) piece of data
    $fileActualExt = strtolower(end($fileExt));

    $allowed = [
        'pdf'
    ];

    // Check if extension is inside array
    if(in_array($fileActualExt , $allowed)){

        if($fileError === 0){

            if($fileSize > 10000){
                // actual upload here
                // create a unique id to avoid file replacement
                $fileNameNew = uniqid('' , true) . "-". $fileExt[0] . "." .$fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;

                //upload the file to server folder
                move_uploaded_file($fileTmpName , $fileDestination);
                echo "<script> alert('Success')</script>";



            }else{
                echo "<script> alert('Your file is too big')</script>";

            }

        }else{
            echo "<script> alert('Error during upload')</script>";

        }

    }else{
         echo "<script> alert('You can't upload a file of this type')</script>";

    }


?>