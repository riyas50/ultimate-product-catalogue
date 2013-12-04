<?php
function UpdateTables() {
		global $wpdb;
		global $categories_table_name, $subcategories_table_name, $items_table_name, $item_images_table_name, $tagged_items_table_name, $tags_table_name, $catalogues_table_name, $catalogue_items_table_name;
		
		/* Update the categories table */  
   	$sql = "CREATE TABLE $categories_table_name (
  	Category_ID mediumint(9) NOT NULL AUTO_INCREMENT,
  	Category_Name text DEFAULT '' NOT NULL,
		Category_Description text DEFAULT '' NOT NULL,
		Category_Item_Count mediumint(9) DEFAULT '0',
		Category_Date_Created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  	UNIQUE KEY id (Category_ID)
    )
		DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
   	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   	dbDelta($sql);
		
		/* Update the sub-categories table */
		$sql = "CREATE TABLE $subcategories_table_name (
  	SubCategory_ID mediumint(9) NOT NULL AUTO_INCREMENT,
		Category_ID mediumint(9) DEFAULT '0' NOT NULL,
		Category_Name text DEFAULT '' NOT NULL,
  	SubCategory_Name text DEFAULT '' NOT NULL,
		SubCategory_Description text DEFAULT '' NOT NULL,
		SubCategory_Item_Count mediumint(9) DEFAULT '0' NOT NULL,
		SubCategory_Date_Created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  	UNIQUE KEY id (SubCategory_ID)
    )	
		DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
   	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   	dbDelta($sql);
		
		/* Update the items(products) table */
		$sql = "CREATE TABLE $items_table_name (
  	Item_ID mediumint(9) NOT NULL AUTO_INCREMENT,
  	Item_Name text DEFAULT '' DEFAULT '' NOT NULL,
		Item_Slug text DEFAULT '' NOT NULL,
  	Item_Description text DEFAULT '',
		Item_Price text DEFAULT '' NOT NULL,
		Item_Link text DEFAULT '',
		Item_Photo_URL text DEFAULT '',
		Category_ID mediumint(9) DEFAULT '0',
		Category_Name text DEFAULT '',
		Global_Item_ID mediumint(9) DEFAULT '0',
		Item_Special_Attr text DEFAULT '',
		SubCategory_ID mediumint(9) DEFAULT '0',
		SubCategory_Name text DEFAULT '',
		Item_Date_Created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		Item_Views mediumint(9) DEFAULT '0',
  	UNIQUE KEY id (Item_ID)
    )
		DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
   	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   	dbDelta($sql);
		
		/* Update the table that stores links to additional images for products */
		$sql = "CREATE TABLE $item_images_table_name (
  	Item_Image_ID mediumint(9) NOT NULL AUTO_INCREMENT,
  	Item_ID mediumint(9) DEFAULT '0' NOT NULL,
  	Item_Image_URL text DEFAULT '',
		Item_Image_Description text DEFAULT '',
  	UNIQUE KEY id (Item_Image_ID)
    )
		DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
   	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   	dbDelta($sql);
		
		/* Update the tags table */
		$sql = "CREATE TABLE $tags_table_name (
  	Tag_ID mediumint(9) NOT NULL AUTO_INCREMENT,
  	Tag_Name text DEFAULT '' NOT NULL,
		Tag_Description text DEFAULT '' NOT NULL,
		Tag_Item_Count text DEFAULT '' NOT NULL,
		Tag_Date_Created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  	UNIQUE KEY id (Tag_ID)
    )
		DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
   	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   	dbDelta($sql);
		
		/* Update the table detemines which products have what tags */
		$sql = "CREATE TABLE $tagged_items_table_name (
  	Tagged_Item_ID mediumint(9) NOT NULL AUTO_INCREMENT,
  	Tag_ID mediumint(9) DEFAULT '0' NOT NULL,
		Item_ID mediumint(9) DEFAULT '0' NOT NULL,
  	UNIQUE KEY id (Tagged_Item_ID)
    )
		DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
   	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   	dbDelta($sql);
		
		/* Update the catalogues table */
		$sql = "CREATE TABLE $catalogues_table_name (
  	Catalogue_ID mediumint(9) NOT NULL AUTO_INCREMENT,
  	Catalogue_Name text DEFAULT '' NOT NULL,
		Catalogue_Description text DEFAULT '' NOT NULL,
		Catalogue_Layout_Format text DEFAULT '' NOT NULL,
		Catalogue_Custom_CSS text DEFAULT '' NOT NULL,
		Catalogue_Item_Count mediumint(9) DEFAULT '0' NOT NULL,
		Catalogue_Date_Created datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  	UNIQUE KEY id (Catalogue_ID)
    )
		DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
   	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   	dbDelta($sql);
		
		/* Update the table that determines what items are in each catalogue */
		$sql = "CREATE TABLE $catalogue_items_table_name (
  	Catalogue_Item_ID mediumint(9) NOT NULL AUTO_INCREMENT,
  	Catalogue_ID mediumint(9) DEFAULT '0',
  	Item_ID mediumint(9) DEFAULT '0',
		Category_ID mediumint(9) DEFAULT '0',
		SubCategory_ID mediumint(9) DEFAULT '0',
		Position mediumint(9) DEFAULT '0' NOT NULL,
  	UNIQUE KEY id (Catalogue_Item_ID)
    )
		DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";
   	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
   	dbDelta($sql);
		update_option('UPCP_First_Install_Version', 2);
}
?>