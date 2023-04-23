<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: index.php');
  exit;
} else {
  $pdo = new PDO('mysql:host=localhost;dbname=eagle', 'root', '');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard</title>
		<!-- CSS only -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<script src="https://code.jquery.com/jquery-3.6.3.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
		<link rel="stylesheet" href="./style.css">
		<link rel="stylesheet" href="choices.min.css" />
	</head>
	<style>
		.content {
			display: flex;
			justify-content: center;
			align-items: center;
			width: 100%;
			height: 100%;
		}

		.loader-wrapper {
			width: 100%;
			height: 100%;
			position: absolute;
			z-index: 9999;
			top: 0;
			left: 0;
			background-color: #181a1e;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.loader {
			display: inline-block;
			width: 30px;
			height: 30px;
			position: relative;
			border: 4px solid #Fff;
			animation: loader 2s infinite ease;
		}

		.loader-inner {
			vertical-align: top;
			display: inline-block;
			width: 100%;
			background-color: #fff;
			animation: loader-inner 2s infinite ease-in;
		}

		@keyframes loader {
			0% {
				transform: rotate(0deg);
			}

			25% {
				transform: rotate(180deg);
			}

			50% {
				transform: rotate(180deg);
			}

			75% {
				transform: rotate(360deg);
			}

			100% {
				transform: rotate(360deg);
			}
		}

		@keyframes loader-inner {
			0% {
				height: 0%;
			}

			25% {
				height: 0%;
			}

			50% {
				height: 100%;
			}

			75% {
				height: 100%;
			}

			100% {
				height: 0%;
			}
		}
	</style>
	<body>
		<div class="loader-wrapper" id="loader">
			<span class="loader">
				<span class="loader-inner"></span>
			</span>
		</div>
		<script>
			$(window).on("load", function() {
				setTimeout(function() {
					$("#loader").fadeOut("slow");
				}, 500);
			});
			// var textRemove = new Choices(
			//   document.getElementById('remove-button'), {
			//     delimiter: ',',
			//     editItems: false,
			//     maxItemCount: 565,
			//     removeItemButton: true,
			//   }
			// );
			// var textRemove = new Choices(
			//   document.getElementById('remove-button2'), {
			//     delimiter: ',',
			//     editItems: false,
			//     maxItemCount: 565,
			//     removeItemButton: true,
			//   }
			// );
		</script>
		<div class="container">
			<aside>
				<div class="top">
					<div class="logo">
						<img src="./img/logo.png">
						<h2>EA <span class="danger">GLE</span>
						</h2>
					</div>
					<div class="close" id="close-btn">
						<span class="material-icons-sharp">close</span>
					</div>
				</div>
				<div class="sidebar">
					<a href="dashboard.php">
						<span class="material-icons-sharp">grid_view</span>
						<h3>Dashboard</h3>
					</a>
					<a href="https://discord.com/api/oauth2/authorize?client_id=1064249951099572354&permissions=8&scope=bot">
						<span class="fa-brands fa-discord" style="font-size: 19px"></span>
						<h3>Discord Bot</h3>
					</a>
					<a href="logout.php">
						<span class="material-icons-sharp">logout</span>
						<h3>Logout</h3>
					</a>
				</div>
			</aside>
			<!------------------- End of aside ------------------->
			<main>
				<h1>Dashboard</h1>
				<div class="insights">
					<div class="bans">
						<span class="material-icons-sharp" style="margin-bottom: 1rem">person_off</span>
						<div class="middle">
							<div class="left">
								<h3>Total Global Bans</h3>
								<h1>
                  <?php
                    $stmt = $pdo->prepare('SELECT count(*) FROM globalbans');
                    $stmt->execute();
                    $count = $stmt->fetchColumn();
                    echo $count;
                  ?>
                </h1>
							</div>
						</div>
						<small class="text-muted">Last 24 Hours</small>
					</div>
					<!-------------------- END OF BANS ----------->
					<div class="users">
						<span class="material-icons-sharp" style="margin-bottom: 1rem">person</span>
						<div class="middle">
							<div class="left">
								<h3>Total Users</h3>
								<h1>
                  <?php
                    $stmt = $pdo->prepare('SELECT count(*) FROM licenses');
                    $stmt->execute();
                    $count = $stmt->fetchColumn();
                    echo $count;
                  ?>
                </h1>
							</div>
						</div>
						<small class="text-muted">Last 24 Hours</small>
					</div>
					<!-------------------- END OF Users ----------->
					<div class="discord-members">
						<span class="material-icons-sharp" style="margin-bottom: 1rem">person</span>
						<div class="middle">
							<div class="left">
								<h3>Online Discord Members</h3>
								<h1>300</h1>
							</div>
						</div>
						<small class="text-muted">Last 24 Hours</small>
					</div>
					<!-------------------- END OF discord-members ----------->
				</div>
				<!-------------------- END OF Insights ----------->
				<div class="order">
					<h2>Subscriptions</h2>
					<table>
						<thead>
							<tr>
								<th>Server Name</th>
								<th>Expire</th>
								<th>IP</th>
								<th>Framework</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
              <?php
                $stmt = $pdo->prepare('SELECT * FROM licenses WHERE discord_id = ? and status = 1');
                $stmt->execute([$_SESSION['user']->id]);
                $licenses = $stmt->fetchAll(PDO::FETCH_OBJ);
                foreach ($licenses as $license) {
                  echo '
                    <tr>
                      <td>'.$license->server_name.'</td>
                      <td>'.$license->expire.'</td>
                      <td>'.$license->ip.'</td>
                      <td>'.$license->framework.'</td>
                      <td></td>
                    </tr>
                  ';
                }
              ?>
            </tbody>
					</table>
				</div>
			</main>
			<!------------------ End OF Midd ------------------>
			<div class="right">
				<div class="top">
					<button id="menu-btn">
						<span class="material-icons-sharp">menu</span>
					</button>
					<div class="theme-toggler">
						<span class="material-icons-sharp active">light_mode</span>
						<span class="material-icons-sharp">dark_mode</span>
					</div>
					<div class="profile">
						<div class="info">
							<p>
								Hey, <b><?php echo $_SESSION['user']->username; ?></b>
							</p>
							<?php
								$stmt = $pdo->prepare('SELECT * FROM licenses WHERE discord_id = ?');
								$stmt->execute([$_SESSION['user']->id]);
								$license = $stmt->fetch(PDO::FETCH_ASSOC);
								if ($license) { ?>
								<small class="text-muted">Customer</small>
								<?php } else { ?>
								<small class="text-muted">Guest</small>
								<?php }
							?>
						</div>
						<div class="profile-photo">
							<img src="https://cdn.discordapp.com/avatars/<?php echo $_SESSION['user']->id ?>/<?php echo $_SESSION['user']->avatar ?>.png?size=128">
						</div>
					</div>
				</div>
				<div class="recent-updates">
					<h2>Recent Updates</h2>
					<div class="updates">
						<div class="update">
							<div class="profile-photo">
								<img src="img/logo.png">
							</div>
							<div class="message">
								<p>
									<b>Eagle Anticheat</b> Big Update Has been made.
								</p>
								<small class="text-muted">8 months ago</small>
							</div>
							<div class="profile-photo">
								<img src="img/logo.png">
							</div>
							<div class="message">
								<p>
									<b>Eagle Anticheat</b> Big Update Has been made.
								</p>
								<small class="text-muted">8 months ago</small>
							</div>
							<div class="profile-photo">
								<img src="img/logo.png">
							</div>
							<div class="message">
								<p>
									<b>Eagle Anticheat</b> Big Update Has been made.
								</p>
								<small class="text-muted">8 months ago</small>
							</div>
							<div class="profile-photo">
								<img src="img/logo.png">
							</div>
							<div class="message">
								<p>
									<b>Eagle Anticheat</b> Big Update Has been made.
								</p>
								<small class="text-muted">8 months ago</small>
							</div>
							<div class="profile-photo">
								<img src="img/logo.png">
							</div>
							<div class="message">
								<p>
									<b>Eagle Anticheat</b> Big Update Has been made.
								</p>
								<small class="text-muted">8 months ago</small>
							</div>
							<div class="profile-photo">
								<img src="img/logo.png">
							</div>
							<div class="message">
								<p>
									<b>Eagle Anticheat</b> Big Update Has been made.
								</p>
								<small class="text-muted">8 months ago</small>
							</div>
							<div class="profile-photo">
								<img src="img/logo.png">
							</div>
							<div class="message">
								<p>
									<b>Eagle Anticheat</b> Big Update Has been made.
								</p>
								<small class="text-muted">8 months ago</small>
							</div>
							<div class="profile-photo">
								<img src="img/logo.png">
							</div>
							<div class="message">
								<p>
									<b>Eagle Anticheat</b> Big Update Has been made.
								</p>
								<small class="text-muted">8 months ago</small>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://unpkg.com/@popperjs/core@2"></script>
		<script src="https://unpkg.com/tippy.js@6"></script>
		<script src="choices.min.js"></script>
		<script src="./index.js"></script>
		<script>
			tippy('#cfw', {
				content: 'CFW Version',
				placement: 'top',
				delay: 200, // ms
			});
			tippy('#vrp', {
				content: 'Vrp Version',
				placement: 'top',
				delay: 200, // ms
			});
			tippy('#Enable', {
				content: 'Vrp Version',
				placement: 'top',
				delay: 200, // ms
			});
		</script>
	</body>
</html>