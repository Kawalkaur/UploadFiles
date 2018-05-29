<?php

include 'db_connect.php';

        $image1 =$_POST['insert_image_one'];

        $image2 =$_POST['insert_image_two'];

        $image3 = $_POST['insert_image_three'];

        $image4 = $_POST['insert_image_four'];

        $imageName1="image1.jpg";
        $imageName2="image2.jpg";
        $imageName3="image3.jpg";
        $imageName4="image4.jpg";



            $Image1_path = "Uploads/$imageName1";
            $Image2_path = "Uploads/$imageName2";
            $Image3_path = "Uploads/$imageName3";
            $Image4_path = "Uploads/$imageName4";

            $actualpath = "http://192.168.42.224/DemoUploadTwoImage/$Image1_path";
            $actualpath1 = "http://192.168.42.224/DemoUploadTwoImage/$Image2_path";
            $actualpath2 = "http://192.168.42.224/DemoUploadTwoImage/$Image3_path";
            $actualpath3 = "http://192.168.42.224/DemoUploadTwoImage/$Image4_path";

            if($image2 == "Empty")
            {
                $actualpath1 = "";
            }

            if($image3 == "Empty")
            {
                $actualpath2 = "";
            }

            if($image4 == "Empty")
            {
                $actualpath3 = "";
            }


                $m=mysqli_query($con,"INSERT INTO UserImage VALUES ('$actualpath','$actualpath1','$actualpath2','$actualpath3')");   

                if($m)
                {
                    file_put_contents($Image1_path,base64_decode($image1));

                    if($image2 !="Empty")
                    {
                        file_put_contents($Image2_path,base64_decode($image2));
                    }

                    if($image3 !="Empty")
                    {
                        file_put_contents($Image3_path,base64_decode($image3));
                    }
                    
                    
                    if($image4 !="Empty")
                    {
                        file_put_contents($Image4_path,base64_decode($image4));
                    }
                    

                  $flag['Code']='Data Inserted';
                  print(json_encode($flag)); 
                }
           
else
{

    $flag['Error']='2';
    print(json_encode($flag));      

}       
?>