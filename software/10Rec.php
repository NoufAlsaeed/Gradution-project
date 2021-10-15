<?php 
//this page will retrieve dissimilarity between a product and all products in recomendation matrix and order them by most similar , it also does not count the products with same name and same seller as the product but have diffirent size
include('db.php');
$id=$_GET['idd'];
$BaseId='id';
$BaseId=$BaseId.$id;
//it should be retrieve the recomendation
$sqlprice = "SELECT * FROM recomendation ORDER BY $BaseId";
$queryprice = mysqli_query($con, $sqlprice);
$count=0;
$allProducts = [];
    while($row = mysqli_fetch_array($queryprice)){
		$iddid=$row['id'];
		$sqlprice2 = "SELECT * FROM recomendation WHERE id='$iddid'";
$queryprice2 = mysqli_query($con, $sqlprice2);
		while($row2 = mysqli_fetch_array($queryprice2)){
		if($row2[$BaseId]!=0.00){
		$allProducts[$count++]=$row2['id'];}
		}
		

		}
	// $allProducts array have all products id in recomendation matrix of this column(the base product)
		
$countRecoReco=0;
$allsellerSIzeID = [];
//	allsellerSIzeID this array will store all sellerId for products in all products (so i can check if a product is same as base product but have different size then i will not add it to the array that i will recomend for user)
	foreach( $allProducts as $valueRecomendation ) { 
        $sqlForRecomendation = "SELECT * FROM product WHERE productID= '$valueRecomendation'"; 
        $resultForSRecomendation = mysqli_query($con, $sqlForRecomendation); 
		while($rowForRecomendation = mysqli_fetch_array($resultForSRecomendation)) {
			$allsellerSIzeID[$countRecoReco]=$rowForRecomendation['sellerSizeID'];
			$allsellerSIzeID[$countRecoReco++] ;
		} 
	}
	
$TeRecCounter=0;
$TeRecomendation = [];	
$recrec = "SELECT * FROM product where productID='$id'"; 
$queryrecrec = mysqli_query($con, $recrec);
    while($rowrecrec = mysqli_fetch_array($queryrecrec)){
		$ind=0;
		foreach( $allProducts as $valueFirst ) { 	
			if($rowrecrec['sellerSizeID']!=$allsellerSIzeID[$ind]) {
				$TeRecomendation[$TeRecCounter] = $valueFirst; 
				$TeRecomendation[$TeRecCounter++] ;		
			}
		 
			$ind++;
		}		
	}
//pick most 5 product similar and order them
	$TeRecomendation=array_slice($TeRecomendation, 0, 5);	$TeRecCounter=5;
$TenRecCounter=0;
$TenRecomendation = [];	
	foreach ( $TeRecomendation as $v){
		$TenRecomendation[$TenRecCounter] = $TeRecomendation[$TeRecCounter-1];		
		$TeRecCounter-- ;
		$TenRecomendation[$TenRecCounter++] ;
		  
	}
	
?>