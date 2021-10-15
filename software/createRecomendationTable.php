<?php 
	 
//this page will add evry new product to the recomendation matrix without calculate its dissimilarity
	include('db.php'); 
	$recrec = "SELECT * FROM product where productID='27'"; 
	$queryrecrec = mysqli_query($con, $recrec);
		while($rowrecrec = mysqli_fetch_array($queryrecrec)){

		$string='id';
		$idBase = $rowrecrec['productID'];
		$idBase= (string)$idBase;
		$idBase=$string.$idBase; //this is the column name in the matrix for this product
		$BasePrice = $rowrecrec['productPrice'];
		}
	//inserting columns into matrix
	$query2= "ALTER TABLE recomendation ADD $idBase DECIMAL(2,2) NOT NULL";
	$results2 = mysqli_query($con, $query2); 
	$query3 = "INSERT INTO recomendation (id) VALUES ('$id1')";
	$results3 = mysqli_query($con, $query3);

//createRecomendationTable.php
?>