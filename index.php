<?php
$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, "formdb");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container  col-lg-6">
        <!-- <div class="text-center"> -->
        <h2 class="text-center">Get data from database</h2>
        <form action="">
            username:<input type="text" name="" class="form-control"><br><br>
            password:<input type="password" name="" class="form-control"><br><br>
            Degree:
            <select class="form-control" onchange="myfun(this.value)">
                <option value="">select any one</option>
                <?php
                $q = "SELECT * FROM degree";
                $result = mysqli_query($conn, $q);
                while ($rows = mysqli_fetch_array($result)) {
                ?>
                    <option value="<?php echo $rows['mid']; ?>"><?php echo $rows['degrees']; ?></option>
                <?php } ?>
            </select>
            <br><br>
            Classess:
            <select class="form-control" id="dataget">
                <option value="">choose any one</option>
            </select>
            <br><br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- </div> -->
    </div>
    <script>
        function myfun(datavalue) {
            $.ajax({
                url: 'class.php',
                type: 'POST',
                data: {
                    datapost: datavalue
                },
                success: function(result) {
                    $('#dataget').html(result);
                }
            });
        }
    </script>
</body>

</html>