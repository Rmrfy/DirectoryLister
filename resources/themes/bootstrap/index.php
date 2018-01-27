<!DOCTYPE html>
<?php 
header("Content-type: text/html; charset=utf-8"); 
$md_path_all = $lister->getListedPath();
$md_path = explode("com", $md_path_all);
if($md_path[1] != ""){
	$md_path_last = substr($md_path[1], -1);
	if($md_path_last != "/"){
		$md_file = ".".$md_path[1]."/README.html";
	}else{
		$md_file = ".".$md_path[1]."README.html";
	}
}
$md_text = file_get_contents($md_file);
?>
<html>
    <head>
        <title>rm rf 97 <?php echo $md_path_all; ?></title>
        <link rel="shortcut icon" href="/resources/themes/bootstrap/img/folder.png">
        <link rel="stylesheet" href="/resources/themes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/resources/themes/bootstrap/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/resources/themes/bootstrap/css/style.css">
		<link href="/resources/themes/bootstrap/css/prism.css" rel="stylesheet" />
        <script src="/resources/themes/bootstrap/js/jquery.min.js"></script>
		<script src="/resources/themes/bootstrap/js/prism.js"></script>
		<script src="/resources/themes/bootstrap/js/bootstrap.min.js"></script>
        <!-- script type="text/javascript" src="/resources/themes/bootstrap/js/directorylister.js"></script -->
        <!-- link rel="stylesheet" type="text/css"  href="//fonts.googleapis.com/css?family=Cutive+Mono" -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <?php file_exists('analytics.inc') ? include('analytics.inc') : false; ?>
		<script type="text/JavaScript">
// 收藏本站
		function AddFavorite(title, url) {
			try {
				window.external.addFavorite(url, title);
			}
			catch (e) {
				try {
					window.sidebar.addPanel(title, url, "");
				}
				catch (e) {
					alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
				}
			}
		}
</script>
    </head>
    <body>
        <div id="page-navbar" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <?php $breadcrumbs = $lister->listBreadcrumbs(); ?>
                <p class="navbar-text">
                    <?php foreach($breadcrumbs as $breadcrumb): ?>
                        <?php if ($breadcrumb != end($breadcrumbs)): ?>
                                <a href="<?php echo $breadcrumb['link']; ?>"><?php echo $breadcrumb['text']; ?></a>
                                <span class="divider">/</span>
                        <?php else: ?>
                            <?php echo $breadcrumb['text']; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </p>
            </div>
        </div>
		<div class="container">
        <div class="announcement">
		<i class="fa fa-volume-down" style="display: inline-block;font-size: 15px;margin: 0;line-height: 1;color: #444;"></i><p style="display: inline-block;font-size: 15px;margin: 0;line-height: 1;text-indent: 5px;" >顶部公告栏</p>
		</div>
		</div>
		<div id="page-content" class="container">
            <?php file_exists('header.php') ? include('header.php') : include($lister->getThemePath(true) . "/default_header.php"); ?>
            <?php if($lister->getSystemMessages()): ?>
                <?php foreach ($lister->getSystemMessages() as $message): ?>
                    <div class="alert alert-<?php echo $message['type']; ?>">
                        <?php echo $message['text']; ?>
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div id="directory-list-header">
                <div class="row">
                    <div class="col-md-7 col-sm-6 col-xs-10">文件</div>
                    <div class="col-md-2 col-sm-2 col-xs-2 text-right">大小</div>
                    <div class="col-md-3 col-sm-4 hidden-xs text-right">最后修改时间</div>
                </div>
            </div>
            <ul id="directory-listing" class="nav nav-pills nav-stacked">
                <?php foreach($dirArray as $name => $fileInfo): ?>
                    <li data-name="<?php echo $name; ?>" data-href="<?php echo $fileInfo['url_path']; ?>">
                        <a href="<?php echo $fileInfo['url_path']; ?>" class="clearfix" data-name="<?php echo $name; ?>">
                            <div class="row">
                                <span class="file-name col-md-7 col-sm-6 col-xs-9">
                                    <i class="fa <?php echo $fileInfo['icon_class']; ?> fa-fw"></i>
                                    <?php echo $name; ?>
                                </span>
                                <span class="file-size col-md-2 col-sm-2 col-xs-3 text-right">
                                    <?php echo $fileInfo['file_size']; ?>
                                </span>
                                <span class="file-modified col-md-3 col-sm-4 hidden-xs text-right">
                                    <?php echo $fileInfo['mod_time']; ?>
                                </span>
                            </div>
                        </a>
                        <?php if (is_file($fileInfo['file_path'])): ?>
                            <!-- a href="javascript:void(0)" class="file-info-button">
                                <i class="fa fa-info-circle"></i>
                            </a -->
                        <?php else: ?>
                            <?php if ($lister->containsIndex($fileInfo['file_path'])): ?>
                                <a href="<?php echo $fileInfo['file_path']; ?>" class="web-link-button" <?php if($lister->externalLinksNewWindow()): ?>target="_blank"<?php endif; ?>>
                                    <i class="fa fa-external-link"></i>
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
		<!-- 说明 -->


