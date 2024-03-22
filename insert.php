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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container "><br><br>
        <h2 class="text-center">Insert data</h2>
        <div class="col-lg-6 m-auto ">
            <form id="myform" action="insertphp.php" method="post">
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="username" class="form-control">
                </div><br>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control">
                </div><br>
                <div class="form-group">
                    <input type="submit" id="submit" name="submit" class=" btn btn-success form-control" value="submit">
                </div>

            </form>
        </div>
        <div>
            <br><br>
            <h2 class="text-center bg-dark text-white">Display data</h2>
            <br>
            <button id="displaydata" class="btn btn-primary">Get Data</button>
            <table class="table table-striped table-bordered text-center">
                <thead>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Password</th>
                </thead>
                <tbody id="response">
                    <?php
                    $q = "SELECT * FROM ajaxinsert";
                    $query = mysqli_query($conn, $q);
                    if (mysqli_num_rows($query) > 0) {
                        while ($result = mysqli_fetch_array($query)) {
                    ?>
                            <tr>
                                <td><?php echo $result['id']; ?></td>
                                <td><?php echo $result['username']; ?></td>
                                <td><?php echo $result['password']; ?></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>

            </table>

        </div>

    </div>
    <script>
        $(document).ready(function() {
            var form = $('#myform');
            $('#submit').click(function() {
                $.ajax({
                    url: form.attr('action'),
                    type: 'post',
                    data: $('#myform input').serialize(),
                    success: function(data) {
                        console.log(data);
                    }
                });
            }); 


            // $('#displaydata').click(function() {     
                displaydata();
                function displaydata(){
                $.ajax({
                    url: 'displayajax.php',
                    type: 'post',
                    success: function(responsedata) {
                        $('#response').html(responsedata);

                    }
                });
            }
            // });
        });
    </script>
</body>

</html>