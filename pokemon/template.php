<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokemon</title>
</head>
<body>
    <h1><?php echo $data['name']?> - <?php echo $data['id']?></h1>
    <img src="<?php echo $data['sprites']['front_default']?>" />
    <ul>
        <?php getPowers($data); ?>
    </ul>

    <?php $child = getEvolutions($data)?>
    <?php if($child !== null){ ?>
    <h3><?php echo $child->name;?></h3>
    <a href="index.php?pokename=<?php echo $child->id?>">
        <img src="<?php echo $child->sprites->front_default?>" />
    </a>
    <?php } ?>

    <form method="get">
        <input type="text" name="pokename" />
        <input type="submit">
    </form>
</body>
</html>