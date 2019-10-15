<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
</head>
<body>
<select>
    <?php foreach($allCustomers AS $customerItem):?>
        <option value="<?php echo $customerItem->getId()?>"><?php echo $customerItem->getName()?></option>
    <?php endforeach; ?>
</select>


    <h2><?php echo $customer->getName()?></h2>
    <p>More info about the customer</p>
</body>
</html>