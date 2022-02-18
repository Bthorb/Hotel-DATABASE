<?php

// if (isset($_GET['update'])) {  //update
//     $rental = $_GET['Renter_id'];
//     $fname =  $_GET['Name'];
//     $lname = $_GET['Last_name'];

//     $sql = "UPDATE tenant
//     SET tenant_fname = '$fname', tenant_lname = '$lname'
//     WHERE tenant_code = '$rental'";
//     $search_result = searchTable($sql);
// }

if (isset($_GET['insert'])) {  //insert
    $fname = $_GET['Prefix'] . $_GET['Name'];
    $lname = $_GET['Last_name'];
    $roomNo = $_GET['room_number'];
    $sta = $_GET['Room_status'];
    $tenantID = 1 . $_GET['room_number'];
    $house = $_GET['house_registration'];
    // $tenant_name = $fname . $lname;
    // echo $fname . $lname . $roomNo . $sta . $house;
    $contract = $_GET['Contract_date'];
    $exp = $_GET['Expiration_date'];
    $sql1 = "INSERT INTO `tenant` (`tenant_code`, `tenant_fname`, `tenant_lname`, `house_registration`) 
                VALUES ('$tenantID', '$fname', '$lname', '$house')";
    $sql2 = "INSERT INTO `apartment` (`rental_code`, `room_number`, `tenant_code`, `contract_date`, `expiration_date`)
                VALUES (NULL,'$roomNo', ' $tenantID', ' $contract',' $exp')";
    $sql3 = "UPDATE `the_room` SET `Room_Status` = '$sta' WHERE `the_room`.`Room_number` = $roomNo;";


    $search_result = searchTable($sql1);
    $search_result = searchTable($sql2);
    $search_result = searchTable($sql3);


    header("location: test.php");
} else if (isset($_GET['update'])) {
    $rental = $_GET['Renter_id'];
    $fname =  $_GET['Name'];
    $lname = $_GET['Last_name'];

    $sql = "UPDATE tenant
    SET tenant_fname = '$fname', tenant_lname = '$lname'
    WHERE tenant_code = '$rental'";
    $search_result = searchTable($sql);

    header("location: test.php");

} else {
    $sql = "SELECT apartment.tenant_code,apartment.rental_code,apartment.room_number  , apartment.contract_date, apartment.expiration_date , tenant.tenant_fname,tenant.tenant_lname , the_room.Room_Status,the_room.Room_type FROM apartment,tenant,the_room WHERE apartment.room_number = the_room.Room_number AND apartment.tenant_code = tenant.tenant_code";
    $sql2 = "SELECT the_room.Room_number
    FROM the_room
    WHERE the_room.Room_Status = 0";
    $search_result1 = searchTable($sql);
    $search_result2 = searchTable($sql2);
}

if (isset($_GET['search'])){

    $radio = $_GET['radio'];
    $searh_select = $_GET['MySearch'];

    if($radio == "Room"){
        $sql = "SELECT apartment.tenant_code,apartment.rental_code,apartment.room_number  , apartment.contract_date, apartment.expiration_date , tenant.tenant_fname,tenant.tenant_lname , the_room.Room_Status,the_room.Room_type
        FROM apartment,tenant,the_room
        WHERE apartment.room_number = $searh_select AND the_room.Room_Status = '1'";

    }else{
        $sql = "SELECT apartment.tenant_code,apartment.rental_code,apartment.room_number  , apartment.contract_date, apartment.expiration_date , tenant.tenant_fname,tenant.tenant_lname , the_room.Room_Status,the_room.Room_type
        FROM apartment,tenant,the_room
        WHERE tenant.tenant_fname LIKE '%$searh_select' AND the_room.Room_Status = '1'";
    }

    $search_result1 = searchTable($sql);

    // $sql = "SELECTapartment.tenant_code,apartment.rental_code,apartment.room_number , apartment.contract_date, apartment.expiration_date , tenant.tenant_fname,tenant.tenant_lname , the_room.Room_Status,the_room.Room_type FROM apartment,tenant,the_room WHERE apartment.room_number = the_room.Room_number AND apartment.tenant_code = tenant.tenant_code";
 }


