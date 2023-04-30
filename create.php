<?php
$servername='localhost';
$username='root';
$password='';
$database='shop';

$connection=new mysqli($servername,$username,$password,$database);
    $name="";
    $email="";
    $phone="";
    $address="";
    $successMessage="";
    $errorMessage="";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $phone=$_POST["phone"];
        $address=$_POST["address"];

        do{
                if(empty($name)||empty($email)||empty($address)){
                    $errorMessage="All the fiels are required";
                    break;
                }
                $sql = "INSERT INTO client_list (name,email,phone,address)". "VALUES('$name','$email','$phone','$address')";
                $result=$connection->query($sql);
               if(!$result){
                $errorMessage="Invalid query: ".$connection->error;
                break;
               }

                $name="";
                $email="";
                $phone="";
                $address="";
                $successMessage="Client added successfully!";
               
                header("location:/hwshop/index.php");
                exit;

        }while(false);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
</head>
<body>
    <div class="container my-5">
        <h2>New Client</h2>

          <?php
                if(!empty($errorMessage)){
                    echo "
                    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>$errorMessage</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                 </div>
                    ";
                }          
          ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
                </div>
            </div>

            <?php
              if(!empty($successMessage)){
                echo "
            <div class='row mb-3'>
                <div class='offset-sm-3 col-sm-3 d-grid'> 
                   <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                   </div>
                </div>
            </div>
                ";
              }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a href="/hwshop/index.php" class="btn btn-outline-primary" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>