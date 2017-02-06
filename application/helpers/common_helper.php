<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('json_encode_ex')) {
	function json_encode_ex($a,$o=0) {
		return preg_replace_callback('/\\\+u([a-f0-9]{4})/', "changeUTF8", json_encode($a,$o));
	}
	function changeUTF8($m){
		if(substr_count($m[0], '\\') >= 2) return $m[0];
		return mb_convert_encoding('&#x'.$m[1].';', 'UTF-8', 'HTML-ENTITIES');
	}
}

/**
 * Filters elements of an array using a callback function operating on keys.
 * @param array $input           The array to iterate overarray to be filtered
 * @param callable $callback     The callback function to use (mandatory)
 *                               returns boolean TRUE/FALSE judgment on keys:
 *                                  function callback($keyName);
 * @return the filtered array, whose keys satisfy callback().
 */
function array_filter_keys($input, $callback) {
	return array_intersect_key(
		$input,
		array_flip(
			array_filter(
				array_keys($input),
				$callback
			)
		)
	);
}