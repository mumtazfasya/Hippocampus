<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_role extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_role' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_role' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ));
        $this->dbforge->add_key('id_role', TRUE);
        $this->dbforge->create_table('tb_role');
    }

    public function down()
    {
        $this->dbforge->drop_table('tb_role');
    }
}
