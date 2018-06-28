<div class="container">
	<div class="row">
		<?php
			$pro_info_detail = get_field('mypc_info_details_pro'); 
		?>
		<div class="col-sm-8">
			<h2><?=$pro_info_detail['pro_name']?></h2>
		</div>
		<div class="col-sm-16">
			<ul class="mypc-detail-pro">
				<li><label>Tên chính thức: </label><span><?=$pro_info_detail['pro_name']?></span></li>
				<li><label>Vị trí: </label><span><?=$pro_info_detail['pro_location']?></span></li>
				<li><label>Chủ đầu tư: </label><span><?=$pro_info_detail['pro_investor']?></span></li>
				<li><label>Tư vấn thiết kế: </label><span><?=$pro_info_detail['pro_design_consultancy']?></span></li>
				<li><label>Loại hình sản phẩm: </label><span><?=$pro_info_detail['pro_category']?></span></li>
				<li><label>Vốn đầu tư: </label><span><?=$pro_info_detail['pro_investment']?></span></li>
				<li><label>Diện tích: </label><span><?=$pro_info_detail['pro_net_area']?></span></li>
				<li><label>Số lượng: </label><span><?=$pro_info_detail['pro_number_pro']?></span></li>
				<li><label>Thời gian thực hiện: </label><span><?=$pro_info_detail['pro_time_run']?></span></li>
			</ul>
		</div>
	</div>
</div>