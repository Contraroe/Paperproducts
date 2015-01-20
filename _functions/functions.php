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

	function AllCollNew () {
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
		//collecties in array steken RR 21/01/2015
		Global $aCollection;
	//	Global $coll_atel;

		$c=0;
		while($row=mysqli_fetch_assoc($query)) {
			$aCollection[] = $row;
			$coll_name=html_entity_decode($aCollection[$c]['coll_name']);
			$coll_id=html_entity_decode($aCollection[$c]['coll_id']);
			$coll_sub_id= $coll_id . "_1";
			$coll_atel=html_entity_decode($c);
			echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$coll_sub_id&coll_atel=$c'>" . $coll_name . "</a></li>";
			$c++;
		};
	//	print_r($aCollection);

		//$i=0;

		//while ($i < $numa) {
		//	mysqli_data_seek($query,$i);
		//	$row=mysqli_fetch_row($query);
		//	$coll_name=html_entity_decode($row[2]);
		//	$coll_id=html_entity_decode($row[1]);
		//	$coll_sub_id= $coll_id . "_1";

		//	echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$coll_sub_id'>" . $coll_name . "</a></li>";

		//	$i++;
		//};

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


		echo "	<ul id='back2'>";@
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
		// zonder mouseover
		//	echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[$j]&type_id=$type_id'><img src='_img/color/" . $row[$j] . "_C.jpg'/></a></li>";
		//	echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[$j]&type_id=$type_id'><img src='_img/color/" . $row[$j] . "_C.png' id='1_1_C' onmouseover='rolloverpng(1,\"".$row[$j] . "\")' /></a></li>";
		//	echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[$j]&type_id=$type_id'><img src='_img/color/" . $row[$j] . "_C.jpg' id='1_1_C' onmouseover='rolloverpng(1,$coll_id,\"".$row[$j] . "\",$type_id)' /></a></li>";
		// RR 21/01/2015 met mouseover en met a href en zonder onclick
		// echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[$j]&type_id=$type_id'><img src='_img/color/" . $row[$j] . "_C.jpg' id='1_1_C' onmouseover='rolloverpng(1,$coll_id,\"".$row[$j] . "\",$type_id)'  /></a></li>";
		//echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[$j]&type_id=$type_id'>
		// 	onclick='rolloverpng(1,$coll_id,\"".$row[$j] . "\",$type_id)'  is niet nodig
		echo "<li>
					<img src='_img/color/" . $row[$j] . "_C.jpg' id='1_1_C'
					    onmouseover='rolloverpng(1,$coll_id,\"".$row[$j] . "\",$type_id)'  />
			  </li>";

			}
			$j = $j + 2;
		}

		echo "</ul>";
		//  zonder mouseover
		//	echo "<div id='coverimg'><img src='_img/collections/" . $coll_sub_id . ".jpg'/></div>";
		// RR 20/01/2015 met mouseover
		//   echo "<div id='coverimg'><a href='collections.php?coll_id=$coll_id&coll_sub_id=". $coll_sub_id . "&type_id=$type_id' id='1_2'><img src='_img/collections/" . $coll_sub_id . ".jpg' id='1_1'  /></div>";
		// met mouseover zonder a href
  	       echo "<div id='coverimg'><img src='_img/collections/" . $coll_sub_id . ".jpg' id='1_1'  /></div>";

	}


	function ActiveType ($type_id) {
		include "_php/db_config.php";
		include "_php/db_connect.php";

		$result = mysqli_query($connect, " SELECT type_name FROM finishing WHERE type_id = $type_id ");
		mysqli_close($connect);

		$row = mysqli_fetch_row ($result);

		echo $row[0] ;

	}
