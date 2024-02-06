<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Animated Blob Menu</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@300&display=swap');

		body,
		html {
			font-family: 'Manrope', sans-serif;
			margin: 0;
			padding: 0;
			width: 100%;
			height: 100%;
		}

		.a {
			text-decoration: none;
			color: white;
			transition: .3s all ease;

			&:hover {
				color: #c1c1c1;
			}
		}

		#menu {
			height: 100%;
			position: fixed;
			width: 300px;
			background: teal;
			transition: 1000ms all cubic-bezier(0.19, 1, 0.22, 1);
			transform: translateX(-100%);
			left: 60px;
		}

		#menu.expanded {
			transform: translateX(0%);
			left: 0px;
		}

		.menu-inner {
			width: 100%;
			height: 100%;
			position: relative;
		}

		#blob {
			top: 0;
			z-index: -1;
			right: 60px;
			transform: translateX(100%);
			height: 100%;
			position: absolute;
		}

		#blob-path {
			height: 100%;
			fill: teal;
		}

		.hamburger {
			right: 20px;
			position: absolute;
			width: 20px;
			height: 20px;
			margin-top: -10px;
		}

		.hamburger .line {
			width: 100%;
			height: 4px;
			background-color: #fff;
			position: absolute;
		}

		.hamburger .line:nth-child(2) {
			top: 50%;
			margin-top: -2px;
		}

		.hamburger .line:nth-child(3) {
			bottom: 0;
		}

		h1 {
			position: fixed;
			right: 0;
			margin: 0;
		}

		ul {
			padding: 0;
			list-style: none;
			width: 80%;
			margin-left: 10%;
			position: absolute;
			top: 10px;
		}


		li {
			width: 200px;
		}

		ul li {
			color: #fff;
			font-family: sans-serif;
			padding: 20px 0;

		}

		h2 {
			position: absolute;
			left: 50%;
			color: #fff;
			margin: 0;
			font-size: 16px;
			font-family: sans-serif;
			font-weight: 100;
		}
	</style>
</head>

<body>
	<div id="menu">
		<div class="hamburger">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
		</div>
		<div class="menu-inner">
			<ul>
				<li><a class="a" href="admin.php">Liste de tous les candidats</a></li>
				<li><a class="a" href="listeCandidatsSexe.php">Candidats par sexe</a></li>
				<li><a class="a" href="listeCandNation.php">Candidats par nationalite</a></li>
				<li><a class="a" href="listeCandDouble.php">Candidats inscrits doublement</a></li>
				<li><a class="a" href="listeCandOmisDup.php">Candidats ayant omis d'uploader un document</a></li>
				<li><a class="a" href="histogramme.php">Histogramme étudiants par nationalité</a></li>
				<li>
					<form action="" method="post">
						<button name="deco" style="all:unset; cursor:pointer;" type="submit">Deconnexion</button>
					</form>
				</li>

				<?php
				if (isset($_POST["deco"])) {
					$_SESSION["admin_id"] = "0";
					header("Location: adminConnexion.php");
				}
				?>
			</ul>
		</div>
		<svg version="1.1" id="blob" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<path id="blob-path" d="M60,500H0V0h60c0,0,20,172,20,250S60,900,60,500z" />
		</svg>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script>
		$(document).ready(function() {
			var height = window.innerHeight,
				x = 0,
				y = height / 2,
				curveX = 10,
				curveY = 0,
				targetX = 0,
				xitteration = 0,
				yitteration = 0,
				menuExpanded = false;

			blob = $('#blob'),
				blobPath = $('#blob-path'),
				hamburger = $('.hamburger');

			$(document).on('mousemove', function(e) {
				x = e.pageX;
				y = e.pageY;
			});

			$('.hamburger, .menu-inner').on('mouseenter', function() {
				$(this).parent().addClass('expanded');
				menuExpanded = true;
			});

			$('.menu-inner').on('mouseleave', function() {
				menuExpanded = false;
				$(this).parent().removeClass('expanded');
			});

			function easeOutExpo(currentIteration, startValue, changeInValue, totalIterations) {
				return changeInValue * (-Math.pow(2, -10 * currentIteration / totalIterations) + 1) + startValue;
			}

			var hoverZone = 150;
			var expandAmount = 20;

			function svgCurve() {
				if ((curveX > x - 1) && (curveX < x + 1)) {
					xitteration = 0;
				} else {
					if (menuExpanded) {
						targetX = 0;
					} else {
						xitteration = 0;
						if (x > hoverZone) {
							targetX = 0;
						} else {
							targetX = -(((60 + expandAmount) / 100) * (x - hoverZone));
						}
					}
					xitteration++;
				}

				if ((curveY > y - 1) && (curveY < y + 1)) {
					yitteration = 0;
				} else {
					yitteration = 0;
					yitteration++;
				}

				curveX = easeOutExpo(xitteration, curveX, targetX - curveX, 100);
				curveY = easeOutExpo(yitteration, curveY, y - curveY, 100);

				var anchorDistance = 200;
				var curviness = anchorDistance - 40;

				var newCurve2 = "M60," + height + "H0V0h60v" + (curveY - anchorDistance) + "c0," + curviness + "," + curveX + "," + curviness + "," + curveX + "," + anchorDistance + "S60," + (curveY) + ",60," + (curveY + (anchorDistance * 2)) + "V" + height + "z";

				blobPath.attr('d', newCurve2);

				blob.width(curveX + 60);

				hamburger.css('transform', 'translate(' + curveX + 'px, ' + curveY + 'px)');

				$('h2').css('transform', 'translateY(' + curveY + 'px)');
				window.requestAnimationFrame(svgCurve);
			}

			window.requestAnimationFrame(svgCurve);
		});
	</script>
</body>

</html>