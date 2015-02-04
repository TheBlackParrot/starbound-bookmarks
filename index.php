<?php
	$gen_time = -microtime(true);

	require_once dirname(__FILE__) . "/includes/config.php";
	if(!isset($_GET['page'])) {
		$page = 1;
	} else {
		$page = htmlspecialchars($_GET['page']);
	}

	$query = 'SELECT COUNT(*) FROM planets';
	$result = mysqli_query($mysqli,$query);
	$temp = mysqli_fetch_array($result);
	$count = $row[0];
	
	$pages = ceil($count / 100);
	if($page > $pages || $page < $pages) {
		$page = 1;
	}
	$limit_str = (($page-1)*100) . ',' . $page*100;

	$query = 'SELECT * FROM planets LIMIT ' . $limit_str;
	$result = mysqli_query($mysqli,$query);
?>

<html>

<head>
	<title>Starbound Bookmarks</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css"/>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
</head>

<body>
	<div class="wrapper">
		<table>
			<tr>
				<td>#</td>
				<td>System</td>
				<td>Planet</td>
				<td>X pos</td>
				<td>Y pos</td>
				<td>Difficulty</td>
				<td>Biome</td>
				<td>Star Type</td>
				<td>Added</td>
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
				<td><img src="images/water.png"/>LIQ</td>
			</tr>
			<?php
				while($row = mysqli_fetch_array($result)) {
					echo "<tr>";
						echo "<td>" . $row['ID'] . "</td>";
						echo "<td>" . $row['SYSTEM'] . "</td>";
						echo "<td>" . $row['PLANET'] . "</td>";
						echo "<td>" . $row['X'] . "</td>";
						echo "<td>" . $row['Y'] . "</td>";
						echo "<td>" . $row['DIFFICULTY'] . "</td>";
						echo "<td>" . $row['BIOME'] . "</td>";
						echo "<td>" . $row['STAR_TYPE'] . "</td>";
						echo "<td>" . date("M d Y", $row['DATE_ADDED']) . "</td>";
						if($row['AG_HUT'] == 1) { echo '<td><img src="images/agaran.png"/>HUT</td>'; }
						else { echo '<td>-</td>'; }
						if($row['AG_VIL'] == 1) { echo '<td><img src="images/agaran.png"/>VIL</td>'; }
						else { echo '<td>-</td>'; }
						if($row['AP_HSP'] == 1) { echo '<td><img src="images/apex.png"/>HSP</td>'; }
						else { echo '<td>-</td>'; }
						if($row['AP_LAB'] == 1) { echo '<td><img src="images/apex.png"/>LAB</td>'; }
						else { echo '<td>-</td>'; }
						if($row['AP_PUZ'] == 1) { echo '<td><img src="images/apex.png"/>PUZ</td>'; }
						else { echo '<td>-</td>'; }
						if($row['AP_VIL'] == 1) { echo '<td><img src="images/apex.png"/>VIL</td>'; }
						else { echo '<td>-</td>'; }
						if($row['AV_AIR'] == 1) { echo '<td><img src="images/avian.png"/>AIR</td>'; }
						else { echo '<td>-</td>'; }
						if($row['AV_TMB'] == 1) { echo '<td><img src="images/avian.png"/>TMB</td>'; }
						else { echo '<td>-</td>'; }
						if($row['AV_TMP'] == 1) { echo '<td><img src="images/avian.png"/>TMP</td>'; }
						else { echo '<td>-</td>'; }
						if($row['AV_VIL'] == 1) { echo '<td><img src="images/avian.png"/>VIL</td>'; }
						else { echo '<td>-</td>'; }
						if($row['FL_DGN'] == 1) { echo '<td><img src="images/floran.png"/>DGN</td>'; }
						else { echo '<td>-</td>'; }
						if($row['FL_VIL'] == 1) { echo '<td><img src="images/floran.png"/>VIL</td>'; }
						else { echo '<td>-</td>'; }
						if($row['GL_CST'] == 1) { echo '<td><img src="images/glitch.png"/>CST</td>'; }
						else { echo '<td>-</td>'; }
						if($row['GL_VIL'] == 1) { echo '<td><img src="images/glitch.png"/>VIL</td>'; }
						else { echo '<td>-</td>'; }
						if($row['HU_BAN'] == 1) { echo '<td><img src="images/human.png"/>BAN</td>'; }
						else { echo '<td>-</td>'; }
						if($row['HU_BSE'] == 1) { echo '<td><img src="images/human.png"/>BSE</td>'; }
						else { echo '<td>-</td>'; }
						if($row['HU_MIN'] == 1) { echo '<td><img src="images/human.png"/>MIN</td>'; }
						else { echo '<td>-</td>'; }
						if($row['HU_OUT'] == 1) { echo '<td><img src="images/human.png"/>OUT</td>'; }
						else { echo '<td>-</td>'; }
						if($row['HU_PRS'] == 1) { echo '<td><img src="images/human.png"/>PRS</td>'; }
						else { echo '<td>-</td>'; }
						if($row['GE_SEW'] == 1) { echo '<td><img src="images/other.png"/>SEW</td>'; }
						else { echo '<td>-</td>'; }
						if($row['GE_DNG'] == 1) { echo '<td><img src="images/other.png"/>DNG</td>'; }
						else { echo '<td>-</td>'; }
						switch($row['LIQUID']) {
							case 1:
								echo '<td><img src="images/juice.png"/>JUC</td>';
								break;
							case 2:
								echo '<td><img src="images/heal.png"/>HEA</td>';
								break;
							case 3:
								echo '<td><img src="images/lava.png"/>LAV</td>';
								break;
							case 4:
								echo '<td><img src="images/fuel.png"/>FUE</td>';
								break;
							case 5:
								echo '<td><img src="images/oil.png"/>OIL</td>';
								break;
							case 6:
								echo '<td><img src="images/poison.png"/>PSN</td>';
								break;

							case 0:
							default:
								echo '<td><img src="images/water.png"/>WAT</td>';
								break;
						}
					echo "</tr>";
				}
			?>
		</table>
		<div class="footer">
			<a href="add.php">Add location</a><br/>
			<?php
				$gen_time += microtime(true);
				echo "Page generated in " . number_format($gen_time,3) . " seconds";
			?>
		</div>
	</div>
</body>

</html>