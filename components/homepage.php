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
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
						<a href="<?= $SYSTEM['ROOT_PATH'] ?>th/" class="<?= $MESSAGE['Page.Lang.TH'] ?>">TH</a>
						<span> | </span>
						<a href="<?= $SYSTEM['ROOT_PATH'] ?>en/" class="<?= $MESSAGE['Page.Lang.EN'] ?>">EN</a>
						<span> | </span>
						<a href="<?= $SYSTEM['ROOT_PATH'] ?>cn/" class="<?= $MESSAGE['Page.Lang.CN'] ?>">CN</a>
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
					
				</div>
			</div>

			<div class="startButton" onclick="start(this)"><?= $MESSAGE['Text.Home.Start_Button']?></div>
			

			<div class="SelectKrathong modal hidden">
				<div class="content">
					<span class="title">
						<?= $MESSAGE['Text.Home.SelectKrathong_title'] ?>
						<span class="instruction"><?= $MESSAGE['Text.Home.SelectKrathong_instruction'] ?></span>
					</span>
					
					<div class="twocol">
						<div class="kra2" onclick="selectKrathong('lotus')">
							<img src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/krathong1-1.svg" alt="" srcset="">
							<span><?= $MESSAGE['Text.Home.SelectKrathong_sel1'] ?></span>
						</div>
					</div>
					<div class="exitButton" onclick="closeModal('.SelectKrathong')"></div>
				</div>
				
			</div>

			<div class="SelectTopping modal hidden">
				<div class="content">
					<span class="title">
						<?= $MESSAGE['Text.Home.SelectTopping_title'] ?>
						<span class="instruction"><?= $MESSAGE['Text.Home.SelectTopping_instruction'] ?></span>
					</span>
					<div class="twocol">
						<div class="kra1" onclick="selectTopping('coin')">
							<img src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/lotus-coin.svg" alt="" srcset="">
							<span><?= $MESSAGE['Text.Home.SelectTopping_sel1'] ?></span>
						</div>
						<div class="kra2" onclick="selectTopping('flower')">
							<img src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/lotus-flower.svg" alt="" srcset="">
							<span><?= $MESSAGE['Text.Home.SelectTopping_sel2'] ?></span>
						</div>
					</div>
					<div class="exitButton" onclick="closeModal('.SelectTopping')"></div>
				</div>
			</div>
			<div class="SelectWish modal hidden">
				<div class="content">
					<span class="title">
						<?= $MESSAGE['Text.Home.SelectWish_title'] ?>
						<span class="instruction"><?= $MESSAGE['Text.Home.SelectWish_instruction'] ?></span>
					</span>
					<div class="twocol">
						<div class="kra3">
							<textarea id="wishMessage" placeholder="<?= $MESSAGE['Text.Home.SelectWish_placeholder'] ?>"></textarea>
							<button class="nextButton" onclick="selectWish(document.getElementById('wishMessage').value)"><?= $MESSAGE['Text.Home.SelectWish_button'] ?></button>
						</div>
					</div>
					<div class="exitButton" onclick="closeModal('.SelectWish')"></div>
				</div>
			</div>
			<div class="SelectName modal hidden">
				<div class="content">
					<span class="title">
						<?= $MESSAGE['Text.Home.SelectName_title'] ?>
						<span class="instruction"><?= $MESSAGE['Text.Home.SelectName_instruction'] ?></span>
					</span>
					<div class="twocol">
						<div class="kra3">
							<input autocomplete="NoCompleteJaaa" id="nameMessage" placeholder="<?= $MESSAGE['Text.Home.SelectName_placeholder'] ?>">
							<button class="nextButton" onclick="selectName(document.getElementById('nameMessage').value)"><?= $MESSAGE['Text.Home.SelectName_button'] ?></button>
						</div>
					</div>
					<div class="exitButton" onclick="closeModal('.SelectName')"></div>
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
		let data = {
			name: "",
			krathong: "",
			topping: "",
			message: ""
		};

		function hiddenModal(element) {
			document.querySelector(element).classList.add('hidden');
		}
		function closeModal(element) {
			document.querySelector(element).querySelector('.content').classList.add('animate__animated');
			document.querySelector(element).querySelector('.content').classList.add('animate__fadeOutDown');
			setTimeout(() => {
				document.querySelector(element).querySelector('.content').classList.remove('animate__animated');
				document.querySelector(element).querySelector('.content').classList.remove('animate__fadeOutDown');
				document.querySelector(element).classList.add('hidden');
			}, 1000);
		}
		function start(e) {
			showModal('.SelectKrathong');
			e.disabled = true;
		}
		function startFloat() {
			axios.post('<?= $SYSTEM['API_URL'] ?>/wish', data)
			.then(response => {
				window.location.href = `<?= $_SERVER['REQUEST_URI'] ?>share/${response.data.id}`;
			})
		}
		function selectName(message) {
			data.name = message;
			hiddenModal('.SelectName');
			startFloat(data);
		}
		function selectWish(message) {
			hiddenModal('.SelectWish');
			showModal('.SelectName');
			data.message = message;

		}
		function selectTopping(message) {
			hiddenModal('.SelectTopping');
			showModal('.SelectWish');
			data.topping = message;
		}
		function selectKrathong(message) {
			hiddenModal('.SelectKrathong');
			showModal('.SelectTopping');
			data.krathong = message;
		}

		function showModal(element) {
			document.querySelector(element).classList.remove('hidden');
			document.querySelector(element).querySelector('.content').classList.add('animate__animated');
			document.querySelector(element).querySelector('.content').classList.add('animate__fadeInRight');
			setTimeout(() => {
				document.querySelector(element).querySelector('.content').classList.remove('animate__animated');
				document.querySelector(element).querySelector('.content').classList.remove('animate__fadeInRight');
			}, 1000);
		}
		function randomNumber(min, max) {
			return Math.floor(Math.random() * (max - min + 1) + min)
		}
		function createKrathong(data) {
			const krathong = document.createElement('div');
			krathong.classList.add('krathongMove');

			krathong.style = `position:absolute;top: ${randomNumber(0, 300)}px;`;
			krathong.innerHTML = `	<div class="krathongWrapper">
										<img draggable="false" class="krathongBack" src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/${data[0].type}-back.svg" alt="">
										<img draggable="false" class="krathongFront" src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/${data[0].type}-front.svg" alt="">
										<img draggable="false" class="krathongInner" src="<?= $SYSTEM['ROOT_PATH'] ?>assets/images/SVG/${data[0].type}-${data[0].topping}.svg" alt="">
										<div class="wishKra">${data[0].message}</div>
									</div>`;
			document.querySelector('.krathongs').appendChild(krathong);
			setTimeout(() => {
				krathong.remove();
			}, 80000);
		}
		axios.get('<?= $SYSTEM['API_URL'] ?>/wishList?mode=random')
		.then(response => {
			createKrathong(response.data);
		})
		setInterval(() => {
			axios.get('<?= $SYSTEM['API_URL'] ?>/wishList?mode=random')
			.then(response => {
				createKrathong(response.data);
			})
		}, 10 * 1000);
	</script>
</body>

</html>