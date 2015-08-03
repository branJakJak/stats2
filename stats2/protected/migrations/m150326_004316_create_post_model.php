<?php

class m150326_004316_create_post_model extends CDbMigration
{
	public function up()
	{
		$this->createTable("post",array(
				"post_id"=>"pk",
				"title"=>"string",
				"description"=>"text",
				"date_created"=>"datetime",
				"date_updated"=>"datetime",
			));
	}

	public function down()
	{
		$this->dropTable("post");
	}

}