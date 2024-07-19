<?php
$weathers = ['Sunshine', 'Clouds', 'Rain', 'Hail', 'Sleet', 'Snow', 'Wind', 'Cold', 'Heat'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../app.css">
    <title>How's your weather?</title>
</head>

<body>
    <div class="container">
        <h3><b>How's Your Weather?</b></h3>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'GET') { ?>
        <form action="" method="post">
            <p class="text-start">Please enter your information:</p>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="city" class="col-form-label">City:</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="city" class="form-control">
                </div>

                <div class="col-auto">
                    <label for="month" class="col-form-label">Month:</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="month" class="form-control">
                </div>

                <div class="col-auto">
                    <label for="year" class="col-form-label">Year:</label>
                </div>
                <div class="col-auto">
                    <input type="number" name="year" class="form-control">
                </div><br><br>
                <pre class="text-start">Please choose the kind of weather you experienced from the list below.
Choose all that apply.
                </pre>

                <?php foreach ($weathers as $climate) { ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value=<?php echo $climate ?> name='weather[]'
                        id=<?php echo $climate ?>>
                    <label class="form-check-label" for=<?php echo $climate ?>>
                        <?php echo $climate ?>
                    </label>
                </div>
                <?php } ?>


            </div>
            <br>
            <button type="submit" class="btn btn-primary">GO</button>
            <?php } else {
            $city = $_POST['city'];
            $month = $_POST['month'];
            $year = $_POST['year'];
            $climates = $_POST['weather']; ?>
            <p class="text-start">
                <?php echo "In " . $city . " in the month of " . $month . " " . $year . ", you observed the following weather:" ?>.
            </p>
            <?php foreach ($climates as $i) { ?>
            <ul>
                <li><?php echo $i ?></li>
            </ul>
            <?php } ?>
            <?php } ?>
        </form>
    </div>
</body>

</html>