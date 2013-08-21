<div id="col-right">
<div class="col-wrap">

<!-- Display a list of the sub-categories which have already been created -->
<?php wp_nonce_field(); ?>
<?php wp_referer_field(); ?>

<?php 
			if (isset($_GET['Page'])) {$Page = $_GET['Page'];}
			else {$Page = 1;}
			
			$Sql = "SELECT * FROM $subcategories_table_name ";
				if (isset($_GET['OrderBy'])) {$Sql .= "ORDER BY " . $_GET['OrderBy'] . " " . $_GET['Order'] . " ";}
				else {$Sql .= "ORDER BY SubCategory_Name ";}
				$Sql .= "LIMIT " . ($Page - 1)*20 . ",20";
				$myrows = $wpdb->get_results($Sql);
				$num_rows = $wpdb->num_rows; 
				$Number_of_Pages = ceil($wpdb->num_rows/20);
				$Current_Page_With_Order_By = "admin.php?page=UPCP-options&DisplayPage=SubCategories";
				if (isset($_GET['OrderBy'])) {$Current_Page_With_Order_By .= "&OrderBy=" .$_GET['OrderBy'] . "&Order=" . $_GET['Order'];}?>

<form action="admin.php?page=UPCP-options&Action=MassDeleteSubCategories&DisplayPage=SubCategories" method="post">  
<div class="tablenav top">
		<div class="alignleft actions">
				<select name='action'>
  					<option value='-1' selected='selected'>Bulk Actions</option>
						<option value='delete'>Delete</option>
				</select>
				<input type="submit" name="" id="doaction" class="button-secondary action" value="Apply"  />
		</div>
		<div class='tablenav-pages <?php if ($Number_of_Pages == 1) {echo "one-page";} ?>'>
				<span class="displaying-num"><?php echo $wpdb->num_rows; ?> items</span>
				<span class='pagination-links'>
						<a class='first-page <?php if ($Page == 1) {echo "disabled";} ?>' title='Go to the first page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=1'>&laquo;</a>
						<a class='prev-page <?php if ($Page < 2) {echo "disabled";} ?>' title='Go to the previous page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page-1;?>'>&lsaquo;</a>
						<span class="paging-input"><?php echo $Page; ?> of <span class='total-pages'><?php echo $Number_of_Pages; ?></span></span>
						<a class='next-page <?php if ($Page >= $Number_Of_Pages) {echo "disabled";} ?>' title='Go to the next page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page+1;?>'>&rsaquo;</a>
						<a class='last-page <?php if ($Page == $Number_of_Pages) {echo "disabled";} ?>' title='Go to the last page' href='<?php echo $Current_Page_With_Order_By . "&Page=" . $Number_of_Pages; ?>'>&raquo;</a>
				</span>
		</div>
</div>

