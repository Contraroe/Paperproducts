<?php
// COLLECTION NAVIGATION

	function AllColl () {
		include "_php/db_config.php";
		include "_php/db_connect.php";


		echo "<div id='cont' class='mainnav'><ul>
				<li class='home'><a href='index.php'>Home</a></li>
				<li class='colltoggle'>Collections</li>
				<li class='contact'><a href='mailto:info@lannoopaperproducts.be'>Contact</a></li>

			</ul></div>
			<div id='border'></div>
			<div id='cont' class='collnav'><ul id='collnav'>";


		$query=mysqli_query($connect, " SELECT * FROM collections WHERE coll_active = '1'");
		mysqli_close($connect);

		$numa=mysqli_num_rows($query);
		$i=0;

		while ($i < $numa) {
			mysqli_data_seek($query,$i);
			$row=mysqli_fetch_row($query);
			$coll_name=html_entity_decode($row[2]);
			$coll_id=html_entity_decode($row[1]);
			$coll_sub_id= $coll_id . "_1";

			echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$coll_sub_id'>" . $coll_name . "</a></li>";

			$i++;
		};

		echo "</ul><div></div>";
	}

	function ActiveColl ($coll_id) {
		include "_php/db_config.php";
		include "_php/db_connect.php";

		$result = mysqli_query($connect, " SELECT * FROM collections WHERE coll_id = $coll_id ");
		mysqli_close($connect);

		$row = mysqli_fetch_row ($result);

		echo $row[2] ;

	}
