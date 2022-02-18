<?php
if (isset($_GET['valueTosearch'])) {  //search
  $valueTosearch = $_GET['valueTosearch'];
  $selected_radio = $_GET['radio'];
  if ($selected_radio  == 'Room') {
    $sql = "SELECT room.Room_number, room.Room_floor, renter.Room_status, renter.Renter_id, Name, Last_name FROM renter,room WHERE renter.Room_number = '$valueTosearch' AND (renter.Room_number LIKE '%" . $valueTosearch . "%') AND renter.Room_number = room.Room_number ";
  } else if ($selected_radio  == 'Name') {
    $sql = "SELECT room.Room_number, room.Room_floor, renter.Room_status, renter.Renter_id, Name, Last_name FROM renter,room WHERE renter.Name = '$valueTosearch' AND (renter.Name LIKE '%" . $valueTosearch . "%') AND renter.Room_number = room.Room_number ";
  }
  $sql1 = "SELECT room.Room_number, renter.Renter_id FROM room LEFT OUTER JOIN renter ON room.Room_number = renter.Room_number WHERE renter.Room_status IS NULL";
  $sql2 = "SELECT * FROM renter, room, room_detail WHERE renter.Room_number = room.Room_number AND room.Room_typeNo = room_detail.Room_typeNo";
  $search_result1 = searchTable($sql1);
  $search_result = searchTable($sql);
  $search_result2 = searchTable($sql2);
} else if (isset($_GET['update'])) {  //update
  $R_id = $_GET['Renter_id'];
  $fname = $_GET['Name'];
  $lname = $_GET['Last_name'];
  $sql = "UPDATE renter SET Name = '$fname', Last_name = '$lname' WHERE renter.Renter_id = '$R_id'";
  $search_result = searchTable($sql);
  header("location: testscript.php");
} else if (isset($_GET['insert'])) {  //insert
  $prefix = $_GET['Prefix'];
  $fname = $_GET['Name'];
  $lname = $_GET['Last_name'];
  $roomNo = $_GET['Room_number'];
  $sta = $_GET['Room_status'];
  $Renter = "A" . $_GET['Room_number'];
  $sql = "INSERT INTO `renter` (`Renter_id`, `Prefix`, `Name`, `Last_name`, `Room_status`, `Room_number`) 
            VALUES ('$Renter', '$prefix', '$fname', '$lname', '$sta', '$roomNo')";
  $search_result = searchTable($sql);
  header("location: testscript.php");
} else {  //Q ข้อมูลออกมาทั้งหมด
  $sql = "SELECT room.Room_number, room.Room_floor, renter.Room_status, renter.Renter_id, renter.Prefix, renter.Name, renter.Last_name FROM room left outer join renter on room.Room_number = renter.Room_number ORDER BY room.Room_number ASC ";
  $sql1 = "SELECT room.Room_number, renter.Renter_id FROM room LEFT OUTER JOIN renter ON room.Room_number = renter.Room_number WHERE renter.Room_status IS NULL";
  $sql2 = "SELECT * FROM renter, room, room_detail WHERE renter.Room_number = room.Room_number AND room.Room_typeNo = room_detail.Room_typeNo";
  $search_result = searchTable($sql);
  $search_result1 = searchTable($sql1);
  $search_result2 = searchTable($sql2);
}


function searchTable($sql)
{
  $conn = new mysqli("localhost", "root", "", "apartment");
  $result = mysqli_query($conn, $sql);
  if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
  }
  return $result;
}
function searchTable1($sql2)
{
  $conn = new mysqli("localhost", "root", "", "apartment");
  $result = mysqli_query($conn, $sql2);
  if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
  }
  return $result;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style_table.css">
  <link rel="stylesheet" href="button_delete.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script> -->
  <title>TEST</title>

</head>

<body class="bg-success">
  <br>
  <form>
    <button class="btn btn-default" onClick='window.history.back()' type="button"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
    <div align="center" class="form-group">
      <input style="width: 200px;" type="text" name="valueTosearch" placeholder=" Search" class="form-control" required="required"><br>
      <label class="radio-inline"><input type="radio" name="radio" value="Room" checked>Room</label>
      <label class="radio-inline"><input type="radio" name="radio" value="Name">Name</label><br><br>
      <button class="btn btn-success" type="submit" name="search" value="Search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search</button>
    </div><br>
  </form>

  <form align="center">
    <center>
      <table class="rwd-table" style="width: 600px;">
        <tr>
          <th>No.</th>
          <th>Floor</th>
          <th>Status</th>
          <?php if (mysqli_num_rows($search_result) >= 1) { ?><th colspan="2">
              <center><button class="btn btn-primary" data-toggle="modal" type="button" data-target="#insert_modal"><i class='fas fa-user-plus'></i> Insert</button></center>
            </th>
          <?php } ?>
        </tr>
        <?php if (mysqli_num_rows($search_result) < 1) { ?>
          <tr>
            <th colspan="4" style="text-align: center;">ไม่พบข้อมูลจากค้นหา กรุณากรอกใหม่</th>
          </tr>
        <?php } else { ?>
          <?php while ($row = mysqli_fetch_array($search_result)) : ?> '
          <!-- //ข้อมูลเป็นอาเรย์ เก็บไว้ใน row -->

            <tr>
              <td><?php echo $row['Room_number']; ?></td>
              <td><?php echo $row['Room_floor']; ?></td>
              <td><?php if ($row['Room_status'] == 1)
                    echo "ไม่ว่าง";
                  else
                    echo "ว่าง"; ?>
              </td>
              <td>
                <?php if ($row['Room_status'] == 1) { ?>
                  <button class="btn btn-warning" data-toggle="modal" type="button" data-target="#update_modal<?php echo $row['Renter_id']; ?>"><i class='far fa-edit'></i> Edit</button>
              </td>
              <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#show_modal<?php echo $row['Renter_id']; ?>"><span class="glyphicon glyphicon-user"></span> </button>
              </td>
              <td>
                <a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='delete.php?id=<?php echo $row['Renter_id']; ?>';}">
                  <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</button></a>
              </td><?php } else {
                    echo "<td></td><td></td>";
                  } ?>
            </tr>
            <?php include 'update1.php'; ?>
            <?php include 'insert1.php'; ?>
            <?php include 'delete.php'; ?>
            <?php while ($one = mysqli_fetch_array($search_result2)) : ?>
              <?php include 'show.php'; ?>
            <?php endwhile; ?>
          <?php endwhile; ?>
        <?php } ?>
      </table>

    </center>
  </form>
</body>

</html>