<div class="container readme-background">
	<div class="readme">
	<h2>一些科学上网的软件</h2>
		<p>本页面是一些科学上网的 Windows/Linux/Mac 软件。</p>
		<p>本页面的软件均已实现定时 检测最新版本 并自动更新的功能，可能存在一些延迟（解放了，不用每次都要我手动下载上传了！</p>
		<p><a href="javascript:void(0);" onclick="AddFavorite('DOUBI Soft',location.href)">收藏本页</a> 即可关注最新的科学上网软件，或者关注 <a target="_blank" href="https://doub.io/pckxsw/">电脑科学上网APP合集</a></p>
		<p>如果你需要 Android科学上网APP，那么请去：<a target="_blank" href="https://softs.fun/?dir=科学上网/Android">逗比云 - Android页面</a>，或关注 <a target="_blank" href="https://doub.io/androidkxsw/">安卓科学上网APP合集</a></p>
		<blockquote>本页面的APP均可以完全免费使用，部分软件可能 需要账号才能使用(比如: Shadowsocks)！</blockquote>
	<h3>Shadowsocks（分支 - ShadowsocksR / SSCap）</h3>
	<ul>
		<li><strong>软件说明: </strong>Shadowsocks 是目前 最稳定、快速 的科学上网工具之一</li>
		<li><strong>系统支持: </strong>Windows / Linux / Mac / Android / Openwrt / IOS</li>
		<li><strong>使用方法: </strong><a target="_blank" href="https://doub.io/ss-jc10/">https://doub.io/ss-jc10/</a></li>
		<li><strong>项目地址: </strong>Shadowsocks(<a target="_blank" href="https://github.com/shadowsocks/shadowsocks-windows/releases">Github</a>、<a target="_blank" href="http://www.shadowsocks.org">官方网站</a>)、ShadowsocksR(<a target="_blank" href="https://github.com/breakwa11/shadowsocks-csharp/releases">Github</a>)、SSCap(<a target="_blank" href="https://sourceforge.net/projects/sscap/">下载站</a>)</li>
	</ul>
	<h3>GoGo</h3>
	<ul>
		<li><strong>软件说明: </strong>GoGo 是一款基于 Java开发的完全异步非阻塞的高性能代理工具</li>
		<li><strong>系统支持: </strong>Windows / Linux / Mac</li>
		<li><strong>使用方法: </strong><a target="_blank" href="https://doub.io/wlzy-23/">https://doub.io/wlzy-23/</a></li>
		<li><strong>项目地址: </strong><a target="_blank" href="http://www.gogotunnel.com/">官方网站</a></li>
	</ul>
	<h3>Brook</h3>
	<ul>
		<li><strong>软件说明: </strong>Brook是一个优秀的跨平台 Socks5代理工具</li>
		<li><strong>系统支持: </strong>Windows / Linux / Mac / <a target="_blank" href="https://softs.pw/?dir=%E7%A7%91%E5%AD%A6%E4%B8%8A%E7%BD%91/Android/Brook">Android</a> / IOS</li>
		<li><strong>使用方法: </strong><a target="_blank" href="https://doub.io/brook-jc2/">https://doub.io/brook-jc2/</a></li>
		<li><strong>项目地址: </strong><a target="_blank" href="https://github.com/txthinking/brook">Github</a></li>
	</ul>
    <h3>GoFlyway</h3>
	<ul>
		<li><strong>软件说明: </strong>GoFlyway是一个由Go语言编写的 HTTP代理工具</li>
		<li><strong>系统支持: </strong>Windows / Linux</li>
		<li><strong>使用方法: </strong><a target="_blank" href="https://doub.io/goflyway-jc1/">https://doub.io/goflyway-jc1/</a></li>
		<li><strong>项目地址: </strong><a target="_blank" href="https://github.com/coyove/goflyway">Github</a></li>
	</ul>
	<h3>PipeSocks</h3>
	<ul>
		<li><strong>软件说明: </strong>PipeSocks 是一款最新开发、高效的Socks5代理工具</li>
		<li><strong>系统支持: </strong>Windows / Linux / Mac</li>
		<li><strong>使用方法: </strong><a target="_blank" href="https://doub.io/pipesocks-jc1/">https://doub.io/pipesocks-jc1/</a></li>
		<li><strong>项目地址: </strong><a target="_blank" href="https://github.com/pipesocks/pipesocks">Github</a>、<a target="_blank" href="https://pipesocks.github.io/index-cn.html">官方网站</a></li>
	</ul>
	<h3>dowsDNS</h3>
	<ul>
		<li><strong>软件说明: </strong>dowsDNS 是一款通过建立 本地DNS服务 来实现科学上网的工具</li>
		<li><strong>系统支持: </strong>Windows / Linux</li>
		<li><strong>使用方法: </strong><a target="_blank" href="https://doub.io/wlzy-26/">https://doub.io/wlzy-26/</a></li>
		<li><strong>项目地址: </strong><a target="_blank" href="https://github.com/dowsnature/dowsDNS/">Github</a></li>
	</ul>
	<h3>XX-Net</h3>
	<ul>
		<li><strong>软件说明: </strong>XX-Net 是一个已经配置好 并 可视化 易操作的 GoAgent</li>
		<li><strong>系统支持: </strong>Windows / Mac</li>
		<li><strong>项目地址: </strong><a target="_blank" href="https://github.com/XX-net/XX-Net">Github</a></li>
	</ul>
	<h3>Firefly</h3>
	<ul>
		<li><strong>软件说明: </strong>Firefly 是一款很早就有的代理软件，一直坚持更新，虽然速度一般，但毕竟是免费</li>
		<li><strong>系统支持: </strong>Windows / Linux / Mac / Android</li>
		<li><strong>项目地址: </strong><a target="_blank" href="https://github.com/yinghuocho/firefly-proxy">Github</a></li>
	</ul>
	<h3>TorBrowser</h3>
	<ul>
		<li><strong>软件说明: </strong>TorBrowser 基于 Mozilla Firefox浏览器制作，配合Tor代理，可匿名访问网络</li>
		<li><strong>系统支持: </strong>Windows / Linux / Mac / Android / IOS</li>
		<li><strong>项目地址: </strong><a target="_blank" href="http://www.torproject.org/index.html.en">官方网站</a></li>
	</ul>
	</div>
</div>               <!-- 说明 -->

#		<?php
#		if($md_text != ""){
#			echo $md_text;
#		}
#		?>

























   <?php file_exists('footer.php') ? include('footer.php') : include($lister->getThemePath(true) . "/default_footer.php"); ?>
        <!-- div id="file-info-modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{modal_header}}</h4>
                    </div>
                    <div class="modal-body">
                        <table id="file-info" class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="table-title">MD5</td>
                                    <td class="md5-hash">{{md5_sum}}</td>
                                </tr>
                                <tr>
                                    <td class="table-title">SHA1</td>
                                    <td class="sha1-hash">{{sha1_sum}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div -->
    </body>
</html>
