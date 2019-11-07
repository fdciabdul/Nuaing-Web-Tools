<?php

class SimpleGrep {
  function __construct($url, $ref = '') {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3163.100 Safari/537.36)");
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
  curl_setopt($ch, CURLOPT_TIMEOUT, 30);
  if(!empty($ref))
    curl_setopt($ch, CURLOPT_REFERER, $ref);
    $this->res = curl_exec($ch);
    curl_close($ch);
  }
  function hasil() {
    if(!empty($this->res))
    return $this->res;
  }
}
?>