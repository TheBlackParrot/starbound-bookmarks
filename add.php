<?php
	require_once dirname(__FILE__) . "/includes/config.php";

	if(!empty($_POST)) {
		$arr = array();
		$selected_npcs = array();
		$npcs = array("ag_hut", "ag_vil", "ap_hsp", "ap_lab", "ap_puz", "ap_vil", "av_air", "av_tmb", "av_tmp", "av_vil", "fl_dgn", "fl_vil", "gl_cst", "gl_vil", "hu_ban", "hu_bse", "hu_min", "hu_out", "hu_prs", "ge_sew", "ge_dng");
		foreach ($_POST as $key => $value) {
			$value = mysqli_real_escape_string($mysqli,htmlspecialchars($value));

			if(substr($key,2,1) == "_") {
				if($value == "on") {
					$value = 1;
				} else {
					$value = 0;
				}
				$selected_npcs[$key] = $value;
			} else {
				$arr[$key] = $value;
			}
		}

		foreach ($npcs as $key) {
			foreach ($selected_npcs as $key_s => $value_s) {
				if(array_key_exists($key,$selected_npcs)) {
					$arr[$key] = 1;
				} else {
					$arr[$key] = 0;
				}
			}
		}

		foreach ($arr as $key => $value) {
			if(!is_numeric($value)) {
				$arr[$key] = '\'' . $value . '\'';
			} elseif (is_numeric($value)) {
				if($value < 0) {
					$arr[$key] = '\'' . $value . '\'';
				}
			}
		}

		$prepared_string = implode(", ", $arr);
		$query = 'INSERT INTO planets (SYSTEM, PLANET, X, Y, DIFFICULTY, BIOME, STAR_TYPE, LIQUID, AG_HUT, AG_VIL, AP_HSP, AP_LAB, AP_PUZ, AP_VIL, AV_AIR, AV_TMB, AV_TMP, AV_VIL, FL_DGN, FL_VIL, GL_CST, GL_VIL, HU_BAN, HU_BSE, HU_MIN, HU_OUT, HU_PRS, GE_SEW, GE_DNG, DATE_ADDED) VALUES (' . $prepared_string . ', ' . time() . ')';
		mysqli_real_query($mysqli,$query);

		header("Location: " . $setting['root']);
		exit();
	}

	$query = 'SELECT COUNT(*) FROM planets';
	$result = mysqli_query($mysqli,$query);
	$temp = mysqli_fetch_array($result);
	$count = $temp[0] + 1;
?>

<html>

<head>
	<title>Starbound Bookmarks</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>

<body>
	<div class="wrapper" style="margin: 32px; width: calc(100% - 64px);">
		<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST">
			<span class="tooltip">ID#</span>
			<?php echo $count; ?><br/><br/>

			<hr/>

			<span class="tooltip">System</span>
			<input type="text" name="system" placeholder="Beta Gamma Crt 37" required></input><br/>

			<span class="tooltip">Planet</span>
			<input type="text" name="planet" placeholder="IV b" required></input><br/>

			<span class="tooltip">X Position</span>
			<input type="text" name="xpos" placeholder="-604416310" required></input><br/>

			<span class="tooltip">Y Position</span>
			<input type="text" name="ypos" placeholder="-992233107" required></input><br/>

			<span class="tooltip">Difficulty</span>
			<input type="text" name="diff" placeholder="Moderate" required></input><br/>

			<span class="tooltip">Biome</span>
			<input type="text" name="biome" placeholder="Desert" required></input><br/>

			<span class="tooltip">Star Type</span>
			<input type="text" name="startype" placeholder="Eccentric" required></input><br/>

			<hr/>

			<strong>NPC spawns</strong><br/>
			<table class="table_add">
				<tr>
					<td><img src="images/agaran.png"/>HUT</td>
					<td><img src="images/agaran.png"/>VIL</td>
					<td><img src="images/apex.png"/>HSP</td>
					<td><img src="images/apex.png"/>LAB</td>
					<td><img src="images/apex.png"/>PUZ</td>
					<td><img src="images/apex.png"/>VIL</td>
					<td><img src="images/avian.png"/>AIR</td>
					<td><img src="images/avian.png"/>TMB</td>
					<td><img src="images/avian.png"/>TMP</td>
					<td><img src="images/avian.png"/>VIL</td>
					<td><img src="images/floran.png"/>DGN</td>
					<td><img src="images/floran.png"/>VIL</td>
					<td><img src="images/glitch.png"/>CST</td>
					<td><img src="images/glitch.png"/>VIL</td>
					<td><img src="images/human.png"/>BAN</td>
					<td><img src="images/human.png"/>BSE</td>
					<td><img src="images/human.png"/>MIN</td>
					<td><img src="images/human.png"/>OUT</td>
					<td><img src="images/human.png"/>PRS</td>
					<td><img src="images/other.png"/>SEW</td>
					<td><img src="images/other.png"/>DNG</td>
				</tr>
				<tr>
					<td><input type="checkbox" name="ag_hut"></input></td>
					<td><input type="checkbox" name="ag_vil"></input></td>
					<td><input type="checkbox" name="ap_hsp"></input></td>
					<td><input type="checkbox" name="ap_lab"></input></td>
					<td><input type="checkbox" name="ap_puz"></input></td>
					<td><input type="checkbox" name="ap_vil"></input></td>
					<td><input type="checkbox" name="av_air"></input></td>
					<td><input type="checkbox" name="av_tmb"></input></td>
					<td><input type="checkbox" name="av_tmp"></input></td>
					<td><input type="checkbox" name="av_vil"></input></td>
					<td><input type="checkbox" name="fl_dgn"></input></td>
					<td><input type="checkbox" name="fl_vil"></input></td>
					<td><input type="checkbox" name="gl_cst"></input></td>
					<td><input type="checkbox" name="gl_vil"></input></td>
					<td><input type="checkbox" name="hu_ban"></input></td>
					<td><input type="checkbox" name="hu_bse"></input></td>
					<td><input type="checkbox" name="hu_min"></input></td>
					<td><input type="checkbox" name="hu_out"></input></td>
					<td><input type="checkbox" name="hu_prs"></input></td>
					<td><input type="checkbox" name="ge_sew"></input></td>
					<td><input type="checkbox" name="ge_dgn"></input></td>
				</tr>
			</table>

			<hr/>

			<span class="tooltip">Liquid</span>
			<select name="liquid" required>
				<option value="0" selected>Water</option>
				<option value="1">Alien Juice</option>
				<option value="2">Healing Water</option>
				<option value="3">Lava</option>
				<option value="4">Fuel</option>
				<option value="5">Oil</option>
				<option value="6">Poison</option>
			</select><br/><br/>

			<div style="text-align: center;">
				<input type="submit" value="Bookmark Planet" class="button"/>
			</div>
		</form>
	</div>
</body>

</html>