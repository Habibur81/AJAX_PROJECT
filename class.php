<?php
    $con = new mysqli('localhost','root', '', 'fdb');

    if( isset($con) )
    {
        echo " connected with database";
    }else{
        echo "not connected successfully";
    }

    $nameid = $_POST['datapost'];

    $q = "select * from class where mid = '$nameid' ";

    $result = mysqli_query($con, $q);

    while ($rows = mysqli_fetch_array($result))
    {
?>
            <option><?php echo $rows['class'] ?></option>
<?php
    }
?>