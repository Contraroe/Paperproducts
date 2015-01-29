<?php
// COLLECTION NAVIGATION

	function AllColl () {
		include "_php/db_config.php";
		include "_php/db_connect.php";


		echo "<div id='cont' class='mainnav'><ul>
				<li class='home'><a href='index.php'>Home</a></li>
				<li class='colltoggle'>Collections</li>
				<li class='contact'>Contact</li>

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

			echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$coll_sub_id$coll_atel=$coll_atel'>" . $coll_name . "</a></li>";

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
				<li class='contact'>contact</li>

			</ul></div>
			<div id='border'></div>
			<div id='cont' class='collnav'><ul id='collnav'>";


		$query=mysqli_query($connect, " SELECT * FROM collections WHERE coll_active = '1'");
		mysqli_close($connect);

		$numa=mysqli_num_rows($query);
		//collecties in array steken RR 21/01/2015
		Global $aCollection;
		Global $coll_atel;

		$c=0;
		while($row=mysqli_fetch_assoc($query)) {
			$aCollection[] = $row;
			$coll_name=html_entity_decode($aCollection[$c]['coll_name']);
			$coll_id=html_entity_decode($aCollection[$c]['coll_id']);
			$coll_sub_id= $coll_id . "_1";
			$coll_atel=html_entity_decode($c);
			echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$coll_sub_id&coll_atel=$coll_atel'>" . $coll_name . "</a></li>";
			$c++;
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
		while ( $j < 25 ) {
			if ( $row[$j] == NULL ) {}else{
		echo "<li>
				<img src='_img/color/" . $row[$j] . "_C.jpg' id='1_1_C'
				onclick='rolloverpng(1,$coll_id,\"".$row[$j] . "\",$type_id)'  />
		</li>";

			}
			$j = $j + 2;
		}

		echo "</ul>";
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
	function GetTechNew () {
		include "_php/db_config.php";
		include "_php/db_connect.php";
		include "_functions/variables.php";

		//  LIST POSIBLE FINISHING TYPES
		$types = mysqli_query($connect, "	SELECT *
							FROM coll_types_pos
								INNER JOIN finishing
									ON coll_types_pos.type_id = finishing.type_id
								INNER JOIN inside
									ON coll_types_pos.type_id = inside.type_id
								INNER JOIN cover
									ON coll_types_pos.type_id = cover.type_id
							WHERE coll_id = $coll_id
							AND state = 1" );

		echo "<ul id='techtypecont'>";

		$ty = 0;
		while ( $row = mysqli_fetch_assoc($types)) {
			$aTypes[] = $row;
			$type_name = $aTypes[$ty]['type_name'];
			$type_id = $aTypes[$ty]['type_id'];

			echo "<li><a onclick='techdatachange(" . $ty . ")'>" . $type_name . "</a></li>";
			$ty++;
		}
		echo "</ul>";
		// PrintArr($types);


		$num_row = mysqli_num_rows($types);



		$type_var = 0;

		echo "<div id='techimg'><img src='_img/collections/" . $coll_sub_id . ".jpg' id='1_3'  /></div>";

		while ($type_var < $num_row) {

			if ($aTypes[$type_var]['type_size'] == "A4" ) {
				$test = "";
			} elseif ($aTypes[$type_var]['type_size']== "A4 / A5") {
				$test = "";
			} else {
				$test = " mm";
			}

			$index = " index_". $type_var;
			echo"<div id='cont' class='info" . $index . "'>";

				echo "<div id='outcont'>";
					echo "<div id='techcont'>";
						echo "<h2>Size</h2>" ;
						echo "<div id='tech' class='a_1 active_1'>" . html_entity_decode($aTypes[$type_var]['type_size']) . $test . "</div>";
					echo "</div>";
					echo "<div id='techcont'>";
						echo "<h2>Binding</h2>";
						echo "<div id='tech' class='b_1 active_" . html_entity_decode($aTypes[$type_var]['type_bind_glue']) . "'>Glued</div>";
						echo "<div id='tech' class='b_2 active_" . html_entity_decode($aTypes[$type_var]['type_bind_wire']) . "'>Wire-O</div>";
						echo "<div id='tech' class='b_3 active_" . html_entity_decode($aTypes[$type_var]['type_bind_genaaid']) . "'>Sewn</div>";
					echo "</div>";
					echo "<div id='techcont'>";
						echo "<h2>Corner</h2>" ;
						echo "<div id='tech' class='active_1'>Straight corners</div>";
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['type_corner_option']) . "'>Rounded corners</div>";
					echo "</div>";
					echo "<div id='techcont'>";
						echo "<h2>Cover</h2>" ;
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['type_cover_fl']) . "'>Flap left</div>";
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['type_cover_d']) . "'>Double</div>";
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['type_cover_s']) . "'>Softcover</div>";
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['type_cover_h']) . "'>Hardcover</div>";
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['type_cover_l']) . "'>Leather</div>";
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['type_cover_c']) . "'>Cardboard</div>";
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['type_cover_ls']) . "'>Linnen Softcover</div>";
					echo "</div>";
					if ($aTypes[$type_var]['type_id'] == 2 ){
						echo "<div id='techcont'>";
							echo "<h2>Cover extra finishing</h2>" ;
							echo "<div id='tech' class='active_1'>Softtouch plastification</div>";
						echo "</div>";
					} elseif ($aTypes[$type_var]['type_id'] == 3 ){
						echo "<div id='techcont'>";
							echo "<h2>Cover extra finishing</h2>" ;
							echo "<div id='tech' class='active_1'>Softtouch plastification</div>";
						echo "</div>";
					} elseif ($aTypes[$type_var]['type_id'] == 6 ){
						echo "<div id='techcont'>";
							echo "<h2>Cover extra finishing</h2>" ;
							echo "<div id='tech' class='active_1'>Softtouch plastification</div>";
						echo "</div>";
					} else {};
					echo "<div id='techcont'>";
						echo "<h2>Layout</h2>" ;
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['Lines']) . "'>Lines</div>";
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['Squares']) . "'>Squares</div>";
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['Lines / Notebook']) . "'> Lines / Notebook</div>";
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['Notes right / Diary left']) . "'>Notes right / Diary left</div>";
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['Academic Diary']) . "'>Academic Diary</div>";
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['Note right / Academic Diary left']) . "'>Note right / Academic Diary left</div>";
						echo "<div id='tech' class='active_" . html_entity_decode($aTypes[$type_var]['Blanco']) . "'>Blanco / Sticker Sheet</div>";
					echo "</div>";
				echo "</div>";
				
			echo "</div>";


			$type_var++;
		}
		
	}
