<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../app.css">
    <title>Pick a Day</title>
</head>

<body>
    <div class="container">
        <h1><b>Pick a Day </b></h1>
        <form action="respond.php" method="post">
            <label for="day">Please choose a day:</label><br><br>
            <input type="text" name="day" placeholder="Your Day" size="50"><br><br>
            <button type="submit" class="btn btn-primary">GO</button>
        </form>
    </div>
</body>

</html>