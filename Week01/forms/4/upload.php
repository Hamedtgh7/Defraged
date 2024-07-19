<?php
if (isset($_POST['submit'])) {
    $file = $_FILES['file'] ?? null;
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';

    if (!is_dir(__DIR__ . '/images/')) {
        mkdir(__DIR__ . '/images/');
    }
    if (!is_dir(__DIR__ . '/texts/')) {
        mkdir(__DIR__ . '/texts/');
    }


    if ($file) {
        $file_name = $file['name'];
        $file_path = $file['tmp_name'];
        $file_size = $file['size'];
        $file_type = $file['type'];

        $image_types = ['image/png', 'image/jpeg'];
        $text_types = ['text/plain'];

        $errors = [];

        if (!in_array($file_type, $image_types) && (!in_array($file_type, $text_types))) {
            $errors[] = "File Format is wrong.";
        }

        if (in_array($file_type, $image_types) && $file_size > 1000 * 1000) {
            $errors[] = "Image file has to be less than Mb.";
        }

        if (in_array($file_type, $text_types) && $file_size > 1000 * 512) {
            $errors[] = "Text file has to be less than 512 Kb.";
        }

        $exist_image_file = scandir(__DIR__ . '/images/');
        $exist_texts_file = scandir(__DIR__ . '/texts/');

        if (in_array($file_type, $image_types) && in_array($file_name, $exist_image_file)) {
            $errors[] = "File with this name has already exists.";
        }

        if (in_array($file_type, $text_types) && in_array($file_name, $exist_file)) {
            $errors[] = "File with this name has already exists.";
        }

        if (empty($errors)) {
            if (in_array($file_type, $image_types)) {
                move_uploaded_file($file_path, __DIR__ . '/images/' . $file_name);
            }
            if (in_array($file_type, $text_types)) {
                move_uploaded_file($file_path, __DIR__ . '/texts/' . $file_name);
            }
        } else {
            foreach ($errors as $error) {?>
                <div class="container">
                    <label> <?php echo $error; ?></label><br>
                </div>

<?php }
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../app.css">
    <title>Upload File</title>
</head>

<body>
    <div class="container">
        <h1><b>Upload File </b></h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Please Add Your Information:</label><br><br>
            <label for="file">Select a file:</label>
            <input type="file" id="file" name="file"><br><br>
            <input type="text" name="name" placeholder="File Name" size="50"><br><br>
            <input type="text" name="description" placeholder="Description" size="100"><br><br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>
