<!doctype html>
<html>
<head>
	<title>SimpleDBApp</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Fira+Sans+Condensed&display=swap" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/style.css" />
	<style>
		*, h1, h2, h3, h4 {
			font-family: 'Fira Sans Condensed', sans-serif;
		}
		ul, li{list-style-type:none;}
		table {
			border-collapse: collapse;
			margin: auto;
		}
		th, td {
			padding: 5px 8px;
			border: solid 1px white;
			word-wrap: break-word;
			vertical-align: middle;
		}
		td:last-child, th:last-child {
			border-right: soild 0 !important;
		}
		tr:nth-of-type(odd) {
			background-color: #dfd;
		}
		tr:nth-of-type(even) {
			background-color: #ddf;
		}
		th {
			text-align: center;
			background: green !important;
			color: yellow;
		}
		.button {
			background: steelblue;
			color: white; width: auto;
			font-weight: bold;
			border:solid 1px orange;
			margin:5px;
		}
		.button:hover {
			background: aqua;
			color: red;
		}
		a {text-decoration: none;}
		a:hover{color: red;}
	</style>
	<link rel="stylesheet" href="css/datepicker.css" />
	<script src="js/jquery-3.4.1.slim.min.js"></script>
	<script src="js/datepicker.js"></script>
	<script>
		$(document).ready(function () {
			$('[data-toggle="datepicker"]').datepicker({autoHide: true, zIndex: 2048});
		});
	</script>
</head>

<body>
<div class="wrapper">
	<div class="w3-bar w3-teal w3-xlarge">
		<strong>
			<a href="./" class="w3-bar-item w3-button"> <i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp; Dashboard</a>
		</strong>
	</div>
	
	<div class="w3-container" style="height:40px">
		
	</div>