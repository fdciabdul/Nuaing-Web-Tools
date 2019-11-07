<link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
<div class="panel-group">
  
    <div class="panel panel-primary panel-transparent">
      
      <button class="collapsible">Facebook Tools</button>
<div class="content">
      </h4>
    

        <li class="list-group-item"><a href="/fb/unfriend.php">Auto Delete Inactive Facebook Friends</a><span class="label label-info pull-right">Aktif</span></li>
        <li class="list-group-item"><a href="/fb/hapusteman.php">Auto Delete Facebook Friends ( Random) </a><span class="label label-info pull-right">Aktif</span></li>
        <li class="list-group-item"><a href="/fb/statusfb.php">Auto Delete Status</a><span class="label label-info pull-right">Aktif</span></li>
 <li class="list-group-item"><a href="/invitegrup/">Auto Invite Friend To Group</a></li>
<li class="list-group-item"><a href="/fb/perisai.php">Activate Profile Guard Facebook</a></li>
<li class="list-group-item"><a href="/fb/accept.php">Auto Confirm Friends Request</a></li>
      </ul>
    
    </div>
</div>
  </div>


<div class="panel-group">
  <div class="panel panel-primary panel-transparent">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2"><font color="#000" family="Comfortaa">Blog And SEO Tools</font><i class="more-less pull-right glyphicon glyphicon-chevron-down"></i></a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <ul class="list-group">
        <li class="list-group-item"><a href="/seo/trends.php">Google Trends Keyword</li></a>
        <li class="list-group-item"><a href="/seo/disclaim.php">Disclaimer Generator Bahasa Indonesia </li></a>
        <li class="list-group-item"><a href="/seo/privasi.php">Privacy Policy Generator Bahasa Indonesia</li></a>
<li class="list-group-item"><a href="/seo/keyword.php">Keyword Research Tool</li></a>
<li class="list-group-item"><a href="/seo/pagelink.php">Extract Page Link</li></a>
<li class="list-group-item"><a href="/seo/analytic.php">Analytic Search</li></a>

      </ul>
    </div>
  </div>

<div class="panel-group">
  <div class="panel panel-primary panel-transparent">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#download"><font color="#000" family="Comfortaa">Downloader</font><i class="more-less pull-right glyphicon glyphicon-chevron-down"></i></a>
      </h4>
    </div>
    <div id="download" class="panel-collapse collapse">
      <ul class="list-group">
        <li class="list-group-item"><a href="/downloader/insta.php">Instagram Photo/Video Downloader</li></a>
        <li class="list-group-item"><a href="/downloader/pinterest.php">Twitter Downloader </li></a>
        <li class="list-group-item"><a href="/downloader/b">Facebook Video Downloader</li></a>
<li class="list-group-item"><a href="/yt/">Youtube Downloader</li></a>


      </ul>
     
   </div>
</div>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
<script>
 $('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });</script>