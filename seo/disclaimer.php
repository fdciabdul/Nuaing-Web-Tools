<?php 
$judul = " Disclaimer Generator Bahasa Indonesia ";
include '../head.php';
?>
<? 
$email = $_GET['email'];
$nama = $_GET['nama'];
$situs = $_GET['situs'];
?>

<div class="container">
  	<div class="panel panel-primary">
  		<div class="panel-heading">
  			<h4><center><i class="fas fa-sign-in-alt"></i> Hasil Generate</center></h4>
  		</div>
  		  <div class="panel-body">
  		  	<center>
<textarea class="form-control">
<h2>Disclaimer untuk untuk <? echo $nama; ?></h2>
Jika Anda memerlukan informasi lebih lanjut atau memiliki pertanyaan tentang penolakan situs kami, jangan ragu untuk menghubungi kami melalui email di <? echo $email; ?>

<p>
<h2>Disclaimer untuk <? echo $nama; ?></h2>
Semua informasi di situs web ini - <? echo $situs; ?> - ditunjukan dengan itikad baik dan hanya untuk tujuan informasi umum. <? echo $nama; ?> tidak membuat jaminan apa pun tentang kelengkapan, keandalan, dan keakuratan informasi ini. Segala tindakan yang Anda ambil atas informasi yang Anda temukan di situs web ini (<? echo $nama; ?>), sepenuhnya merupakan risiko Anda sendiri. <? echo $nama; ?> tidak akan bertanggung jawab atas kerugian  /  kerusakan sehubungan dengan penggunaan situs web kami. 

<p>
Dari situs  kami, Anda dapat mengunjungi situs web lain dengan mengikuti hyperlink ke situs eksternal tersebut. Meskipun kami berupaya menyediakan hanya tautan berkualitas ke situs web yang berguna dan etis, kami tidak memiliki kendali atas konten dan sifat situs ini. Tautan ini ke situs web lain tidak menyiratkan rekomendasi untuk semua konten yang ditemukan di situs ini. Pemilik dan konten situs dapat berubah tanpa pemberitahuan dan dapat terjadi sebelum kami memiliki kesempatan untuk menghapus tautan yang mungkin menjadi 'buruk'.

<p>Perlu diketahui juga bahwa ketika Anda meninggalkan situs web kami, situs lain mungkin memiliki kebijakan dan ketentuan privasi berbeda yang berada di luar kendali kami. Pastikan untuk memeriksa Kebijakan Privasi situs-situs ini serta "Ketentuan Layanan" mereka sebelum terlibat dalam bisnis apa pun atau mengunggah informasi apa pun.

<p>
<h2>Persetujuan</h2>
<p>Dengan menggunakan situs web kami, Anda dengan ini menyetujui penafian kami dan menyetujui ketentuannya.

<p>
<h2>Memperbarui</h2>
Jika kami memperbarui, mengubah atau membuat perubahan apa pun pada dokumen ini, perubahan itu akan diposting secara jelas di sini.
</textarea>

<h3> Contoh Disclaimer </h3>
<hr>
<p>
<h2>Disclaimer untuk untuk <? echo $nama; ?></h2>
Jika Anda memerlukan informasi lebih lanjut atau memiliki pertanyaan tentang penolakan situs kami, jangan ragu untuk menghubungi kami melalui email di <? echo $email; ?>

<p>
<h2>Disclaimer untuk <? echo $nama; ?></h2>
Semua informasi di situs web ini - <? echo $situs; ?> - ditunjukan dengan itikad baik dan hanya untuk tujuan informasi umum. <? echo $nama; ?> tidak membuat jaminan apa pun tentang kelengkapan, keandalan, dan keakuratan informasi ini. Segala tindakan yang Anda ambil atas informasi yang Anda temukan di situs web ini (<? echo $nama; ?>), sepenuhnya merupakan risiko Anda sendiri. <? echo $nama; ?> tidak akan bertanggung jawab atas kerugian  /  kerusakan sehubungan dengan penggunaan situs web kami. 

<p>
Dari situs  kami, Anda dapat mengunjungi situs web lain dengan mengikuti hyperlink ke situs eksternal tersebut. Meskipun kami berupaya menyediakan hanya tautan berkualitas ke situs web yang berguna dan etis, kami tidak memiliki kendali atas konten dan sifat situs ini. Tautan ini ke situs web lain tidak menyiratkan rekomendasi untuk semua konten yang ditemukan di situs ini. Pemilik dan konten situs dapat berubah tanpa pemberitahuan dan dapat terjadi sebelum kami memiliki kesempatan untuk menghapus tautan yang mungkin menjadi 'buruk'.

<p>Perlu diketahui juga bahwa ketika Anda meninggalkan situs web kami, situs lain mungkin memiliki kebijakan dan ketentuan privasi berbeda yang berada di luar kendali kami. Pastikan untuk memeriksa Kebijakan Privasi situs-situs ini serta "Ketentuan Layanan" mereka sebelum terlibat dalam bisnis apa pun atau mengunggah informasi apa pun.

<p>
<h2>Persetujuan</h2>
<p>Dengan menggunakan situs web kami, Anda dengan ini menyetujui penafian kami dan menyetujui ketentuannya.

<p>
<h2>Memperbarui</h2>
Jika kami memperbarui, mengubah atau membuat perubahan apa pun pada dokumen ini, perubahan itu akan diposting secara jelas di sini.
</div>
  		  
  	</div>
  </div>
