<?php

// function totalValue($products, $type)
// {
// 	$totalValue = 0;

// 	foreach ($products as $product) {
// 		$totalValue += $product->$type;
// 	}

// 	return $totalValue;
// }

function currentUser()
{
    return auth()->user();    
}