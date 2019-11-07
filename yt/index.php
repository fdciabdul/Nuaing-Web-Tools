<?php
$response = array(
    'data' => null,
    'error' => null,
);
$isResponse = false;
$isError = false;
$isSuccessResponse = false;
$providerName = null;
$url = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isResponse = true;
    require_once __DIR__ . '/YoutubeDownloader.php';
    try {
        if (!isset($_POST['url']) || !trim($_POST['url'])) {
            throw new VideoDownloaderException("Url does not set");
        }
        $url = trim($_POST['url']);
        $yd = new YoutubeDownloader($url);
        $fullInfo = $yd->getFullInfo();
        $videoId = $fullInfo['video_id'];
        $response['data'] = array(
            'baseInfo' => $yd->getBaseInfo(),
            'downloadInfo' => $yd->getDownloadsInfo(),
        );
        $isSuccessResponse = true;
    } catch (Exception $e) {
        $isError = true;
        header('Bad request', true, 400);
        $response['error'] = $e->getMessage();
    }
}

?>
<?php
include '../head.php';
$judul = " YOUTUBE DOWNLOADER";
?>
<body>
<div class="container">
    <h3 class="lol">Youtube Downloader</h3>
    <form action="" method="post" id="download-form">
        <div class="row">
            <div class="col-md-10">
                <div class="form-group <?= $isError ? 'has-error' : '' ?>">
                    <input id="video-url" title="Video url" type="text" name="url" placeholder="Video url"
                           class="form-control" value="<?= htmlspecialchars($url) ?>"/>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <button class="btn btn-primary btn-block">Get download links</button>
                </div>
            </div>
        </div>
    </form>
    <div class="alert alert-danger" role="alert" id="error-block" style="display: <?= $isError ? 'block' : 'none' ?>">
        <?= $isError ? $response['error'] : '' ?>
    </div>

    <?php if ($isSuccessResponse): ?>
        <?php
        $baseInfo = $response['data']['baseInfo'];
        $downloadInfo = $response['data']['downloadInfo'];
        ?>
    <?php endif; ?>

    <h3 id="video-name">
        <?php if ($isSuccessResponse): ?>
            <?= htmlspecialchars($baseInfo['name']) ?>
        <?php endif; ?>
    </h3>

    <div class="row">
        <div class="col-md-6" style="display: <?= $isSuccessResponse ? 'block' : 'none' ?>">
            <div id="video-preview">
                <?php if ($isSuccessResponse): ?>
                    <img src="<?= $baseInfo['previewUrl'] ?>" alt="Video preview"
                         class="img-responsive img-thumbnail img-rounded">
                <?php endif; ?>
            </div>
            
        </div>
        <div class="col-md-6">
            <table id="download-list" class="table">
                <thead <?= !$isSuccessResponse ? 'style="display: none"' : '' ?>>
                <tr>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Download link</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($isSuccessResponse): ?>
                    <?php foreach ($downloadInfo AS $downloadInfoItem): ?>
                        <tr>
                            <td><?= $downloadInfoItem['fileType'] ?></td>
                            <td><?= $downloadInfoItem['fileSizeHuman'] ?></td>
                            <td>
                                <?php
                                    $downloadUrl = 'download.php?id=' . $videoId . '&itag=' . $downloadInfoItem['youtubeItag'];
                                ?>
                                <a
                                        href="<?= $downloadUrl ?>"
                                        target="_blank"
                                        class="btn btn-success"
                                >
                                    <span class="glyphicon glyphicon-circle-arrow-down"></span>
                                    Download
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="load-shadow"
     style="display: none; width: 100%; height: 100%; left: 0; top: 0; background: rgba(63, 0, 255, 0.31); z-index: 10; position: fixed;"></div>
</body>
<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--<script src="js/youtube-downloader.js"></script>-->
</html>
<?php include '../footer.php'; ?>
