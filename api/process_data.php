<?php


include "../database/connect.php";
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST');


function DateThai($strDate)
{
	$strYear = date("Y", strtotime($strDate)) + 543;
	$strMonth = date("n", strtotime($strDate));
	$strDay = date("j", strtotime($strDate));
	$strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	$strMonthThai = $strMonthCut[$strMonth];
	return "$strDay $strMonthThai $strYear";
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$data = array();
	$limit = 5;
	$page = 1;

	if ($_POST["page"] > 1) {
		$start = (($_POST["page"] - 1) * $limit);

		$page = $_POST["page"];
	} else {
		$start = 0;
	}


	$query = "SELECT * FROM tbl_news INNER JOIN  tbl_news_type ON  tbl_news_type.n_type_id = tbl_news.n_type WHERE n_status = '1' ORDER BY n_id  DESC";

	$filter_query = $query . ' LIMIT ' . $start . ', ' . $limit . '';

	$statement = $conn->prepare($query);

	$statement->execute();



	$total_data = $statement->rowCount();

	$statement = $conn->prepare($filter_query);

	$statement->execute();

	$result = $statement->fetchAll();

	foreach ($result as $row) {
		extract($row);


		$c_time = DateThai($row['create_at']);

		$data[] = array(

			"id" => $n_id,
			"name" => $n_name,
			"type" => $n_type,
			"detail" => $n_detail,
			"url" => $url,
			"user_id" => $user_id,
			"image" => $n_image,
			"date" => $c_time,
		);
	}



	$pagination_html = '
	<div align="center">
  		<ul class="pagination">
	';

	$total_links = ceil($total_data / $limit);

	$previous_link = '';

	$next_link = '';

	$page_link = '';

	if ($total_links > 4) {
		if ($page < 5) {
			for ($count = 1; $count <= 5; $count++) {
				$page_array[] = $count;
			}
			$page_array[] = '...';
			$page_array[] = $total_links;
		} else {
			$end_limit = $total_links - 5;

			if ($page > $end_limit) {
				$page_array[] = 1;

				$page_array[] = '...';

				for ($count = $end_limit; $count <= $total_links; $count++) {
					$page_array[] = $count;
				}
			} else {
				$page_array[] = 1;

				$page_array[] = '...';

				for ($count = $page - 1; $count <= $page + 1; $count++) {
					$page_array[] = $count;
				}

				$page_array[] = '...';

				$page_array[] = $total_links;
			}
		}
	} else {
		for ($count = 1; $count <= $total_links; $count++) {
			$page_array[] = $count;
		}
	}

	for ($count = 0; $count < count($page_array); $count++) {
		if ($page == $page_array[$count]) {
			$page_link .= '
			<li class="page-item active">
	      		<a class="page-link" href="#">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
	    	</li>
			';

			$previous_id = $page_array[$count] - 1;

			if ($previous_id > 0) {
				$previous_link = '<li class="page-item"><a class="page-link" href="javascript:load_data(`' . $_POST["query"] . '`, ' . $previous_id . ')">Previous</a></li>';
			} else {
				$previous_link = '
				<li class="page-item disabled">
			        <a class="page-link" href="#">Previous</a>
			    </li>
				';
			}

			$next_id = $page_array[$count] + 1;

			if ($next_id >= $total_links) {
				$next_link = '
				<li class="page-item disabled">
	        		<a class="page-link" href="#">Next</a>
	      		</li>
				';
			} else {
				$next_link = '
				<li class="page-item"><a class="page-link" href="javascript:load_data(`' . $_POST["query"] . '`, ' . $next_id . ')">Next</a></li>
				';
			}
		} else {
			if ($page_array[$count] == '...') {
				$page_link .= '
				<li class="page-item disabled">
	          		<a class="page-link" href="#">...</a>
	      		</li>
				';
			} else {
				$page_link .= '
				<li class="page-item">
					<a class="page-link" href="javascript:load_data(`' . $_POST["query"] . '`, ' . $page_array[$count] . ')">' . $page_array[$count] . '</a>
				</li>
				';
			}
		}
	}

	$pagination_html .= $previous_link . $page_link . $next_link;


	$pagination_html .= '
		</ul>
	</div>
	';

	$output = array(
		'data'				=>	$data,
		'pagination'		=>	$pagination_html,
		'total_data'		=>	$total_data
	);

	echo json_encode($output);
}