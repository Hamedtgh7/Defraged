<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../app.css">
    <title>Pick a Day</title>
</head>

<body>
    <div class="container">
        <h1>Pick a Day</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $day = strtolower($_POST['day']) ?? null;
            if ($day == 'monday') {
                $response = 'Laugh on Monday, laugh for danger.';
            } elseif ($day == 'tuesday') {
                $response = 'Laugh on Tuesday, kiss a stranger.';
            } elseif ($day == 'wednesday') {
                $response = 'Laugh on Wednesday, laugh for a letter.';
            } elseif ($day == 'thursday') {
                $response = 'Laugh on Thursday, something better.';
            } elseif ($day == 'friday') {
                $response = 'Laugh on Friday, laugh for sorrow.';
            } elseif ($day == 'saturday') {
                $response = 'Laugh on Saturday, joy tomorrow.';
            } elseif ($day == 'sunday') {
                $response = 'We have not poem for this day!';
            } else {
                $response = 'The word is not a day of week.';
            } ?>
            <p class="text-start fs-5"><b><?php echo $response ?></b></p>
            <a href="" class="btn btn-info">Back</a>
        <?php } else { ?>

            <form action="" method="post">
                <label for="day">Please choose a day:</label><br><br>
                <input type="text" name="day" placeholder="Your Day" size="50"><br><br>
                <button type="submit" class="btn btn-primary">GO</button>
            </form>
        <?php } ?>


    </div>
</body>

</html>