function searchTable($sql)
{
    $conn = new mysqli("localhost", "root", "", "motel");
    $conn->set_charset("utf8");

    $result = mysqli_query($conn, $sql);
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    } else {
        //echo "connected searchTable!";
    }
    return $result;
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_table.css">
    <link rel="stylesheet" href="test.css">

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
    <link rel="stylesheet" href="testscript.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script> -->
    <title>TEST</title>

</head>


    

<center>
    <form class="d-flex" method="GET" action="test.php">
        <input class="form-control-me-2" type="search" placeholder="Search" aria-label="Search" name="MySearch">
        <label class="radio-inline"><input type="radio" name="radio" value="Room" checked>Room</label>
        <label class="radio-inline"><input type="radio" name="radio" value="Name">Name</label><br><br>
        <button class="btn btn-outline-success" type="submit" name="search">Search</button>
    </form>
</center>
<table class="table table-bordered">
    <thead class="table-dark">
        <!--หัวข้อตาราง-->
        <tr>
            <th>รหัสผู้เช่า</th>
            <th>รหัสการเช่า</th>
            <th>เลขที่ห้อง</th>
            <th>ชื่อผู้เช่า</th>
            <th>นามสกุลผู้เช่า</th>
            <th>สถานะห้อง</th>
            <th>ประเภทห้อง</th>


            <?php if (mysqli_num_rows($search_result1) >= 1) {
            ?>
                <th colspan="4">
                    <center><button class="btn btn-primary" data-toggle="modal" type="button" data-target="#insert_modal"><i class='fas fa-user-plus'></i> Insert</button></center>
                </th>
            <?php  }
            ?>

        </tr>
    </thead>

    <!--เมื่อไม่พบข้อมูลใด ๆ -->
    <?php if (mysqli_num_rows($search_result1) <= 1) { ?>
        <tr>
            <th colspan="6" style="text-align: center;">ไม่พบข้อมูลจากค้นหา กรุณากรอกใหม่</th>
        </tr>
    <?php  } else { ?>
        <?php while ($row = mysqli_fetch_array($search_result1)) { ?>
            <!-- //ข้อมูลเป็นอาเรย์ เก็บไว้ใน row -->

            <tbody>

                <td><?php echo $row['tenant_code']; ?></td>
                <td><?php echo $row['rental_code']; ?></td>
                <td><?php echo $row['room_number']; ?></td>
                <td><?php echo $row['tenant_fname']; ?></td>
                <td><?php echo $row['tenant_lname']; ?></td>
                <td><?php if ($row['Room_Status'] == 1) echo "ไม่ว่าง";
                    else echo "ว่าง"; ?></td>
                <td><?php echo $row['Room_type']; ?></td>
                <td>
                    <?php if ($row['Room_Status'] == 1) { ?>
                        <button class="btn btn-warning" data-toggle="modal" type="button" data-target="#update_modal<?php echo $row['tenant_code']; ?>"><i class='far fa-edit'></i> Edit</button>
                </td>
                <td>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#info_modal<?php echo $row['tenant_code']; ?>"><span class="glyphicon glyphicon-user"></span>Info </button>
                </td>
                <td>
                    <a href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='delete.php?id=<?php echo $row['tenant_code']; ?>';}">
                        <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</button></a>
                </td><?php } else {
                        echo "<td></td><td></td>";
                    } ?>

            </tbody>
        <?php include 'update1.php';
        include 'info.php';
        } ?>
</table>



<?php  } ?>

<?php
//while ($row = mysqli_fetch_array($search_result2)) { 
include 'insert1.php';
include 'delete.php';

//}
?>