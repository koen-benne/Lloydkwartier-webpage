<?php
/**
 * @var $pageTitle string
 * @var $content string
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="css/<?= ($styles ?? "style") . '.css' ?>" rel="stylesheet" type="text/css"/>
    <title><?= $pageTitle ?? '' ?></title>
</head>
<body>
<?= ($content ?? ''); ?>
</body>
<script src="js/<?= $script ?? 'script' ?>.js"></script>
</html>