<table class="wp-list-table widefat fixed tags sorttable" cellspacing="0">
		<thead>
				<tr>
						<th scope='col' id='cb' class='manage-column column-cb check-column'  style="">
								<input type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style="">
										<?php if ($_GET['OrderBy'] == "SubCategory_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=SubCategory_Name&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=SubCategory_Name&Order=ASC'>";} ?>
											  <span>Name</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
						<th scope='col' id='parent-category' class='manage-column column-parent-category sortable desc'  style="">
									  <?php if ($_GET['OrderBy'] == "Category_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=Category_Name&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=Category_Name&Order=ASC'>";} ?>
											  <span>Parent Category</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
						<th scope='col' id='description' class='manage-column column-description sortable desc'  style="">
									  <?php if ($_GET['OrderBy'] == "SubCategory_Description" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=SubCategory_Description&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=SubCategory_Description&Order=ASC'>";} ?>
											  <span>Description</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
						<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
									  <?php if ($_GET['OrderBy'] == "SubCategory_Item_Count" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=SubCategory_Item_Count&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=SubCategory_Item_Count&Order=ASC'>";} ?>
											  <span>Products in Sub-Category</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
				</tr>
		</thead>

		<tfoot>
				<tr>
						<th scope='col' id='cb' class='manage-column column-cb check-column'  style="">
								<input type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style="">
										<?php if ($_GET['OrderBy'] == "SubCategory_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=SubCategory_Name&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=SubCategory_Name&Order=ASC'>";} ?>
											  <span>Name</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
						<th scope='col' id='parent-category' class='manage-column column-parent-category sortable desc'  style="">
									  <?php if ($_GET['OrderBy'] == "Category_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=Category_Name&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=Category_Name&Order=ASC'>";} ?>
											  <span>Parent Category</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
						<th scope='col' id='description' class='manage-column column-description sortable desc'  style="">
									  <?php if ($_GET['OrderBy'] == "SubCategory_Description" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=SubCategory_Description&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=SubCategory_Description&Order=ASC'>";} ?>
											  <span>Description</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
						<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
									  <?php if ($_GET['OrderBy'] == "SubCategory_Item_Count" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=SubCategory_Item_Count&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=SubCategories&OrderBy=SubCategory_Item_Count&Order=ASC'>";} ?>
											  <span>Products in Sub-Category</span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
				</tr>
		</tfoot>

	<tbody id="the-list" class='list:tag'>
		
		 <?php
				if ($myrows) { 
	  			  foreach ($myrows as $SubCategory) {
								echo "<tr id='Item" . $SubCategory->SubCategory_ID ."'>";
								echo "<th scope='row' class='check-column'>";
								echo "<input type='checkbox' name='Subs_Bulk[]' value='" . $SubCategory->SubCategory_ID ."' />";
								echo "</th>";
								echo "<td class='name column-name'>";
								echo "<strong>";
								echo "<a class='row-title' href='admin.php?page=UPCP-options&Action=SubCategory_Details&Selected=SubCategory&SubCategory_ID=" . $SubCategory->SubCategory_ID ."' title='Edit " . $SubCategory->SubCategory_Name . "'>" . $SubCategory->SubCategory_Name . "</a></strong>";
								echo "<br />";
								echo "<div class='row-actions'>";
								/*echo "<span class='edit'>";
								echo "<a href='admin.php?page=UPCP-options&Action=SubCategory_Details&Selected=SubCategory&SubCategory_ID=" . $SubCategory->SubCategory_ID ."'>Edit</a>";
		 						echo " | </span>";*/
								echo "<span class='delete'>";
								echo "<a class='delete-tag' href='admin.php?page=UPCP-options&Action=DeleteSubCategory&DisplayPage=SubCategories&SubCategory_ID=" . $SubCategory->SubCategory_ID ."'>Delete</a>";
		 						echo "</span>";
								echo "</div>";
								echo "<div class='hidden' id='inline_" . $SubCategory->SubCategory_ID ."'>";
								echo "<div class='name'>" . $SubCategory->SubCategory_Name . "</div>";
								echo "</div>";
								echo "</td>";
								echo "<td class='description column-parent-category'>" . $SubCategory->Category_Name . "</td>";
								echo "<td class='description column-description'>" . $SubCategory->SubCategory_Description . "</td>";
								echo "<td class='description column-items-count'>" . $SubCategory->SubCategory_Item_Count . "</td>";
								echo "</tr>";
						}
				}
		?>

	</tbody>
</table>

<div class="tablenav bottom">
		<div class="alignleft actions">
				<select name='action'>
  					<option value='-1' selected='selected'>Bulk Actions</option>
						<option value='delete'>Delete</option>
				</select>
				<input type="submit" name="" id="doaction" class="button-secondary action" value="Apply"  />
		</div>
		<div class='tablenav-pages <?php if ($Number_of_Pages == 1) {echo "one-page";} ?>'>
				<span class="displaying-num"><?php echo $wpdb->num_rows; ?> items</span>
				<span class='pagination-links'>
						<a class='first-page <?php if ($Page == 1) {echo "disabled";} ?>' title='Go to the first page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=1'>&laquo;</a>
						<a class='prev-page <?php if ($Page < 2) {echo "disabled";} ?>' title='Go to the previous page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page-1;?>'>&lsaquo;</a>
						<span class="paging-input"><?php echo $Page; ?> of <span class='total-pages'><?php echo $Number_of_Pages; ?></span></span>
						<a class='next-page <?php if ($Page >= $Number_Of_Pages) {echo "disabled";} ?>' title='Go to the next page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page+1;?>'>&rsaquo;</a>
						<a class='last-page <?php if ($Page == $Number_of_Pages) {echo "disabled";} ?>' title='Go to the last page' href='<?php echo $Current_Page_With_Order_By . "&Page=" . $Number_of_Pages; ?>'>&raquo;</a>
				</span>
		</div>
		<br class="clear" />
</div>
</form>

<br class="clear" />
</div>
</div>

<!-- Form to create a new sub-category -->
<div id="col-left">
<div class="col-wrap">

<div class="form-wrap">
<h3>Add a New Sub-Category</h3>
<form id="addsub" method="post" action="admin.php?page=UPCP-options&Action=AddSubCategory&DisplayPage=SubCategory" class="validate" enctype="multipart/form-data">
<input type="hidden" name="action" value="Add_SubCategory" />
<?php wp_nonce_field(); ?>
<?php wp_referer_field(); ?>
<div class="form-field form-required">
	<label for="SubCategory_Name">Name</label>
	<input name="SubCategory_Name" id="SubCategory_Name" type="text" value="" size="60" />
	<p>The name of the sub-category for your own purposes.</p>
</div>
<div class="form-field">
	<label for="Item_Category">Parent Category:</label>
	<select name="Category_ID" id="Item_Category">
	<option value=""></option>
	<?php $Categories = $wpdb->get_results("SELECT * FROM $categories_table_name"); ?>
	<?php foreach ($Categories as $Category) {
						echo "<option value='" . $Category->Category_ID . "'>" . $Category->Category_Name . "</option>";
				} ?>
	</select>
	<p>What category is this product in? Categories help to organize your product catalogues and help your customers to find what they're looking for.</p></td>
</div>
<div class="form-field">
	<label for="SubCategory_Description">Description</label>
	<textarea name="SubCategory_Description" id="SubCategory_Description" rows="5" cols="40"></textarea>
	<p>The description of the sub-category. What will it be used to display?</p>
</div>

<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Add New Sub-Category"  /></p></form></div>
<br class="clear" />
</div>
</div>


	<!--<form method="get" action=""><table style="display: none"><tbody id="inlineedit">
		<tr id="inline-edit" class="inline-edit-row" style="display: none"><td colspan="4" class="colspanchange">

			<fieldset><div class="inline-edit-col">
				<h4>Quick Edit</h4>

				<label>
					<span class="title">Name</span>
					<span class="input-text-wrap"><input type="text" name="name" class="ptitle" value="" /></span>
				</label>
					<label>
					<span class="title">Slug</span>
					<span class="input-text-wrap"><input type="text" name="slug" class="ptitle" value="" /></span>
				</label>
				</div></fieldset>
	
		<p class="inline-edit-save submit">
			<a accesskey="c" href="#inline-edit" title="Cancel" class="cancel button-secondary alignleft">Cancel</a>
						<a accesskey="s" href="#inline-edit" title="Update Level" class="save button-primary alignright">Update Level</a>
			<img class="waiting" style="display:none;" src="<?php echo ABSPATH . 'wp-admin/images/wpspin_light.gif'?>" alt="" />
			<span class="error" style="display:none;"></span>
			<input type="hidden" id="_inline_edit" name="_inline_edit" value="fb59c3f3d1" />			<input type="hidden" name="taxonomy" value="wmlevel" />
			<input type="hidden" name="post_type" value="post" />
			<br class="clear" />
		</p>
		</td></tr>
		</tbody></table></form>!-->
		
<!--</div>-->
		