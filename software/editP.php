  <?php

include "loginphp.php"; // Using database connection file here

if(isset($_GET['update'])) // when click on Update button
{

    $Quantity =	$_GET['quantity'];
	 $id = 	$_GET['productID'];

    $edit = mysqli_query($db,"update product set productQuantity='$Quantity' where productID='$id'");
	  

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
}
?>