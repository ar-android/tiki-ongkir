<?php 

namespace TikiOngkir;

use Symfony\Component\DomCrawler\Crawler;

/**
 * Tiki Provider
 */
class Tiki {
	
	public $origin;
	public $destination;
	public $tariff_code_origin;
	public $tariff_code_destination;
	public $weight;

    public function getOrigin() {
        return $this->origin;
    }

    public function getDestination()
    {
    	return $this->destination;
    }

    public function getTarifOrigin()
    {
    	return $this->tariff_code_origin;
    }

    public function getTarifDestination()
    {
    	return $this->tariff_code_destination;
    }

    public function getWeight()
    {
    	return $this->weight;
    }

    public function getResult()
    {
		$url = 'https://tiki.id/tarif?f='.$this->origin.'&t='.$this->destination.'&fc='.$this->tariff_code_origin.'&tc='.$this->tariff_code_destination.'&tc_i=2&tc_d=0&w=' . $this->weight;

		$options = array(
		  'http'=>array(
		    'method'=>"GET",
		    'header'=>"Accept-language: en\r\n" .
		              "Cookie: foo=bar\r\n" .  
		              "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36\r\n" // i.e. An iPad 
		  )
		);

		$context = stream_context_create($options);
		$html = file_get_contents($url, false, $context);

		$crawler = new Crawler($html);

		$content = $crawler->filter('h2')->each(function (Crawler $node, $i) {
		    return $node;
		});
		unset($content[0]);

		$data = [];
		foreach ($content as $node) {
			$item = str_split($node->text(), 3);
			$product_code = $item[0];
			$result['product_code'] = $product_code;
			$result['product_price'] = $node->children()->text();
			array_push($data, $result);
		}

		$res['success'] = true;
		$res['origin'] = $this->origin;
		$res['destination'] = $this->destination;
		$res['weight'] = $this->weight . ' Kg';
		$res['result'] = $data;

		return $res;
    }

}