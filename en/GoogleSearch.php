<?php

	require_once ("Search.php");

	class GoogleSearch extends Search {

		public $URL = 'https://www.google.co.in/search?q=';

		public function __construct() {
			parent::__construct($this->URL);
		}

		public function process($query) {
			$dom = $this->search($query);

			/** Normal Results **/
			$titles = $this->searchClass($dom, "r", "/a");
			$descriptions = $this->searchClass($dom, "st");

			for($item = 0; $item < $titles->length && $item < $this->limit && $item < $descriptions->length; $item++) {
				$title = $titles->item($item);
				$desc = $descriptions->item($item);

				$node = [];

		    	$url = $title->getAttribute("href");
		    	$pos = strpos($url, '&');
		    	if($pos != -1) {
		    		$url = substr($url, 7, $pos - 7);
		    	}


		    	$node['url'] = $url;
		    	$node['title'] = $title->textContent;
		    	$node['description'] = $desc->textContent;

		    	$this->results[] = $node;
			}

			/** Check for right side details **/
			/*$rhs = $this->doc->getElementById("rhs_block");

			if($rhs && $rhs->childNodes->length >= 1) {
				$rhs = $rhs->childNodes[0]->childNodes[0];

				// right side exists
				$images = $rhs->childNodes[0]->childNodes[0]->childNodes[0]->childNodes[0]->getAttribute("title");
							//$this->searchClass($dom, "bicc", "/a/g-img/img", $rhs);
				$title = $rhs->childNodes[1]->childNodes[0]->childNodes[0];
							//$this->searchClass($dom, "kno-ecr-pt", "", $rhs);
				$detail = $rhs->childNodes[1]->childNodes[0]->childNodes[1];
							//$this->searchClass($dom, "_gdf", "", $rhs);
				$ratings = $rhs->childNodes->length > 3 ? $rhs->childNodes[2]: null;
				$summary = $rhs->childNodes->length > 3 ? $rhs->childNodes[3]: $rhs->childNodes[2];
							//$this->searchClass($dom, "kno-rdesc", "", $rhs);
				$url = "";//$summary->childNodes[1]->childNodes[1]->getAttribute("href");

				$node = [];
				$node['url'] = $url;
				$node['title'] = $title->textContent;
				$node['detail'] = $detail->textContent;
				$node['summary'] = $summary->textContent;
				$node['images'] = $images;
				$node['ratings'] = $ratings;

				$this->results[] = $node;
			}*/
		}
	}

?>