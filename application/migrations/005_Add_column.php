<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_column extends	CI_Migration {
	
	function up() 
	{	
		if ( $this->db->table_exists('articles'))
		{
			$fields = array(
        'sub_categories_id' => array('type' => 'INT', 'null' => FALSE)
			);
			
			$this->dbforge->add_column('articles', $fields);
		}
	}
	function down() 
	{
		$this->dbforge->drop_table('sub_categories');
	}
}
