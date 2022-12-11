<!DOCTYPE html>
<html class="notranslate" translate="no">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="google" content="notranslate">
	<link rel="icon" href="https://cdn.shortpixel.ai/client/q_glossy,ret_img,w_32,h_32/http://www.skr.ac.th/main/wp-content/uploads/2018/03/cropped-skr_logo-1-32x32.png" sizes="32x32">
	<link rel="stylesheet" href="<?= $SYSTEM['ROOT_PATH'] ?>assets/css/homepage.css?<?= time()?>">
	<link rel="stylesheet" href="<?= $SYSTEM['ROOT_PATH'] ?>assets/css/krathong.css?<?= time()?>">
	<link rel="stylesheet" href="<?= $SYSTEM['ROOT_PATH'] ?>assets/css/water.css?<?= time()?>">
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
	<div class="wrapper">
		<main>
			<div class="topper">
				<div class="backgroundWrapper" style="width: 100vw;">
					<img style="width: 450px;
    position: absolute;
    top: -95px;
    right: -112px;" src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/Moon.svg" alt="">
					<div class="backdrop"></div>
				</div>
				<div class="backgroundWrapper" style="width: 100vw;">
					<img style="
						width: 361px;
    position: absolute;
    top: 34px;
    left: 115px;
    z-index: 100;" src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/qrcode-system.svg" alt="">
					<div class="backdrop"></div>
				</div>
				<div class="backgroundWrapper" style="width: 100vw;">
					<div style="
						background: rgb(255,255,255);
    width: 390px;
    height: 390px;
    position: absolute;
    top: 17px;
    left: 97px;
    z-index: 1;
    border-radius: 67px;"></div>
					<div class="backdrop"></div>
				</div>
				<div class="backgroundWrapper shown" style="width: 100vw;" id="1">
					<div style="
						    font-size: 137px;
    position: absolute;
    top: 104px;
    left: 55%;
    transform: translateX(-50%);
    width: 1000px;">ลอยกระทงออนไลน์</div>
					<div class="backdrop"></div>
				</div>
				<div class="backgroundWrapper hide" style="width: 100vw;" id="2">
					<div style="
						    font-size: 137px;
    position: absolute;
    top: 104px;
    left: 55%;
    transform: translateX(-50%);
    width: 1000px;">Loykrathong</div>
					<div class="backdrop"></div>
				</div>
				<div class="backgroundWrapper hide" style="width: 100vw;" id="3">
					<div style="
						    font-size: 137px;
    position: absolute;
    top: 104px;
    left: 55%;
    transform: translateX(-50%);
    width: 1000px;">线上放水灯</div>
					<div class="backdrop"></div>
				</div>

			</div>
			<div class="river">
				<div class="riverWrapper">
					<div class="water w1"></div>
					<div class="water w2"></div>
					<div class="water w3"></div>
				</div>
				<div class="krathongs">

				</div>
			</div>


		</main>
		<div class="morecontent hidden">

		</div>
		<footer>
			<span>Made with ❤️ by <a href="https://fb.me/krittamark/" target="_blank">Krittamark</a></span>
		</footer>
	</div>
	<script src="https://cdn.socket.io/4.5.3/socket.io.min.js" integrity="sha384-WPFUvHkB1aHA5TDSZi6xtDgkF0wXJcIIxXhC6h8OT8EH3fC5PWro5pWJ1THjcfEi" crossorigin="anonymous"></script>
	<script>
		function randomNumber(min, max) {
			return Math.floor(Math.random() * (max - min + 1) + min)
		}

		function createKrathong(data) {
			const krathong = document.createElement('div');
			krathong.classList.add('krathongMove');

			krathong.style = `position:absolute;top: ${randomNumber(0, 450)}px;`;
			krathong.innerHTML = `	<div class="krathongWrapper">
										<img draggable="false" class="krathongBack" src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/${data[0].type}-back.svg" alt="">
										<img draggable="false" class="krathongFront" src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/${data[0].type}-front.svg" alt="">
										<img draggable="false" class="krathongInner" src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/${data[0].type}-${data[0].topping}.svg" alt="">
										<div class="wishKra active" style="text-align: center">${data[0].owner}</div>
									</div>`;
			document.querySelector('.krathongs').appendChild(krathong);
			setTimeout(() => {
				krathong.remove();
			}, 60000);
		}
		let latest;
		axios.get('<?= $SYSTEM['API_URL'] ?>/wishList?mode=latest')
			.then(response => {
				latest = response.data;
				createKrathong(response.data);
			})

		setInterval(() => {
			axios.get('<?= $SYSTEM['API_URL'] ?>/wishList?mode=latest')
			.then(response => {
				console.log(latest);
				console.log(response.data);
				if (latest[0] === response.data[0]) {
					latest = response.data;
					createKrathong(response.data);
				} else {
					axios.get('<?= $SYSTEM['API_URL'] ?>/wishList?mode=random')
						.then(a => {
							createKrathong(a.data);
						})
				}
			})
		}, 7 * 1000);


		function slide() {
			setTimeout(() => {
				document.getElementById('1').className = 'backgroundWrapper hide'
				document.getElementById('2').className = 'backgroundWrapper shown'
				document.getElementById('3').className = 'backgroundWrapper hide'
			}, 10 * 1000);
			setTimeout(() => {
				document.getElementById('1').className = 'backgroundWrapper hide'
				document.getElementById('2').className = 'backgroundWrapper hide'
				document.getElementById('3').className = 'backgroundWrapper shown'
			}, 20 * 1000);
			setTimeout(() => {
				document.getElementById('1').className = 'backgroundWrapper shown'
				document.getElementById('2').className = 'backgroundWrapper hide'
				document.getElementById('3').className = 'backgroundWrapper hide'
				slide()
			}, 30 * 1000);
		}
		slide();
	</script>
</body>

</html>