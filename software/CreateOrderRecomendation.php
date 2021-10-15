 <?php 
 
//this page will add evry new product to the recomendation matrix without calculate its dissimilarity

include('db.php'); 

$recrec = "SELECT * FROM product where productID='$id1'"; 
$queryrecrec = mysqli_query($con, $recrec);

while($rowrecrec = mysqli_fetch_array($queryrecrec)){
	$string='id';
	$sizeId=$rowrecrec['sellerSizeID'];
	$idBase = $rowrecrec['productID'];
	$idbbase=$rowrecrec['productID'];
	$idBase= (string)$idBase;
	$idBase=$string.$idBase;//this is the column name in the matrix for this product
	$id = $rowrecrec['productID'];
	}
	
$recrec2 = "SELECT * FROM orderrecomendation where sizeID='$sizeId'"; 
$queryrecrec2 = mysqli_query($con, $recrec2);
if(mysqli_num_rows($queryrecrec2) == 0){
	
//inserting columns into matrix
$query2= "ALTER TABLE orderrecomendation ADD $idBase INT NOT NULL";
$results2 = mysqli_query($con, $query2);
//inserting row 
$query = "INSERT INTO orderrecomendation (id, sizeID) VALUES ('$id', '$sizeId')"; 
$results = mysqli_query($con, $query);		   


	}	
	

 ?>