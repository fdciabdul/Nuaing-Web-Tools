<?php

/*

   AniDB.net Simple XML Grabber 0.2 (2013/08/09)

   Copyright 2013, Ricky Burgin

   Licensed under the Apache Licence, Version 2.0 (the "Licence");
   you may not use this file except in compliance with the Licence.
   You may obtain a copy of the Licence at

     http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the Licence for the specific language governing permissions and
   limitations under the Licence.

*/

$xmlName = "anidb.xml"; // Desired filename
$xmlFile = "./" . $xmlName; // Desired location for file
$anidbXmlURL = "http://anidb.net/api/anime-titles.xml.gz"; // AniDB XML API URL (bloody acronyms)

function getAnidbData() {
        $c = curl_init($anidbXmlURL . ".gz"); // Init curl
        $f = fopen($xmlFile, "w"); // Init file stream
        curl_setopt($c, CURLOPT_FILE, $f); // Set curl output to file
        curl_setopt($c, CURLOPT_HEADER, 0);
        curl_exec($c); // Execute curl with params of $c
        curl_close($c);
        fclose($f); // Close streams
        uncompress($xmlFile . ".gz", $xmlFile); // Call uncompress function to gunzip the XML file, supply source and destination filepaths
        unlink($xmlFile . ".gz"); // Remove compressed version, as it is unnecessary
}

function uncompress($src, $dst) { // Take the source (compressed) and destination (uncompressed) filepaths
    $s = gzopen($src, "rb"); // Open source with PHP's gzopen function
    $d = fopen($dst, "w"); // Open filestream to write uncompressed data to

    while ($string = gzread($s, 4096)) { // Read and uncompress 4KB at a time
        fwrite($d, $string, strlen($string)); // Write to destination file
    }
    gzclose($s); // Close filestreams
    fclose($d);
}

if (file_exists($xmlFile)) // File exists
        if (time() - filemtime($xmlFile) >= 86400) getAnidbData(); // As per AniDB guidelines, we must only request one copy per day (24 hours), as such, if the file is 24 hours old, or older at time of request, we call the getAnidbData() function to fetch a new copy.

header('Content-type: application/xml'); // Set MIME-type for XML
header('Content-Description: AniDB XML');
header('Content-Disposition: attachment; filename=' . $xmlName); // Force a download
header('Expires: 0');
header('Cache-Control: must-revalidate'); // Try to ensure client does not use a local cached copy
header('Pragma: public');
header('Content-Length: ' . filesize($xmlFile));
ob_clean();
flush();
readfile($xmlFile);

?>
