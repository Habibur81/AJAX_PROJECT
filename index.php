<?php

    $con = new mysqli('localhost','root', '', 'fdb');
//    if( isset($con) )
//    {
//        echo " connected with database";
//    }else{
//        echo "not connected successfully";
//    }

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>AJAX FORM GET DATA</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.2/umd/popper.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container col-lg-6">
            <h2 class="text-center text-success">Get data from database</h2>
            <form action="">
                <div class="form-group">
                    <label class="">Username:</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label class="">Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Degree:</label>
                    <select name="" id="" class="form-control" onchange="myfun(this.value)">
                        <option value="">Select any one</option>

                        <?php
                            $q = "select * from degree";
                            $result = mysqli_query($con, $q);
                            while ($rows = mysqli_fetch_array($result))
                            {
                        ?>
                                <option value="<?php echo $rows['mid'] ?>"><?php echo $rows['degrees'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                    <label>Classes:</label>
                    <select name="" id="dataget" class="form-control">
                        <option value="">Choose any one</option>
                    </select>

                    <br>
                    <button class="btn btn-primary">Submit</button>

                </div>
            </form>
        </div>

        <script type="text/javascript">

            function myfun(datavalue)
            {
                $.ajax({

                    url: 'class.php',

                    type: 'POST',

                    data: { datapost : datavalue },

                    success:function (result){

                        $('#dataget').html(result);

                    }

                });
            }

        </script>

    </body>
</html>