// DESIGN INFO

	function GetDesign ($coll_id, $coll_sub_id) {
		include "_php/db_config.php";
		include "_php/db_connect.php";

		include "_functions/variables.php";

		$result = mysqli_query($connect, " SELECT * FROM design WHERE coll_id = $coll_id ");
		mysqli_close($connect);

		$row = mysqli_fetch_row ($result);

		echo "	<ul id='back'>";
		$a = 7;
		while ( $a > 0) {
			echo "<li class='fake_$a'></li>";
			$a = $a - 1;
		}
		echo "</ul>";


		echo "	<ul id='back2'>";
		$b = 7;
		while ( $b > 0) {
			echo "<li class='fake_$b'></li>";
			$b = $b - 1;
		}
		echo "</ul>";


		echo "<ul id='picker'>";

		$j=3;
		while ( $j < 16 ) {
			if ( $row[$j] == NULL ) {}else{
//			echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[$j]&type_id=$type_id'><img src='_img/color/" . $row[$j] . "_C.jpg'/></a></li>";
//			echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[$j]&type_id=$type_id'><img src='_img/color/" . $row[$j] . "_C.png' id='1_1_C' onmouseover='rolloverpng(1,\"".$row[$j] . "\")' /></a></li>";
			echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[$j]&type_id=$type_id'><img src='_img/color/" . $row[$j] . "_C.jpg' id='1_1_C' onmouseover='rolloverpng(1,$coll_id,\"".$row[$j] . "\",$type_id)' /></a></li>";

			}
			$j = $j + 2;
		}

		echo "</ul>";
//		echo "<div id='coverimg'><img src='_img/collections/" . $coll_sub_id . ".jpg'/></div>";
//		echo "<div id='coverimg'><img src='_img/collections/" . $coll_sub_id . ".jpg' id='1_1' /></div>";
		echo "<div id='coverimg'><a href='collections.php?coll_id=$coll_id&coll_sub_id=". $coll_sub_id . "&type_id=$type_id' id='1_2'><img src='_img/collections/" . $coll_sub_id . ".jpg' id='1_1'  /></div>";

	}


	function ActiveType ($type_id) {
		include "_php/db_config.php";
		include "_php/db_connect.php";

		$result = mysqli_query($connect, " SELECT type_name FROM finishing WHERE type_id = $type_id ");
		mysqli_close($connect);

		$row = mysqli_fetch_row ($result);

		echo $row[0] ;

	}

	function GetDesignNew ($coll_id, $coll_sub_id) {
		include "_php/db_config.php";
		include "_php/db_connect.php";

		include "_functions/variables.php";

		$result = mysqli_query($connect, " SELECT * FROM design WHERE coll_id = $coll_id ");
		mysqli_close($connect);

		$row = mysqli_fetch_row ($result);
		echo "	<ul id='back'>
				<li class='fake_7'></li>
				<li class='fake_6'></li>
				<li class='fake_5'></li>
				<li class='fake_4'></li>
				<li class='fake_3'></li>
				<li class='fake_2'></li>
				<li class='fake_1'></li>
			</ul>
			<ul id='back2'>
				<li class='fake_7'></li>
				<li class='fake_6'></li>
				<li class='fake_5'></li>
				<li class='fake_4'></li>
				<li class='fake_3'></li>
				<li class='fake_2'></li>
				<li class='fake_1'></li>
			</ul>";
		echo "<ul>";
		
		

		$rowtrimmed = trim($row[3]);
		echo "<li><img src='_img/color/" . $rowtrimmed . "_C.png' id='1_1_C' onmouseover='rolloverpng(1,$coll_id,\"".$row[3] . "\",$type_id)' /></a></li>";
		$rowtrimmed = trim($row[5]);
		echo "<li><img src='_img/color/" . $rowtrimmed . "_C.png' id='1_1_C' onmouseover='rolloverpng(1,$coll_id,\"".$row[5] . "\",$type_id)' /></a></li>";

		$rowtrimmed = trim($row[7]);
		echo "<li><img src='_img/color/" . $rowtrimmed . "_C.png' id='1_1_C' onmouseover='rolloverpng(1,$coll_id,\"".$row[7] . "\",$type_id)' /></a></li>";

		$rowtrimmed = trim($row[9]);
		echo "<li><img src='_img/color/" . $rowtrimmed . "_C.png' id='1_1_C' onmouseover='rolloverpng(1,$coll_id,\"".$row[9] . "\",$type_id)' /></a></li>";

		$rowtrimmed = trim($row[11]);
		echo "<li><img src='_img/color/" . $rowtrimmed . "_C.png' id='1_1_C' onmouseover='rolloverpng(1,$coll_id,\"".$row[11] . "\",$type_id)' /></a></li>";

		$rowtrimmed = trim($row[13]);
		echo "<li><img src='_img/color/" . $rowtrimmed . "_C.png' id='1_1_C' onmouseover='rolloverpng(1,$coll_id,\"".$row[13] . "\",$type_id)' /></a></li>";
			
		echo "</ul>";
		echo "<div id='coverimg'><a href='collections.php?coll_id=$coll_id&coll_sub_id=". $coll_sub_id . "&type_id=$type_id' id='1_2'><img src='_img/collections/" . $coll_sub_id . ".png' id='1_1'  /></div>";
	}

// TECHNICAL INFO
	function GetTech () {
		include "_php/db_config.php";
		include "_php/db_connect.php";

		include "_functions/variables.php";

		echo "<ul>";

		$techtype = mysqli_query($connect, " SELECT type_name , type_id FROM finishing ");
		mysqli_close($connect);

		$num = mysqli_num_rows ($techtype);

		$i=0;

		$active = "active";

		$test = $type_id;


		while ($i < $num) {
			mysqli_data_seek($techtype,$i);
			$row=mysqli_fetch_row($techtype);
			$type_name=html_entity_decode($row[0]);
			$type_id=html_entity_decode($row[1]);


			if ($test == $row[1]) {
				$active = "active";
			} else {
				$active = "no";
			};

			echo "<li><a  class='". $active ."' href='collections.php?coll_id=$coll_id&coll_sub_id=$coll_sub_id&type_id=$type_id#techinfo'>" . $type_name . "</a></li>";

			$i++;

		};

		echo "</ul>";
	}

	function TechDetOne ($type_id) {
		include "_php/db_config.php";
		include "_php/db_connect.php";

		include "_functions/variables.php";

		$techtype = mysqli_query($connect, " SELECT *
							FROM finishing
							INNER JOIN cover ON finishing.type_id = cover.type_id
							WHERE finishing.type_id =$type_id");
		mysqli_close($connect);

		$num =mysqli_num_rows($techtype);
		$row=mysqli_fetch_row($techtype);

		// MM or NOT
		if ($row[3] == "A4" ) {
			$test = "";
		} elseif ($row[3] == "A4 / A5") {
			$test = "";
		} else {
			$test = " mm";
		}

		// PLASTIFICATION DETERMINER
		$plast = 1;
		if ($type_id == 4 | $type_id == 5){
			$plast = 0;
		} else {
			$plast =1;
		}
		echo "<div id='outcont'>";
		echo "<div id='techcont'>";
			echo "<h2>Size</h2>" ;
			echo "<div id='tech' class='active_1'>" . html_entity_decode($row[3]) . "</div>";
		echo "</div>";
		echo "<div id='techcont'>";
			echo "<h2>Binding</h2>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[4]) . "'>Glued</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[5]) . "'>Wire-O</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[6]) . "'>Sewn</div>";
		echo "</div>";
		echo "<div id='techcont'>";
			echo "<h2>Corner</h2>" ;
			echo "<div id='tech' class='active_1'>Straight corners</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[7]) . "'>Rounded corners</div>";
		echo "</div>";
		echo "<div id='techcont'>";
			echo "<h2>Cover</h2>" ;
			echo "<div id='tech' class='active_" . html_entity_decode($row[11]) . "'>Flap left</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[12]) . "'>Double</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[13]) . "'>Softcover</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[14]) . "'>Hardcover</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[15]) . "'>Leather</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[16]) . "'>Cardboard</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[17]) . "'>Linnen Softcover</div>";
		echo "</div>";

		if ($plast == 1) {
			echo "<div id='techcont'>";
		echo "<h2>Cover extra finishing</h2>" ;
		echo "<div id='tech' class='active_" . $plast . "'>Softtouch plastification</div>";
		echo "</div>";
		} else {};
	}

	function TechDetTwo ($type_id) {
		include "_php/db_config.php";
		include "_php/db_connect.php";

		include "_functions/variables.php";

		$techtype = mysqli_query($connect, " SELECT *
							FROM inside
							WHERE type_id =$type_id");
		mysqli_close($connect);

		$num =mysqli_num_rows($techtype);
		$row=mysqli_fetch_row($techtype);

		echo "<div id='techcont'>";
			echo "<h2>Layout</h2>" ;
			echo "<div id='tech' class='active_" . html_entity_decode($row[3]) . "'>Lines</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[4]) . "'>Squares</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[5]) . "'> Lines / Notebook</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[6]) . "'>Notes right / Diary left</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[7]) . "'>Academic Diary</div>";
			echo "<div id='tech' class='active_" . html_entity_decode($row[8]) . "'>Note right / Academic Diary left</div>";
		echo "</div>";
		echo "</div>";
		echo "<div id='techimg'><img src='_img/collections/" . $coll_sub_id . ".jpg'/></div>";
	}
