<!DOCTYPE html>
<html lang="<?= $MESSAGE['Page.Html.Lang'] ?>" class="notranslate" translate="no">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="google" content="notranslate">
	<meta name="description" content="<?= $MESSAGE['Page.Index.Description'] ?>">
	<meta property="og:url" content="<?= "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ?>">
	<meta property="og:title" content="<?= $MESSAGE['Page.Index.Title'] ?>">
	<meta property="og:type" content="website">
	<meta property="og:image" content="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/share2.png">
	<meta property="og:description" content="<?= $MESSAGE['Page.Index.Description'] ?>">
	<title>
		<?= $MESSAGE['Page.Index.Title'] ?>
	</title>
	<link rel="icon"
		href="https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_32,h_32/http://www.skr.ac.th/main/wp-content/uploads/2018/03/cropped-skr_logo-1-32x32.png"
		sizes="32x32">
	<link rel="stylesheet" href="<?= $SYSTEM['ROOT_PATH'] ?>assets/css/homepage.css">
	<link rel="stylesheet" href="<?= $SYSTEM['ROOT_PATH'] ?>assets/css/krathong.css">
	<link rel="stylesheet" href="<?= $SYSTEM['ROOT_PATH'] ?>assets/css/water.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<main>
		<div class="topper">
				<div class="backgroundWrapper" style="width: 100vw;">
					<img style="width: 170px;position: absolute;top: 60px;right: 10px;" src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/Moon.svg" alt="">
					<div class="backdrop"></div>
				</div>
				<div class="navigationWrapper">
					<h1 style="
						top: 0;
						position: absolute;
						left: 30px;
					"><?= $MESSAGE['System.Title'] ?></h1>
					<div style="
						display: flex;
						justify-content: space-between;
						width:  80px;
						position: absolute;
						right: 30px;
						top: 30px;
					">
						<a href="<?= $SYSTEM['ROOT_PATH'] ?>th/share/<?= $_GET['share'] ?>" class="<?= $MESSAGE['Page.Lang.TH'] ?>">TH</a>
						<span> | </span>
						<a href="<?= $SYSTEM['ROOT_PATH'] ?>en/share/<?= $_GET['share'] ?>" class="<?= $MESSAGE['Page.Lang.EN'] ?>">EN</a>
						<span> | </span>
						<a href="<?= $SYSTEM['ROOT_PATH'] ?>cn/share/<?= $_GET['share'] ?>" class="<?= $MESSAGE['Page.Lang.CN'] ?>">CN</a>
					</div>
				</div>
			</div>
			<div class="river">
				<div class="riverWrapper">
					<div class="water w1"></div>
					<div class="water w2"></div>
					<div class="water w3"></div>
				</div>
				<div class="krathongs">
					<div class="krathongWrapper" style="left: calc(50% - 100px);">
						<img draggable="false" class="krathongBack" src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/<?= $response['type'] ?>-back.svg" alt="">
						<img draggable="false" class="krathongFront" src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/<?= $response['type'] ?>-front.svg" alt="">
						<img draggable="false" class="krathongInner" src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/<?= $response['type'] ?>-<?= $response['topping'] ?>.svg" alt="">
						<div class="wishKra" style="opacity: 1"><?= $response['message'] ?></div>
					</div>
				</div>
				<script>
					document.querySelector('.krathongWrapper').classList.add('animate__animated', 'animate__bounceIn');
					setTimeout(() => {
						document.querySelector('.krathongWrapper').classList.remove('animate__animated', 'animate__bounceIn');
						
					}, 650);
				</script>
			</div>
			<script>
				document.querySelector('fb-share-button').setProperty('data-href', window.location);
			</script>

			<div class="facebookButton"><?= $MESSAGE['Text.Share_Facebook']?><div class="fb-share-button" 
				data-href=""
				data-layout="button_count"></div>
		</main>
		<footer>
			<span>Made with ❤️ by <a href="https://fb.me/krittamark/" target="_blank">Krittamark</a></span>
		</footer>
	</div>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
	fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
</body>

</html>