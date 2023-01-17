<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_course extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_course' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_course' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'desc_course' => array(
                'type' => 'TEXT'
            ),
            'harga_course' => array(
                'type' => 'FLOAT',
                'constraint' => '50',
            ),
            'thumb_course' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => 'def-course-thumb.png'
            ),
            'id_category' => array(
                'type' => 'INT',
                'constraint' => '5'
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ));
        $this->dbforge->add_key('id_course', TRUE);
        $this->dbforge->create_table('tb_course');
    }

    public function down()
    {
        $this->dbforge->drop_table('tb_course');
    }
}
