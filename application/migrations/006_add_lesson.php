<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_lesson extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_lesson' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_lesson' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'desc_lesson' => array(
                'type' => 'TEXT'
            ),
            'type_lesson' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'attr_lesson' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'id_section' => array(
                'type' => 'INT',
                'constraint' => 5,
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ));
        $this->dbforge->add_key('id_lesson', TRUE);
        $this->dbforge->create_table('tb_lesson');
    }

    public function down()
    {
        $this->dbforge->drop_table('tb_lesson');
    }
}
