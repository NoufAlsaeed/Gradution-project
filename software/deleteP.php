  <?php

  include('db.php'); // Using database connection file here


    //$Quantity =	$_GET['quantity'];
	 $id = 	$_GET['idd'];
$sqle = "SELECT * FROM product WHERE productID = '$id'"; 
$result = mysqli_query($db,$sqle); 

        while ($row = mysqli_fetch_assoc($result)){ 			  
              $sql_u = "SELECT * FROM ordered_items WHERE productID='$id'";
              $res_u = mysqli_query($con, $sql_u);
              if (mysqli_num_rows($res_u) > 0) {
		         if ($row['requestedToDeleteProduct']=='N'){
	 	              $sqlreq = mysqli_query($db,"update product set requestedToDeleteProduct='Y' where productID='$id'");
					  	echo '<script language="javascript">';
                        echo 'alert("حاول حذف المنتج عندما يتم اغلاق الطلبات الحاليه على هذا المنتج لكن حاليا لن يستطيع اي مشتري انشاء طلب جديد بهذا المنتج"); location.href="sViewProducts.php"';
                        echo '</script>';
			     }
					         if ($row['requestedToDeleteProduct']=='Y'){
					  	echo '<script language="javascript">';
                        echo 'alert("حاول حذف المنتج عندما يتم اغلاق الطلبات الحاليه على هذا المنتج لكن حاليا لن يستطيع اي مشتري انشاء طلب جديد بهذا المنتج"); location.href="sViewProducts.php"';
                        echo '</script>';
			     }
              } 
	         else if (mysqli_num_rows($res_u) == 0) { 
                  $sql2 = "DELETE FROM product WHERE productID='$id'";
                  mysqli_query($con, $sql2);
				  	echo '<script language="javascript">';
                    echo 'alert("سيتم حذف المنتج نهائيا"); location.href="sViewProducts.php"';
                    echo '</script>';
                  }
			}
	echo '<script language="javascript">';
    echo 'alert("سيتم حذف المنتج نهائيا"); location.href="sViewProducts.php"';
    echo '</script>';

    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:sViewProducts.php"); // redirects to all records page
        exit;
    }
    else
    {
		    die('Error: ' . mysqli_error($db));
    }    	

?>