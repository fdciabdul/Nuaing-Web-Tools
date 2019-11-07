<?php 

	require_once ("Search.php");
	
	class BingSearch extends Search {

		public $URL = 'http://www.bing.com/search?q=';

		public function __construct() {
			parent::__construct($this->URL);
		}

		public function process($query) {
			$dom = $this->search($query);
			$holders = $this->searchClass($dom, "b_algo");

			for($item = 0; $item < $holders->length && $item < $this->limit; $item++) {

		    	$title = $holders->item($item)->childNodes[0]->childNodes[0];
		    	$desc = $this->searchClass($dom, "b_caption", "/p", $holders->item($item));

		    	$node = [];
		    	$url = $title->getAttribute("href");

		    	$node['url'] = $url;
		    	$node['title'] = $title->textContent;
		    	$node['description'] = $desc->length > 0 ? $desc[0]->textContent: "";

		    	$this->results[] = $node;
			}
		}
	}

?>