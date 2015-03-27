<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_categories extends	CI_Migration {
	
	function up() 
	{	
		if ( ! $this->db->table_exists('categories'))
		{
			// Setup Keys
			$this->dbforge->add_key('id', TRUE);
			
			$this->dbforge->add_field(array(
				'id' => array('type' => 'INT', 'constraint' => 5, 'unsigned' => TRUE, 'auto_increment' => TRUE),
				'title' => array('type' => 'VARCHAR', 'constraint' => '200', 'null' => FALSE)
			));
			
			$this->dbforge->add_field("Created_At TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
			$this->dbforge->create_table('categories', TRUE);
		}
	}

	function down() 
	{
		$this->dbforge->drop_table('categories');
	}
}
