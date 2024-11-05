<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
</head>
<body>

   
    <form method="post">
        <h1>Vendo Machine</h1>
        <?php 
        $softDrinks = [
            'Coke' => 15,
            'Sprite' => 20,
            'Royal' => 20,
            'Pepsi' => 15,
            'Mountain Dew' => 20
        ];
        $sizes = [
            'Regular' => 0,
            'Up-Size' => 5,
            'Jumbo' => 10
        
        ];
        ?>
        <fieldset style="width: 500px;">
            <legend>Products:</legend>
            <?php
                if(isset($softDrinks)) { 
                    foreach($softDrinks as $key => $value) {
                        echo '<input type="checkbox" name="chkDrinks[]" id="chkDrink' . $key . '" value="' . $key .'">';
                        echo '<label for="chkDrinks[]"> ' . $key . ' - ₱' . $value . '</label><br>';
                    }
                }
            ?>
        </fieldset>

        <fieldset style="width: 500px;">
            <legend>Options: </legend>
            <label for="drpSizes">Size</label>
            <select name="drpSizes" id="drpSizes">
            <?php 
                foreach ($sizes as $size => $extraCost) {
                    echo '<option value="' . $size . '">' . $size . ($size != 'Regular' ? ' (Add ₱' . $extraCost . ')' : '') . '</option>';
                }
            ?>
            </select>
            <label for="noQuantity">Quantity</label>
            <input type="number" name="noQuantity" id="noQuantity" min="1" value="1">
            <button type="submit" name="btnCheck">Check out</button>
        </fieldset>
    </form>

     
    <?php
        if (isset($_POST['btnCheck'])) {
                $drinksChoosen = $_POST['chkDrinks'];
                $size = $_POST['drpSizes'];
                $quantity = $_POST['noQuantity'];
                $total = 0;
                $quantities = 0;
                ?>
                <hr>
                <h1>Purchase Summary: </h1>
                <ul>
                    <?php foreach ($drinksChoosen as $value) { ?>
                        <?php 
                            $cost = ($softDrinks[$value] + $sizes[$size]) * $quantity;
                            $total += $cost;
                            $quantities += $quantity;
                        ?>
                        <li>
                            <?php echo $quantity . ' piece(s) of ' . $value . ' amounting to ₱' . $cost; ?>
                        </li>
                    <?php } ?>
                </ul>
                <b>Total Number of Items: <?php echo $quantities; ?></b><br>
                <b>Total Amount: ₱<?php echo $total; ?></b>
            <?php
            
        }
    ?>

        

    

</body>
</html>

