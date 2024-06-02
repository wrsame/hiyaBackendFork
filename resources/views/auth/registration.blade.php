<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:60px">
            <h4>Registration</h4>
            <hr>
            <form>
                <div class="form-group">
                    <label for="name">Full name</label>
                    <input type="text" class= "form-control" placeholder="Enter fullname"
                    name="name" value="">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class= "form-control" placeholder="Enter email"
                    name="name" value="">

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class= "form-control" placeholder="Enter password"
                    name="password" value="">

                </div>

                <div class="div">
                    <button class="btn btn-block btn-primary" type="submit">Register</button>
    
                </div>
            </form>

            </div>

        </div>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>