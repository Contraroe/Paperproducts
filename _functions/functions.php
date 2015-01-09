<?php
	$coll_id = $_REQUEST['coll_id'];
	$coll_sub_id = $_REQUEST['coll_sub_id'];

	function AllColl () {
		include "_php/db_config.php";
		include "_php/db_connect.php";

		echo "<ul>	<li class='home'><a href='index.php'>Home</a></li>
				<li class='contact'><a href='contact.php'>Contact</a></li>
			</ul>
			<ul>";


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

		echo "</ul>";
	}


	function GetDesign ($coll_id, $coll_sub_id) {
		include "_php/db_config.php";
		include "_php/db_connect.php";

		$result = mysqli_query($connect, " SELECT * FROM design WHERE coll_id = $coll_id ");
		mysqli_close($connect);

		$row = mysqli_fetch_row ($result);

		echo "<ul>";
		echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[5]'><img src='_img/color/" . $row[5] . "_C.png'/></a></li>";
		echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[7]''><img src='_img/color/" . $row[7] . "_C.png'/></a></li>";
		echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[9]''><img src='_img/color/" . $row[9] . "_C.png'/></a></li>";
		echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[11]''><img src='_img/color/" . $row[11] . "_C.png'/></a></li>";
		echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[13]''><img src='_img/color/" . $row[13] . "_C.png'/></a></li>";
		echo "<li><a href='collections.php?coll_id=$coll_id&coll_sub_id=$row[15]''><img src='_img/color/" . $row[15] . "_C.png'/></a></li>";
		echo "</ul>";
		echo "<div><img src='_img/collections/" . $coll_sub_id . ".png'/></div>";

	}

	function GetTech ($coll_id) {
		include "_php/db_config.php";
		include "_php/db_connect.php";

		// $result = mysqli_query($connect, " SELECT * FROM design WHERE coll_id = $coll ");
		// mysqli_close($connect);

		// $row = mysqli_fetch_row ($result);

		echo $coll_id;

	}

?>