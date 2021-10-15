<?php 
	 
//this page will calculate dissimilirty for a product with all products
include('db.php'); 
	$recrec = "SELECT * FROM product where productID='$firstID'"; 
	$queryrecrec = mysqli_query($con, $recrec);

		while($rowrecrec = mysqli_fetch_array($queryrecrec)){
		$string='id';
		$idBase = $rowrecrec['productID'];
		$idbbase=$rowrecrec['productID'];
		$idBase= (string)$idBase;
		$idBase=$string.$idBase;
		$BasePrice = $rowrecrec['productPrice'];
		$baseCatogry=$rowrecrec['productType'];
		}


	//calculate highest and lowest price in all products :
	$sqlprice = " SELECT * FROM product ORDER BY productPrice";
	$queryprice = mysqli_query($con, $sqlprice);
	$count=0;
	$check = [];
	while($row88 = mysqli_fetch_array($queryprice)){$check[$count++]=$row88['productPrice'];}
	$hiestprice = $check[$count-1];
	$lowestprice = $check[0];


// here is the code for calculate orderTimes :
	$orderREcomendationSQL = "SELECT * FROM product where productID='$firstID'"; 
	$orderREcomendationRESULT = mysqli_query($con, $orderREcomendationSQL);
	while($orderREcomendationROW = mysqli_fetch_array($orderREcomendationRESULT)){
	$BaseSizeId = $orderREcomendationROW['sellerSizeID'];}
	
//retrive row of prodict with hte same size as first product from orderrecomendation
	
$orderREcomendationSQL2 = "SELECT * FROM orderrecomendation where sizeID='$BaseSizeId'"; 
$orderREcomendationRESULT2 = mysqli_query($con, $orderREcomendationSQL2);
	while($orderREcomendationROW2 = mysqli_fetch_array($orderREcomendationRESULT2)){
		$BaseSizeIdID=$orderREcomendationROW2['id'] ;
		$string='id';
		$BaseSizeIdID= (string)$BaseSizeIdID;
		$BaseSizeIdID=$string.$BaseSizeIdID;		
		$baseOrderesTimes=$orderREcomendationROW2[$BaseSizeIdID];
	}	

	//calculate highest and lowest orderTimes in all orderrecomendationtable :
	$orderREcomendationSQL3 = " SELECT * FROM orderrecomendation ORDER BY $BaseSizeIdID";
	$orderREcomendationRESULT3 = mysqli_query($con, $orderREcomendationSQL3);
	$countOrder = 0;
	$checkOrder = [];
	while($orderREcomendationROW3 = mysqli_fetch_array($orderREcomendationRESULT3)){
	if($orderREcomendationROW3['sizeID']==$BaseSizeId){}else{
	$checkOrder[$countOrder++]=$orderREcomendationROW3[$BaseSizeIdID];}}
	$hiestOrder = $checkOrder[$countOrder-1];
	$lowestOrder = $checkOrder[0];




	//start caculate dissimilarity betweeb first product and all products 
	$query3 = "select * from product";
	$results3 = mysqli_query($con, $query3);
	while ($row = mysqli_fetch_assoc($results3)){
		$id = $row['productID'];
		$rating=0;
		//heres the code to calculate the ORDERTIMES DESIMILARITY ::
		$orderREcomendationSQL4 = "select * from product where productID='$id' ";
		$orderREcomendationRESULT4 = mysqli_query($con, $orderREcomendationSQL4);
		while ($orderREcomendationROW4 = mysqli_fetch_assoc($orderREcomendationRESULT4)){
			$rating=0;
			$idORederRecomendation = $orderREcomendationROW4['sellerSizeID'];					 
			//retrive product with same size for seconed products from oredrrecomendation matrix 
			$orderREcomendationSQL5 = "SELECT * FROM orderrecomendation where sizeID='$idORederRecomendation'"; 
			$orderREcomendationRESULT5 = mysqli_query($con, $orderREcomendationSQL5);
			$orderREcomendationROW5 = mysqli_fetch_assoc($orderREcomendationRESULT5);
			if ($hiestOrder==0){$rateORDER=0; }//there is no orderes for first product
			else {
			if($orderREcomendationROW5[$BaseSizeIdID]==0) {$rateORDER = 0;}//if no intersection (no one order these two [rpducts together)
			else { $rateORDER =$rateORDER = normlized($orderREcomendationROW5[$BaseSizeIdID],$lowestOrder,$hiestOrder,$lowestOrder ); 
			}}
			if ($orderREcomendationROW5[$BaseSizeIdID]>$hiestOrder){$rateORDER=1;}//
			if ($BaseSizeId==$idORederRecomendation){$rateORDER=1;}//if they have same sizeID (the tow products have same name and same seller but different size)
			$rateORDER=1-$rateORDER;
 
	}	

		$ratee= normlized($BasePrice,$row['productPrice'],$hiestprice,$lowestprice );
		$cate=1; //to use calculate dissimiarity for category  
		if($row['productType']==$baseCatogry) {
			$cate=0;}
		$ratee=$ratee/2;//to make its wieght is 0.5
		$rating=($ratee+$cate+$rateORDER);
		$rating=($rating)/2.5;
		
		
	//update value (similarity between base and each product) of new column on all rows
		$string='id';
		$idBase22 = $row['productID'];
		$idBase22= (string)$idBase22;
		$idBase22=$string.$idBase22;
		$idbbase=intval($idbbase);
		$edit = mysqli_query($con,"update recomendation set $idBase='$rating' where id='$id'");
		$edit2 = mysqli_query($con,"update recomendation set $idBase22 ='$rating' where id='$idbbase'");
					   }

//this code is to make sure that row of first product have filled with same as the column for first product
	$sqlprice80 = " SELECT * FROM recomendation ";
	$queryprice80 = mysqli_query($con, $sqlprice80);

	while($row80 = mysqli_fetch_array($queryprice80))
		{
		$hithere='id'.$firstID;
		$seconedid=$row80['id'];
		

		$sqlprice89 = " SELECT * FROM recomendation where id= '$seconedid'";
		$queryprice89 = mysqli_query($con, $sqlprice89);
		while($row70 = mysqli_fetch_array($queryprice89 )){
			$hithere='id'.$firstID;
			$rate=$row70[$hithere];
			$idBase22='id'.$seconedid;
			$edit2 = "update recomendation set $idBase22='$rate' where id='$firstID'";
			$hihi = mysqli_query($con,"$edit2");}
		}		

?>