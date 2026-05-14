<?php
class Similarity
{
	// it removes dublicate value and gives 0 to every possible tags
	static public function dot($tags)
	{
		// print_r($tags);
		$tags = array_unique($tags);
		$tags = array_fill_keys($tags, 0);
		ksort($tags);
		return $tags;
	}
	protected function dot_product($a, $b)
	{
		$products = array_map(function ($a, $b) {
			return $a * $b;
		}, $a, $b);
		return array_reduce($products, function ($a, $b) {
			return $a + $b;
		});
	}
	
	protected function magnitude($point)
	{
		$squares = array_map(function ($x) {
			return pow($x, 2);
		}, $point);
		return sqrt(array_reduce($squares, function ($a, $b) {
			return $a + $b;
		}));
	}
	static public function cosine($a, $b, $base)
	{
		$a = array_fill_keys($a, 1) + $base;
		$b = array_fill_keys($b, 1) + $base;

		ksort($a);
		ksort($b);

		// from chat gpt 
		$similarity = new Similarity();

		return $similarity->dot_product($a, $b) / ($similarity->magnitude($a) * $similarity->magnitude($b));

		// from our research                                         
		// return self::dot_product($a, $b) / (self::magnitude($a) * self::magnitude($b)); 
	}
	public static function checka($a, $base)
	{
		$a = array_fill_keys($a, 1) + $base;
		ksort($a);
		return $a;
	}

	public static function checkb($b, $base)
	{
		$b = array_fill_keys($b, 1) + $base;
		ksort($b);
		return $b;
	}
}