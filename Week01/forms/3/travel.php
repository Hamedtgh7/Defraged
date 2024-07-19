<?php
session_start();
$modes = ['Automobile', 'Jet', 'Ferry', 'Subway'];

if (isset($_SESSION['modes'])) {
    $modes = array_merge($modes, $_SESSION['modes']);
}

if (isset($_POST['user_modes'])) {
    $extra_modes = explode(',', $_POST['user_modes']);
    foreach ($extra_modes as $extra) {
        if (!in_array($extra, $modes)) {
            $modes[] = $extra;
        }
    }

    $_SESSION['modes'] = array_merge($_SESSION['modes'] ?? [], $extra_modes);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../app.css">
    <title>How Are You Traveling?</title>
</head>

<body>
    <div class="container">
        <h1><b>How Are You Traveling?</b></h1>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
            <form action="" method="post">
                <label>Here is the list with your addition:</label><br>

                <?php foreach ($modes as $mode) { ?>
                    <ul>
                        <li><?php echo $mode ?></li>
                    </ul>
                <?php } ?>

                <label>Add more?</label><br><br>
                <input type="text" size="50" name="user_modes"><br><br>
                <button type="submit" class="btn btn-primary">GO</button>
            </form>
        <?php } else { ?>
            <form action="" method="post">
                <label>Travel takes many forms, whether across town, across the country, or around the world.
                    Here is a list of some common modes of transportation:</label><br><br>
                <?php foreach ($modes as $mode) { ?>
                    <ul>
                        <li><?php echo $mode ?></li>
                    </ul>
                <?php } ?>

                <label>Pleade add your favorite, local. or even imaginary modes of travel to the list, seprated by
                    commas</label><br><br>
                <input type="text" size="50" name="user_modes"><br><br>
                <button type="submit" class="btn btn-primary">GO</button>
            </form>
        <?php } ?>
    </div>
</body>

</html>