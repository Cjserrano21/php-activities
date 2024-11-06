<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>
<body>
    <h1>Peys App</h1>

    <form method="post">
        <label for="photoSize">Choose Photo Size: </label>
        <input type="range" name="photoSize" id="photoSize" min="1" max="100" value="10"><br>

        <label for="borderColor">Select Border Color:</label>
        <input type="color" name="borderColor" id="borderColor">

        <button type="submit" name="submit">Process</button><br><br>

        <?php 
        if (isset($_POST['submit'])) {
            $selectedBorderColor = $_POST['borderColor'];
            $chosenSize = $_POST['photoSize'];
        }
        ?>

        <img src="serrano.png" alt="Image" 
            width="<?php echo empty($chosenSize) ? '20' : $chosenSize; ?>%" 
            height="<?php echo empty($chosenSize) ? '20' : $chosenSize; ?>%" 
            style="border: 3px solid <?php echo empty($selectedBorderColor) ? '#000000' : $selectedBorderColor; ?>;">
    </form>

</body>
</html>
