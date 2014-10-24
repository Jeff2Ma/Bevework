<?php

function dw_store_list_page(){
	add_theme_page("DW商城","DW商城",'edit_themes','dw_store_list_page','dwstore_list_xml'); 
	//add_theme_page("test","test",'edit_themes','dw_store_list_page','dwtest');
}
add_action('admin_menu','dw_store_list_page');

function dwstore_list_xml(){

 	//create new document object
 	$dom_object = new DOMDocument();
 	//load xml file
 	$dom_object->load("http://site.devework.com/store.xml");

 	$item = $dom_object->getElementsByTagName("item");
 ?>
 
 <div class="wrap">
		<h2>DW商城在售商品</h2>
		<table class="widefat" cellspacing="0">
			<thead>
				<tr>
					<th style="width:164px;" colspan="2">商品</th>
					<th>介绍</th>
					<th style="width:64px;">详细介绍</th>
					<th style="width:32px;">价格</th>
					<th style="width:64px;">购买</th>
				</th>
			</thead>
			<tbody>


 <?php foreach( $item as $value ){
 $names = $value->getElementsByTagName("name");
 $name  = $names->item(0)->nodeValue;

 $pics = $value->getElementsByTagName("pic");
 $pic  = $pics->item(0)->nodeValue;

 $prices = $value->getElementsByTagName("price");
 $price  = $prices->item(0)->nodeValue;

 $links = $value->getElementsByTagName("link");
 $link  = $links->item(0)->nodeValue;

 $buys = $value->getElementsByTagName("buy");
 $buy  = $buys->item(0)->nodeValue;

 $intros = $value->getElementsByTagName("intro");
 $intro  = $intros->item(0)->nodeValue;
 ?>
			<tr>
					<td><img src="<?php echo $pic; ?>?imageView/1/w/150/h/150" width="50" /></td>
					<td style="width:100px;"><a href="<?php echo $link; ?>"><?php echo $name; ?></a></td>
					<td><?php echo $intro; ?></td>
					<td><a href="<?php echo $link; ?>">查看详细</a></td>
					<td>￥<?php echo $price; ?></td>
					<td><a href="<?php echo $buy; ?>">立即购买</a></td>
				</th>
			<tr>
<?php } ?>
</tbody>
		</table>
	</div>
<?php }?>