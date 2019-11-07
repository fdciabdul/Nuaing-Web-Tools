<?php
    $kanyut = "bahasa indonesi";
    $html=file_get_contents('https://id.quora.com/search?q=bahasa+indonesia');


$dom = new DOMDocument;
$dom->loadHTML( $html );
$xp = new DOMXPath( $dom );


$query = sprintf('//div[ contains( @class,"%s" )]','title' );
$col=$xp->query( $query );

if( $col && $col->length > 0 ){

    $arr=array();
    foreach( $col as $node ){
        $arr[]=$node->nodeValue;
    }

    if( !empty( $arr ) ){
        $chunks=array_chunk( $arr, 3 );
    }

    echo '
    <table>
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Nation</th>
        </tr>';

    foreach( $chunks as $chunk ){
        echo "
        <tr>
            <td>{$chunk[0]}</td>
            <td>{$chunk[1]}</td>
            <td>{$chunk[2]}</td>
        </tr>";
    }
    echo '
    </table>';
}
