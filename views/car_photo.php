<div class="car-imgs">

<div>

<h1 id='h1'>car : photos </h1>


</div>

   

    <?php
    if (count($carsPhotosList) > 0)

        foreach ($carsPhotosList as $carImg) {

            if (file_exists("public/car_photos/" . $carImg['image']))

                echo "<img src='public/car_photos/" . $carImg['image'] . "' alt='Car' class='car_img'>";

        
        }

    else echo "<span style='color:red ;'>this car has no photos</span>" ;

 

    ?>

</div>

 


 
