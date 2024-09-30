<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        $currentPage = basename($_SERVER['SCRIPT_NAME']);
        if ($currentPage == 'index.php') {
            echo '
                <title>Cushion Compass - Discover Your Perfect Cushion</title>
            ';
        } elseif ($currentPage == 'biodata.php') {
            echo '
                <title>About Me - Cushion Compass</title>
            ';
        }
    ?>
    <link rel="stylesheet" href="styles.css">
</head>