// TECHNICAL INFO
	function GetTech () {
		include "_php/db_config.php";
		include "_php/db_connect.php";

		include "_functions/variables.php";

		echo "<ul id='techtypecont'>";

		$techtype = mysqli_query($connect, " SELECT type_name , type_id FROM finishing ");
		$num = mysqli_num_rows ($techtype);

		$i=0;
		$b=4;
		$active = "active";
		$test = $type_id;

		$techactive = mysqli_query($connect, " SELECT * FROM collections WHERE coll_id = $coll_id ");
		$row2 = mysqli_fetch_row($techactive);




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



			echo "<li class='pos_" . $row2[$b] . "'><a  class='". $active . " pos_" . $row2[$b] . "' href='collections.php?coll_id=$coll_id&coll_sub_id=$coll_sub_id&type_id=$type_id#techinfo'>" . $type_name . "</a></li>";

			$i++;
			$b++;

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
							WHERE finishing.type_id = $type_id");
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

		// PLASTIFICATION ???
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
			if ($coll_id == 10) {
				echo "<div id='tech' class='active_" . html_entity_decode($row[16]) . "'>Cardboard</div>";
			} else {};
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
	//	echo "<div id='techimg'><img src='_img/collections/" . $coll_sub_id . ".jpg'/></div>";
	    echo "<div id='techimg'><img src='_img/collections/" . $coll_sub_id . ".jpg' id='1_3'  /></div>";

	}




// NAVIGATION GLOBAL
	function PrevColl ($coll_id){
		include "_php/db_config.php";
		include "_php/db_connect.php";

		include "_functions/variables.php";

		$query=mysqli_query($connect, " SELECT * FROM collections WHERE coll_active = 1 AND coll_id = $coll_id - 1");
		mysqli_close($connect);

		$row = mysqli_fetch_row ($query);

		$prev_sub_id = $row[1] . "_1";
		$prev_coll_id = $row[1];
		$coll_name = $row[2];

		echo "<a href='collections.php?coll_id=$prev_coll_id&coll_sub_id=$prev_sub_id'> " . $coll_name . "</a>";
	}
	function NextColl ($coll_id){
		include "_php/db_config.php";
		include "_php/db_connect.php";

		include "_functions/variables.php";
		$next_coll_id = $coll_id + 1;
		$query = mysqli_query($connect, " SELECT * FROM collections WHERE coll_active = 1 AND coll_id = $next_coll_id ");
		mysqli_close($connect);

		$row = mysqli_fetch_row ($query);

		$next_sub_id = $row[1] . "_1";
		$next_coll_id = $row[1];
		$coll_name = $row[2];

		echo "<a href='collections.php?coll_id=$next_coll_id&coll_sub_id=$next_sub_id'>" . $coll_name . "</a>";
	}

	function PrevCollNew ($coll_id,$coll_atel){

		include "_functions/variables.php";
		Global $aCollection;
		$arrlength = count($aCollection) - 1;
		if($coll_atel <= 0 ) {
			$prev_coll_atel = $arrlength;
		}
		else {
			$prev_coll_atel = $coll_atel - 1;	
		}	
		
		$prev_sub_id = $aCollection[$prev_coll_atel]['coll_id'] . "_1";
		$prev_coll_id = $aCollection[$prev_coll_atel]['coll_id'];


		echo "<a href='collections.php?coll_id=$prev_coll_id&coll_sub_id=$prev_sub_id&coll_atel=$prev_coll_atel'>" . $aCollection[$prev_coll_atel]['coll_name'] . "</a>";
	}

	function NextCollNew ($coll_id,$coll_atel){

		include "_functions/variables.php";
		Global $aCollection;
		$arrlength = count($aCollection) - 1;
		$next_sub_id = $coll_id . "_1";
//		print_r($aCollection);

		if($coll_atel < $arrlength) {
		   $next_coll_atel = $coll_atel + 1;
		}
		else {
			$next_coll_atel = 0;
		}
		
		$next_sub_id = $aCollection[$next_coll_atel]['coll_id'] . "_1";
		$next_coll_id = $aCollection[$next_coll_atel]['coll_id'];


		echo "<a href='collections.php?coll_id=$next_coll_id&coll_sub_id=$next_sub_id&coll_atel=$next_coll_atel'>" . $aCollection[$next_coll_atel]['coll_name'] . "</a>";
	}
?>