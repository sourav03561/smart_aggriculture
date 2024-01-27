<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Suggestion</title>
		<link rel="stylesheet" href="../css/style.css" type="text/css"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
		<style>
		*{
			margin: 0px;
			padding: 0px;
			font-family: "arial black";
		}
		body{
			width: 100%;
			height: 100%;
			display: flex;
			justify-content: space-between;
		/* 	background-color: plum; */
		}
		
		/* login register */
		.leftBox{
			flex: 0 0 43%;
			float: left;
			background-color:rgb(92,230,29);
		}
		.rightBox{
			flex: 0 0 57%;
			height: 100vh;
			float: right;
			/* background-color: aliceblue; */
		}
		
		.form-container{
			padding: 50px;
			display: flex;
			justify-content: center;
			align-items: center;
		
		}
		.img-container{
			flex: 1;
			display: flex;
			justify-content: center;
			align-items: center;
			overflow: hidden;
			background-color: white;
		}
		.img-container img{
			max-width: 100%;
			max-height: 100%;
			width: auto;
		}
		.title{
			text-align: center;
			color: white;
		}
		.text{
			text-align: left;
			color: white;
		}
		p.text{
			font-size: 15px;
			font-weight: 600;
			font-family: Arial, Helvetica, sans-serif;
			margin:10;
		}
		.content{
			padding-left: 3px;
			font-size: 15px;
			font-weight: 600;
			font-family: Arial, Helvetica, sans-serif;
			text-align: left;
			color: white;
			margin:0;
			
			
		}
		.custom-input{
			border: 2px solid rgb(154,240,115);
			border-radius: 5px;
			background-color: transparent;
			color: white;
			padding-left: 15px;
			max-width: 100%;
			width: 99%;
			height: 40px;
			font-size: 15px;
			font-weight: 600;
			font-family: Arial, Helvetica, sans-serif;
			
		}
		.custom-input::placeholder{
			color: white;
			font-size: 15px;
			font-weight: 600;
			font-family: Arial, Helvetica, sans-serif;
			
		}
		.custom-input:focus{
			outline:none;
			border-color: white;
			width: 100%;
		}
		.custom-button{
			width: 100%;
			display: block;
			margin: 30px auto 0;
			padding: 10px 20px;
			border: none;
			border-radius: 50px;
			background-color: rgb(0,191,99);
			color: white;
			height: 40px;
			font-size: 15px;
			font-weight: 600;
			font-family: Arial, Helvetica, sans-serif;
			
		}
		.custom-button:hover{
			background-color: rgb(60,191,99);
			color: rgb(203, 240, 187);
		}
		p.link{
			margin: 20px;
			color: white;
			font-size: 15px;
			font-weight: 600;
			font-family: Arial, Helvetica, sans-serif;
		
		}
		a.custom-link{
			color: white;
			font-weight: 800;
			font-family: Arial, Helvetica, sans-serif;
			padding-left: 10px;
		}
		a.custom-link:hover{
			text-decoration: none;
			color: rgb(60,191,99);
		}
		/* .shadow{
			background: linear-gradient(to right, rgba(0,0,0,0.3) 0%, transparent 100%);
			
		} */
		.shadow::before{
			content: '';
			position: absolute;
			top: 0;
			left:-5px;
			width: 50px;
			height: 100%;
			background: linear-gradient(to right, rgba(0,0,0,0.3) 0%, transparent 100%);
		
		}
		
		/* dashboard */
		.rightContainer{
			flex: 0 0 43%;
			float: right;
			background-color:rgb(92,230,29);
			justify-content: center;
			align-items: center;
			display: flex;
			flex-direction: column;
		}
		.leftContainer{
			flex: 0 0 57%;
			height: 100vh;
			float: left;
			overflow: hidden;
			/* background-color: aliceblue; */
		}
		.navbar{
			background-color: rgb(250,252,255);
			/* color: aquamarine; */
			padding: 10px 20px;
			display: flex;
			align-items: center;
			
		}
		.navbar a{
			text-decoration: none;
			color: rgb(127,127,127);
			padding: 10px 30px;
			margin: 5px 0;
			display: block;
			
		}
		
		.navbar img{
			height: 50px;
			width: 50px;
			margin-left: 30px;
			
		}
		.leftContent{
			flex: 1;
			overflow: hidden;
			position: relative;
			background-color: aquamarine;
			height: 100%;
		
		}
		.leftContent iframe{
			/* position: absolute; */
			width: 100%;
			height: 100%;
			border: none;
			margin: 0;
			padding: 0;
			/* overflow: hidden; */
		}
		.navbar a.selected{
			color: black;
			font-size: 20px;
			text-decoration: underline;
		}
		.dashboard-title{
			text-align: center;
			color: white;
			padding: 25px;
		}
		/* home */
		.custom-selection{
		  display: flex;
		  justify-content: space-around;
		  /* align-items: center; */
		  flex-wrap: wrap;
		  margin-top: 80px;
		
		}
		.custom-card{
			display: flex;
			width: 250px;
			padding: 10px;
			margin-bottom: 10px;
			align-items: center;
			justify-content: center;
		}
		.button-link {
		  display: inline-block;
		  /* padding: 10px 20px; */
		  text-decoration: none;
		  text-align: center;
		  background-color: rgb(53,166,0);
		  color: #ffffff;
		  /* border-radius: 5px;
		  border: 1px solid rgb(53,166,0); */
		  width: 250px;
		  height: 150px;
		  line-height: 150px;
		  font-size: 20px;
		  font-weight: bold;
		  
		  transition: background-color 0.3s ease;
		}
		
		.button-link:hover {
		  background-color: rgb(92,230,29);
		}
		
		/* new home */
		.home-body {
		  margin: 0;
		  padding: 0;
		  height: 100vh;
		  display: flex;
		  justify-content: flex-start;
		  align-items: center;
		  background-image: url("../img/TechThinkeres.png");
		  background-size: cover;
		  background-position: right bottom;
		  
		}
		
		.home-container {
		  margin-left: 100px; 
		  margin-bottom: 250px;
		}
		
		.home-container h1 {
		  margin: 0;
		  text-align: center;
		  color: rgb(65,230,75);
		  margin-bottom: 150px;
		  font-size: 50px;
		  font-weight: 800;
		  font-family: Arial, Helvetica, sans-serif;
		}
		
		.home-button {
		  margin: 30px auto 0;
		  padding: 10px 20px;
		  height: 50px;
		  font-size: 20px;
		  font-weight: 800;
		  font-family: Arial, Helvetica, sans-serif;
		  
		  display: inline-block;
		  background-color: rgb(65,230,75);
		  color: white;
		  text-decoration: none;
		  border: none;
		  border-radius: 50px;
		}
		
		
		/* DataAnalysis */
		.OutsideBox {
		  font-family: Arial, sans-serif;
		  max-width: 1200px;
		  margin: 0 auto;
		  padding: 20px;
		}
		.custom-header {
		  text-align: center;
		  padding: 20px 0;
		  /* border-bottom: 1px solid #ccc; */
		  color: rgb(22,167,30);
		}
		
		.dashboard-content {
		  display: flex;
		  justify-content: space-around;
		  flex-wrap: wrap;
		  margin-top: 20px;
		}
		
		.card {
		  width: 200px;
		  padding: 20px;
		  margin-bottom: 20px;
		  /* border: 1px solid #ccc;
		  border-radius: 5px; */
		}
		.card p{
			text-align: center;
			color: rgb(75, 75, 75);
		}
		
		.dashboard-footer {
		  text-align: center;
		  padding: 20px 0;
		  color: rgb(75, 75, 75);
		  /* border-top: 1px solid #ccc; */
		}
		/* Suggestion */
		.custom-dl{
			display: flex;
			flex-wrap: wrap;
			gap: 10px;
		}
		.custom-dl div{
			flex: 1 0 calc(50% - 5px);
			min-width: 150px;
			display: flex;
			flex-wrap: wrap;
			/* border: 1px solid black; */
			padding: 5px;
			margin-bottom: 10px;
			box-sizing: border-box;
		}
		.custom-dl dt,dd{
			flex: 1 0 50%;
			padding: 5px;
			box-sizing: border-box;
			/* border: 1px solid black; */
			overflow: hidden;
		}
		.custom-dl dd{
			text-align: center;
		}
		.custom-dl dt{
			text-align: right;
			color: rgb(22,167,30); 
		}
		/* LandCompare */
		.custom-select select{
			width: 350px;
			margin: 0 auto;
			display: block;
			text-align-last: center;
			margin-bottom: 50px;
			color: rgb(22,167,30);
		}
		.select-land{
			display: flex;
			justify-content: space-between;
		}
		.land-selector{
			margin: 20px;
		}
		.left-side,.right-side {
		  width: 50%;
		  
		}
		
		.image-container {
		  text-align: center;
		}
		
		.selected-image {
		  max-width: 100%;
		  height: 200px;
		}
		
		.value-display {
		  /* display: none; */
		}
		.value-display p{
			display: inline;
		}
		.dropdown{
			width: 250px;
			display: block;
			text-align-last: center;
			color: rgb(22,167,30);
		}
		
		.value-custom{
			/* text-align: right; */
			color: rgb(22,167,30); 
		}
		
		/* DetectLand */
		.custom-form {
			  margin: 20px;
			  padding: 20px;
			  border: 1px solid #ccc;
			  border-radius: 5px;
			  width: 300px;
		}
		.custom-form label {
			  display: block;
			  margin-bottom: 10px;
		}
		.sensor-row {
		  margin-bottom: 10px;
		}
		.sensor-quantity{
			width: 150px;
		}
		.add-button {
		  cursor: pointer;
		}
	</style>
	</head>
	<body>
		<div class="OutsideBox">
			<header class="custom-header">
			  <h1>Suggestion</h1>
			</header>
			<section class="dashboard-content">
				<dl class="custom-dl">
					<div>
						<dt>P:</dt>
						<dd>30</dd>
					</div>
					<div>
						<dt>N:</dt>
						<dd>40</dd>
					</div>
					<div>
						<dt>K:</dt>
						<dd>43</dd>
					</div>
					<div>
						<dt>PH:</dt>
						<dd>7</dd>
					</div>
					<div>
						<dt>Humidity:</dt>
						<dd>30</dd>
					</div>
					<div>
						<dt>Soil Moisture:</dt>
						<dd>20</dd>
					</div>
					<div>
						<dt>Temperature:</dt>
						<dd>30</dd>
					</div>
					<div>
						<dt></dt>
						<dd></dd>
					</div>

				</dl>
			</section>
			<footer class="dashboard-footer">
			  <p>Potato farming is best for this land and current condition.</p>
			</footer>
		</div>
	</body>
</html>