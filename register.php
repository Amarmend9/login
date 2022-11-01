<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <?php //include "registration.php"; ?>
    <?php include "navbar.php"; ?>
    <div class="container">
        <?php 
        if(isset($_GET['error'])) {
            switch($_GET['error']){
                case 'confirmation':
                    $aldaa = "Password zursun bn dahian oroldono uu";
                    break;
                case 'database':
                    $aldaa = "Database aldaa!";
                    break;
                case 'username':
                    $aldaa = 'Username already taken!';
                    break;
                case 'email':
                    $aldaa = 'Email  already used!';
                    break; 
                case 'unknown':
                    $aldaa = 'Unknown  error! Contact us more information';
                    break; 
                default :
                    $aldaa = 'Aldaa!';
            }
        }
        ?>
        <form action="registration.php" method="POST">
        <?php 
            if(isset($aldaa)){
        ?>
        <div class="alert alert-danger" role="alert">
            <?php
                echo($aldaa);
            ?>
        </div>   
        <?php
            }
        ?>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" value="amraa9912" class="form-control" name="username" required id="exampleInputName" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputUsername" class="form-label">Username</label>
                <input type="text" class="form-control" required name="username" id="exampleInputUsername" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" required name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" required name="password" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Password Confirmation</label>
                <input type="password" class="form-control" required name="password_confirmation" id="exampleInputPassword2">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label required class="form-check-label" for="exampleCheck1">Terms and Agreements
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>