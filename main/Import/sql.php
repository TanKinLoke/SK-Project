<?php
    //SQL Login Details
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="Sistem_Aset_Bilik_iCreatorZ";

    //Create a connection
    $conn = new mysqli($servername,$username,$password,$dbname);

    //Check if the connection is successful or not
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the file into a variable
    $filename=$_FILES['csv']['tmp_name'];

    //Check if the file size is bigger than 0 or not, so that we know the file is empty or not
    if($_FILES['csv']['size'] > 0)
    {
        //Open the file by reading it, r means read, w means write
        $file = fopen($filename, "r");
        //Get the data from CSV file and convert into array
        fgetcsv($file);
        
        //Loop through all the data
        while (($getData = fgetcsv($file, 20000, ",")) !== FALSE)
        {
            //Check if data is exist in table or not
            $check="SELECT * from Aset_Info WHERE Aset_ID='".$getData[1]."'";
            $result = mysqli_query($conn, $check);

            if (mysqli_num_rows($result)!=0) {
                //If data is exist, just update it
                $query="UPDATE Aset_Info SET `Nama_Aset`='".$getData[0]."',`Aset_ID`='".$getData[1]."',`Jenis_Aset`='".$getData[2]."',`Bilangan`='".$getData[3]."' WHERE `Aset_ID`='".$getData[1]."';";

            } else {
                //If data doesn't exist, insert into database
                $query = "INSERT INTO Aset_Info (Nama_Aset,Aset_ID,Jenis_Aset,Bilangan) VALUES ('$getData[0]','$getData[1]','$getData[2]','$getData[3]');";
            }

            //Run the SQL code above
            $result = mysqli_query($conn, $query);
            // echo mysqli_error($conn);
            // echo $query;

        }//End of while loop.

        //Check if the code run successfully or not
        if(!$result)
        {
            echo "<script type='text/javascript'>
                            alert('Failed to Import ! Please try again .');
                            window.location = 'index.php';
                        </script>";
        }
        else {
            echo "<script type='text/javascript'>
                        alert('Successfully Imported.');
                        window.location = 'index.php';
                    </script>";
        }

        //Close the file
        fclose($file);
    }
?>