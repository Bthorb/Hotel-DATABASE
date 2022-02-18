<?php
$conn2 = new mysqli("localhost", "root", "", "motel");
// $sql2 = "SELECT
// `Renter_id`,
// `Name`,
// `Room_number`
// FROM
// `renter`
// WHERE
// 1";
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];          
          $sql2 = "DELETE tenant,apartment 
          FROM apartment 
          LEFT OUTER JOIN tenant ON apartment.tenant_code = tenant.tenant_code
          WHERE apartment.tenant_code = '$id'";          
           
           // $sql = "SELECT * FROM tb_member WHERE id='$id' ";
           $result2 = mysqli_query($conn2, $sql2);
        // echo "<script type='text/javascript'>";
           echo "<script>";
        // echo "if (confirm('Do you want to delete?')){";
        // echo "window.location = 'table.php' };"; 
           echo "window.location = 'test.php'; ";
           echo "</script>";
        // if (confirm("Press a button!")) {
        // }
        // else {
        // }
}



        
//      }
//     else{
        // echo $_GET['id'];
        // $id = $_GET['id'];
        //    $sql2 = "DELETE FROM `renter` WHERE  `renter`.`Renter_id`= '$id'";
        //    // $sql = "SELECT * FROM tb_member WHERE id='$id' ";
        //    $result2 = mysqli_query($conn2, $sql2);
         // $row = mysqli_fetch_array($result);
          // echo $_GET["id"];
          //  echo "<h1>hello word</h1>";
    // }   
?>

<!-- <!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
  
  <div id="id03" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id03').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Modal Header</h2>
      </header>
      <?php foreach($result2 as $one) {?>
      <div class="w3-container">
        <p><?php echo $one['Renter_id'];?></p>
        <p><?php echo $one['Name'];?></p>
      </div>
      <?php } ?>
      <footer class="w3-container w3-teal">
        <p>Modal Footer</p>
      </footer>
    </div>
  </div>
</div>
</body>
</html>

<script>
function myFunction() {
  setTimeout(function(){ alert("Hello");
    window.location = './table.php'
   }, 1000);
}
</script> -->