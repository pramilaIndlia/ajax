<?php
$conn = mysqli_connect("localhost", "root", "", "formdb");
extract($_POST);
if (isset($_POST['readrecord'])) {
    $data = '<table class="table table-bordered table-striped">
    <tr>
    <th>No.</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Moblie</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>';
    $sql =  "SELECT * FROM 'users' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $number = 1;
        while ($row = mysqli_fetch_array($result)) {
            $data = '<table class="table table-bordered table-striped">
            <tr>
            <th>No.</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>';
            
            // Use backticks for table names, not single quotes
            $sql =  "SELECT * FROM `users`";
            $result = mysqli_query($conn, $sql);
            
            if ($result && mysqli_num_rows($result) > 0) {
                $number = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    $data .= '<tr>
                        <td>' . $number . '</td>
                        <td>' . $row['firstname'] . '</td>
                        <td>' . $row['lastname'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['mobile'] . '</td>
                        <td>
                           <button onclick="GetUserDetails(' . $row['id'] . ')" class="btn btn-warning">Edit</button>
                        </td>
                        <td>
                           <button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger">Delete</button>
                        </td>
                        </tr>';
                    $number++;
                }
            }
            $data .= '</table>';
            echo $data;
        }
    }
    }
if (
    isset($_POST['firstname']) && isset($_POST['lastname'])
    && isset($_POST['email']) && isset($_POST['mobile']) // Corrected variable name
) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile']; // Corrected variable name
    $query = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `mobile`) VALUES ('$firstname', '$lastname', '$email', '$mobile')";
    mysqli_query($conn, $query);
}
