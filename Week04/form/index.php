<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <title>Bootstrap demo</title>
</head>

<body>
    <h1 class="mt-5 mb-4">Test Form Validation</h1>

    <table class="table">
        <tr>
            <td>Name <span style="color: red;">*</span></td>
            <td>
                <form action="">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" style="border: 1px solid red;">
                        <small id="emailHelp" class="form-text text-muted" style="color: red;">Please enter your name!
                </form>
            </td>
        </tr>
        <tr>
            <td>Address</td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="address">
                </div>
            </td>
        </tr>
        <tr>
            <td>Zipe Code <span style="color: red;">*</span></td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="name">
            </td>
        </tr>
        <tr>
            <td>Country <span style="color: red;">*</span></td>
            <td>
                <div class="form-group">
                    <select class="form-select form-select-lg mb-3" name="country">
                        <option selected>Please select your country</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td>Gender <span style="color: red;">*</span></td>
            <td>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="" id="male">
                        <label class="form-check-label" for="male">Male</label>
                        <input class="form-check-input" type="radio" value="" id="female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>Preferences <span style="color: red;">*</span></td>
            <td>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="red">
                        <label class="form-check-label" for="red">Red</label>
                        <input class="form-check-input" type="checkbox" value="" id="green">
                        <label class="form-check-label" for="green">Green</label>
                        <input class="form-check-input" type="checkbox" value="" id="blue">
                        <label class="form-check-label" for="blue">Blue</label>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>Phone <span style="color: red;">*</span></td>
            <td>
                <div class="form-group">
                    <input type="text" class="form-control" name="phone">
                </div>
            </td>
        </tr>
        <tr>
            <td>Email <span style="color: red;">*</span></td>
            <td>
                <div class="form-group">
                    <input type="email" class="form-control" name="email">
                </div>
            </td>
        </tr>
        <tr>
            <td>Password (6-8 characters) <span style="color: red;">*</span></td>
            <td>
                <div class="form-group">
                    <input type="password" class="form-control" name="password">
                </div>
            </td>
        </tr>
        <tr>
            <td>Verify Password <span style="color: red;">*</span></td>
            <td>
                <div class="form-group">
                    <input type="password" class="form-control" name="v-password">
                </div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-primary">Clear</button>
                </div>
            </td>
        </tr>

    </table>
</body>

</html>