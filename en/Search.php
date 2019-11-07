<?php

	class Search {
		public $doc = null;
		public $results = [];
		public $limit = 10;
		public $URL = "";
		public $query = "";

		public function __construct($url) {
			$this->doc = new DomDocument;
			$this->URL = $url;

			// We need to validate our document before refering to the id
			$this->doc->validateOnParse = true;
		}

		public function response() {
			return json_encode($this->results);
		}

		public function search($query) {
			$this->query = urlencode($query);

			return $this->load();
		}

		public function setLimits($limit) {
			$this->limit = $limit;
		}

		public function load() {
			@$this->doc->loadHtml(file_get_contents($this->URL . $this->query));
			return new DOMXPath($this->doc);
		}

		public function searchClass($dom, $classname, $level="", $parent = null) {
			return $dom->query(".//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]" . $level, $parent);
		}
	}

?>