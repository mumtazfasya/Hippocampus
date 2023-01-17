<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_section extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_section' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_section' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'desc_section' => array(
                'type' => 'TEXT'
            ),
            'id_course' => array(
                'type' => 'INT',
                'constraint' => 5,
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ));
        $this->dbforge->add_key('id_section', TRUE);
        $this->dbforge->create_table('tb_section');
    }

    public function down()
    {
        $this->dbforge->drop_table('tb_section');
    }
}
