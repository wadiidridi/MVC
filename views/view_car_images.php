<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Images de Voiture</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <h1>Images de Voiture - <?php echo $car['marque'] . ' ' . $car['model']; ?></h1>

    <?php if (count($carImages) > 0) : ?>
        <div class="image-gallery">
            <?php foreach ($carImages as $image) : ?>
                <img src="public/<?php echo $image['image_path']; ?>" alt="Image de voiture" style="max-width: 200px; max-height: 200px; margin: 10px;">
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p>Aucune image disponible pour cette voiture.</p>
    <?php endif; ?>
</body>
</html>