// NAVIGATION GLOBAL
	function PrevColl ($coll_id){
		include "_php/db_config.php";
		include "_php/db_connect.php";

		include "_functions/variables.php";

		$query=mysqli_query($connect, " SELECT coll_name FROM collections WHERE coll_active = 1");

		$numa=mysqli_num_rows($query);

		if ($coll_id == 1) {
			$prev_id = $numa;
		} else {
			$prev_id = $coll_id - 1;
		}
		$prev_sub_id = $prev_id . "_1";

		$query=mysqli_query($connect, " SELECT coll_name FROM collections WHERE coll_id = $prev_id");
		mysqli_close($connect);

		$numa2=mysqli_num_rows($query);
		$row=mysqli_fetch_row($query);

		echo "<a href='collections.php?coll_id=$prev_id&coll_sub_id=$prev_sub_id'> " . $row[0] . "</a>";
	}

	function NextColl ($coll_id){
		include "_php/db_config.php";
		include "_php/db_connect.php";

		include "_functions/variables.php";
		$query=mysqli_query($connect, " SELECT * FROM collections WHERE coll_active = 1");


		$numa=mysqli_num_rows($query);

		if ($coll_id == $numa) {
			$next_id = 1;
		} else {
			$next_id = $coll_id + 1;
		}
		$next_sub_id = $next_id . "_1";

		$query=mysqli_query($connect, " SELECT coll_name FROM collections WHERE coll_id = $next_id");
		mysqli_close($connect);

		$numa2=mysqli_num_rows($query);
		$row=mysqli_fetch_row($query);

		echo "<a href='collections.php?coll_id=$next_id&coll_sub_id=$next_sub_id'>" . $row[0] . " </a>";

	}
?>