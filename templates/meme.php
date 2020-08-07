<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form method="post">
    <input type="hidden" name="mode" value="save" />

    <?php /** @var Meme $meme */?>
    <input type="hidden" name="id" value="<?php echo $meme->getId()?>" />

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($meme->getName())?>">

    <label for="author">Author:</label>
    <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($meme->getAuthor())?>">

    <label for="src">Src:</label>
    <input type="text" id="src" name="src" value="<?php echo htmlspecialchars($meme->getSrc())?>">

    <input type="submit" name="submit" value="Save" />
</form>

<form method="post">
    <input type="hidden" name="mode" value="delete" />
    <input type="hidden" name="id" value="<?php echo $meme->getId()?>" />
    <input type="submit" name="submit" value="Delete" />
</form>

</body>
</html>