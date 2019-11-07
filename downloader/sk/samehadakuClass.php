<?php
class SamehadakuClass{
	public function Request($path='',$host="https://www.samehadaku.tv",$post=''){
		$url=$host."/".$path;
		$ch2 = curl_init();
		curl_setopt ($ch2, CURLOPT_URL, $url);
		curl_setopt ($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt ($ch2, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.64 Safari/537.31"); 
		curl_setopt ($ch2, CURLOPT_TIMEOUT, 60);
		curl_setopt ($ch2, CURLOPT_SSL_VERIFYHOST, false); 
		curl_setopt ($ch2, CURLOPT_FOLLOWLOCATION, 1);
		if($post!==''){			
			curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($post));
		}
		curl_setopt ($ch2, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch2, CURLOPT_REFERER, $url);
		$result = curl_exec ($ch2);
		curl_close($ch2);
		return $result;
	}

	public function getNewestAnime($page=1){
		if($page==1){
			$result = $this->Request();
		}else{
			$result = $this->Request('page/'.$page);
		}
		preg_match('~<div class="[^>]*updateanime"[^>]*>\s*(<div.*?\s*</div>\s*)</div>~is', $result, $list);
		preg_match_all('~<li itemscope="itemscope"[^>]*>(.*?)</li>~si', $list[1], $matches);
		$animes = array();
		foreach($matches[1] as $m){
			preg_match('~<h2 class="entry-title"[^>]*>(.*?)</h2>~si', $m, $matches2);
			preg_match( '/href="(.*?)"/i', $matches2[1], $href );
			preg_match( '/title="(.*?)"/i', $matches2[1], $title );
			$link = $href[1];
			$slug = explode('/', $link);
			$slug = $slug[3];
			$title = $title[1];
			$animes[] = array('title'=>$title,'slug'=>$slug);
		}
		return $animes;
	}
	public function getAnimeDetails($slug){
		$result = $this->Request($slug);

		preg_match('~<div class="dtlx"[^>]*>(.*?)</div>~si', $result, $t);
		preg_match( '/href="(.*?)"/i', $t[1], $tag);
		$tag = $tag[1];
		$ptag = parse_url($tag);
		$tag = $ptag['path'];
		preg_match('~<h1 class="entry-title"[^>]*>(.*?)</h1>~si', $result, $title);
		$title = strip_tags($title[1]);
		preg_match('~<([a-z]*)\b[^>]*>Sinopsis(.*?)</\1>~si', $result, $sinopsis);
		if(isset($sinopsis[2])){
			$sinopsis = $sinopsis[2];
			$sinopsis = explode(":", $sinopsis);
			$sinopsis = trim($sinopsis[1]);
		}else{
			$sinopsis = '';
		}
		preg_match('~<span[^>]*>Genres: (.*?)</span>~si', $result, $genre);
		if(isset($genre[1])){
			$genre = $genre[1];
		}else{
			$genre = '';
		}
		preg_match_all('~<p[^>]*>(.*?)(?:[\r\n])?(?:<[^>]*>)?</p>(?:[\r\n]</div>)?[\r\n]<div class="download-eps"[^>]*~', $result, $jenis);
		$list_jenis_video = array();
		foreach($jenis[1] as $j){
			$list_jenis_video[] = strip_tags($j);
		}

		$download = array();
		preg_match_all('~<div class="download-eps"[^>]*>(.*?)</div>~si', $result, $eps);
		foreach($eps[1] as $k => $e){
			preg_match_all('~<li[^>]*>(.*?)</li>~si', $e, $vid);
			foreach($vid[1] as $v){
				preg_match('~<strong>(.*?)</strong>~si', $v, $quality);
				if(isset($quality[1])){
					$quality = utf8_encode(strtolower($quality[1]));
					$quality = preg_replace('/[^a-zA-Z0-9_-]/s','',$quality);
					preg_match_all('~<a[^>]*>(.*?)</a>~si', $v, $link);
					foreach($link[0] as $key => $value){
						preg_match( '/href="(.*?)"/i', $value, $href);
						$href = $href[1];
						$server = trim(strip_tags($link[1][$key]));
						$download[$k][$quality][] = array('link'=>$href,'server'=>$server);
					}
				}
			}
		}

		$res = array('title'=>$title,'genre'=>$genre,'synopsis'=>$sinopsis,'tag'=>$tag,'video_type'=>$list_jenis_video,'download_links'=>$download);
		return $res;
	}
	public function getAnimesByTag($tag){
		$result = $this->Request($tag);
		preg_match('~<div class="[^>]*episodelist"[^>]*>\s*(<div.*?\s*</div>\s*)</div>~is', $result, $list);

		preg_match_all('~<li>(.*?)</li>~si', $list[1], $eps);
		$list = array();
		foreach($eps[1] as $e){
			preg_match('~<span class="lefttitle[^>]*">(.*?)</span>~si', $e, $detail);
			preg_match('~<a[^>]*">(.*?)</a>~si', $detail[1], $title);
			preg_match( '/href="(.*?)"/i', $detail[1], $href);
			$href = trim($href[1]);
			$title = trim($title[1]);
			$list[] = array('href'=>$href,'title'=>$title);
		}
		return $list;
	}
	public function Bypass($url){
		$purl = parse_url($url);
		$host = $purl['host'];
		if($host=='anjay.info'||$host=='www.anjay.info'){
			$url = trim($url);
			$result = $this->Request('',$url);
			preg_match('~<input[^>]*name="eastsafelink_id" value="(.*?)"[^>]*>~si', $result, $id);
			preg_match('~<form[^>]*action="(.*?)"[^>]*>~si', $result, $form);
			$post = array('eastsafelink_id'=>$id[1]);
			$url = $form[1];
			$result = $this->Request('',$url,$post);
			preg_match("~<script type='text/javascript'>(.*?)</script>~si", $result, $revurl);
			preg_match("/a='(.*?)'/i", trim($revurl[1]), $njir );
			$url = $njir[1];
			$result = $this->Request('',$url);
			preg_match('~<div class="download-link[^>]*">(.*?)</div>~si', $result, $matches);
			preg_match( '/href="(.*?)"/i', $matches[1], $array );
			preg_match('/r=([^&#]*)/',$array[1],$m);
			$fsl = base64_decode($m[1]);
			return $fsl;
		}else{
			$result = $this->Request('',$url);
			preg_match_all('~<div class="download-link[^>]*">(.*?)</div>~si', $result, $matches);
			preg_match( '/href="(.*?)"/i', $matches[1][0], $array );
			preg_match_all('/r=([^&#]*)/',$array[1],$m);
			$fsl = base64_decode($m[1][0]);
			preg_match('/url=([^&#]*)/',$fsl,$m);
			if(empty($m)){
				$url = $fsl;
				$result = $this->Request('',$url);
				preg_match_all('~<div class="download-link[^>]*">(.*?)</div>~si', $result, $matches);
				if(isset($matches[1][0])){
					preg_match( '/href="(.*?)"/i', $matches[1][0], $array );
					preg_match_all('/r=([^&#]*)/',$array[1],$m);
					$link = base64_decode($m[1][0]);
				}else{
					$link = $fsl;
				}
			}else{
				$plink = parse_url($fsl);
				$host = $plink['host'];
				$link = base64_decode($m[1]);
				if($host=='www.njiir.com'){
					$link = $this->decodeNjir($link);
				}
			}
			return $link;
		}
	}

	public function decodeNjir($string){
		$decode = array(
			"a" => "I",
			"b" => "J",
			"c" => "K",
			"d" => "L",
			"e" => "M",
			"f" => "N",
			"g" => "O",
			"h" => "%40",
			"i" => "A",
			"j" => "B",
			"k" => "C",
			"l" => "D",
			"m" => "E",
			"n" => "F",
			"o" => "G",
			"p" => "X",
			"q" => "Y",
			"r" => "Z",
			"s" => "%5B",
			"t" => "%5C",
			"u" => "%5D",
			"v" => "%5E",
			"w" => "_",
			"x" => "P",
			"y" => "Q",
			"z" => "R",
			":" => "%12",
			"/" => "%07",
			"~" => "V",
			"`" => "H",
			"!" => "%09",
			"@" => "h",
			"#" => "%0B",
			"$" => "%0C",
			"%" => "%0D",
			"^" => "v",
			"&" => "%0E",
			"*" => "%02",
			"(" => "%00",
			")" => "%01",
			"-" => "%05",
			"_" => "w",
			"=" => "%15",
			"+" => "%03",
			"[" => "s",
			"{" => "S",
			"]" => "u",
			"}" => "U",
			"|" => "T",
			";" => "%13",
			":" => "%12",
			"'" => "%0F",
			'"' => "%0A",
			"'" => "%0F",
			"<" => "%14",
			"," => "%04",
			">" => "%16",
			"." => "%06",
			"?" => "%17",
			"/" => "%07",
			"A" => "i",
			"B" => "j",
			"C" => "k",
			"D" => "l",
			"E" => "m",
			"F" => "n",
			"G" => "o",
			"H" => "%60",
			"I" => "a",
			"J" => "b",
			"K" => "c",
			"L" => "d",
			"M" => "e",
			"N" => "f",
			"O" => "g",
			"P" => "x",
			"Q" => "y",
			"R" => "z",
			"S" => "%7B",
			"T" => "%7C",
			"U" => "%7D",
			"V" => "~",
			"W" => "%7F",
			"X" => "p",
			"Y" => "q",
			"Z" => "r",
			"1" => "%19",
			"2" => "%1A",
			"3" => "%1B",
			"4" => "%1C",
			"5" => "%1D",
			"6" => "%1E",
			"7" => "%1F",
			"8" => "%10",
			"9" => "%11",
			"0" => "%18"
		);
		$string = str_replace("##", "", $string);
		$a = explode("%", $string);
		$decoded = array();
		foreach($a as $k => $b){
			if($k==0){
				for($i=0;$i<strlen($b);$i++){
					$decoded[] = $b[$i];
				}
			}else{
				$a = substr($b, 0,2);
				$decoded[] = "%".$a;
				$b = substr($b, 2 , strlen($b));
				for($i=0;$i<strlen($b);$i++){
					$decoded[] = $b[$i];
				}
			}
		}
		$jadi = "";
		foreach($decoded as $d){
			$jadi .= array_search($d, $decode);
		}

		return strrev($jadi);
	}
}