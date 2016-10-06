<?php

/**
 * Global helpers file with misc functions
 **/
if (! function_exists('producttree1')) {
	function producttree1($products , $i , $parentneed) {
		if (!empty($products)) {
		    foreach ($products as $product) {
	            $mrp[$i]['id']         = $i;
	            $mrp[$i]['number']     = $product->number;
	            $mrp[$i]['name']       = $product->name;
	            $mrp[$i]['total']      = $product->total;
	            $mrp[$i]['need']       = $parentneed * $product->factor;
	            $mrp[$i]['excess']     = $mrp[$i]['total'] - $mrp[$i]['need'];
	            $mrp[$i]['unit']       = $product->unit;
	            $mrp[$i]['type']       = $product->type;
	            $mrp[$i]['depository'] = $product->depository;
	            $parentneed            = $mrp[$i]['need'];
	            $i++;
	            $products = App\Models\Luster\Product::where('parent_id' , $product->id)->get();
	            producttree($products,$i,$parentneed);
		    }
		}
	}
}

if (! function_exists('producttree')) {
	function producttree($products , $i , $parentneed) {
		if (!empty($products)) {
		    foreach ($products as $product) {
		        $mrp[$i]['id']         = $i;
		        $mrp[$i]['number']     = $product->number;
		        $mrp[$i]['name']       = $product->name;
		        $mrp[$i]['total']      = $product->total;
		        $mrp[$i]['need']       = $parentneed * $product->factor;
		        $mrp[$i]['excess']     = $mrp[$i]['total'] - $mrp[$i]['need'];
		        $mrp[$i]['unit']       = $product->unit;
		        $mrp[$i]['type']       = $product->type;
		        $mrp[$i]['depository'] = $product->depository;
		        $parentneed            = $mrp[$i]['need'];
		        $i++;
		        $products = App\Models\Luster\Product::where('parent_id' , $product->id)->get();
            	producttree1($products,$i,$parentneed);
		    }
		}
	}
}

if (! function_exists('app_name')) {
	/**
	 * Helper to grab the application name
	 *
	 * @return mixed
	 */
	function app_name() {
		return config('app.name');
	}
}

if ( ! function_exists('access'))
{
	/**
	 * Access (lol) the Access:: facade as a simple function
	 */
	function access()
	{
		return app('access');
	}
}

if ( ! function_exists('javascript'))
{
	/**
	 * Access the javascript helper
	 */
	function javascript()
	{
		return app('JavaScript');
	}
}

if ( ! function_exists('gravatar'))
{
	/**
	 * Access the gravatar helper
	 */
	function gravatar()
	{
		return app('gravatar');
	}
}