

<?php




// fetch query
function fetch_data()
{
  include("db_connection.php");
  $id = $_POST["a"];
  $name = '';
  $sql = "SELECT * FROM `users` WHERE `user_id`='$id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      $name .= $row['employee_name'];
    }
  } else {
    echo "0 results";
  }




  date_default_timezone_set("Asia/karachi");
  $date = date("n, j, Y");





  $query = "SELECT * from `signin` where `Date`='$date'";
  $exec = mysqli_query($db, $query);
  if (mysqli_num_rows($exec) > 0) {
    $row = mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;
  } else {
    return $row = [];
  }
}
$fetchData = fetch_data();
show_data($fetchData);

function show_data($fetchData)
{

  echo '<thead class=" container bg-primary">
        <tr>
            <th>S.N</th>
            <th>Full Name</th>  
            <th>Sign in</th>
            <th>Sign out</th>
            <th>Status</th>
            <th>Signout Status</th>
            <th>Activity</th>
            <th>Date</th>
        </tr>
        </thead>';

  if (count($fetchData) > 0) {
    $sn = 1;
    echo '<tbody>';
    foreach ($fetchData as $data) {

      echo " <tr>
          <td>" . $sn . "</td>
          <td>" . $data['Name'] . "</td>
          
          <td>" . $data['Signin'] . "</td>
          <td>" . $data['Signout'] . "</td>
          <td>" . $data['Status'] . "</td>
          <td>" . $data['Signout_Status'] . "</td>
          <td>" . $data['activity'] . "</td>
          <td>" . $data['Date'] . "</td>

   </tr>";

      $sn++;
    }
    echo '</tbody>';
  } else {

    echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>";
  }
  echo "</table>";
}


?>