// NAVIGATION GLOBAL
	function PrevColl ($coll_id,$coll_atel){
		include "_functions/variables.php";
		Global $aCollection;

		$prev_coll_atel = $coll_atel - 1;

		function endKey($array){
			end($array);
			return key($array);
		}

		if (isset($aCollection[$prev_coll_atel])) {
			$prev_sub_id = $aCollection[$prev_coll_atel]['coll_id'] . "_1";
			$prev_coll_id = $aCollection[$prev_coll_atel]['coll_id'];
			echo "<a href='collections.php?coll_id=$prev_coll_id&coll_sub_id=$prev_sub_id&coll_atel=$prev_coll_atel'>" . $aCollection[$prev_coll_atel]['coll_name'] . "</a>";
		} else {
			$prev_coll_atel = endKey($aCollection);
			$prev_sub_id = $aCollection[$prev_coll_atel]['coll_id'] . "_1";
			$prev_coll_id = $aCollection[$prev_coll_atel]['coll_id'];
			echo "<a href='collections.php?coll_id=$prev_coll_id&coll_sub_id=$prev_sub_id&coll_atel=$prev_coll_atel'>" . $aCollection[$prev_coll_atel]['coll_name'] . "</a>";
		}
	}

	function NextColl ($coll_id,$coll_atel){
		include "_functions/variables.php";
		Global $aCollection;

		$next_coll_atel = $coll_atel + 1;

		if (isset($aCollection[$next_coll_atel])) {
			$next_sub_id = $aCollection[$next_coll_atel]['coll_id'] . "_1";
			$next_coll_id = $aCollection[$next_coll_atel]['coll_id'];
			echo "<a href='collections.php?coll_id=$next_coll_id&coll_sub_id=$next_sub_id&coll_atel=$next_coll_atel'>" . $aCollection[$next_coll_atel]['coll_name'] . "</a>";
		} else {
			$next_coll_atel = 0;
			$next_sub_id = $aCollection[$next_coll_atel]['coll_id'] . "_1";
			$next_coll_id = $aCollection[$next_coll_atel]['coll_id'];
			echo "<a href='collections.php?coll_id=$next_coll_id&coll_sub_id=$next_sub_id&coll_atel=$next_coll_atel'>" . $aCollection[$next_coll_atel]['coll_name'] . "</a>";
		}
	}
// DEVELOPMENT
	function PrintArr ($array) {
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
?>