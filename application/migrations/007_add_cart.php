<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_cart extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_cart' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'kode_cart' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'id_user' => array(
                'type' => 'INT',
                'constraint' => 5,
            ),
            'id_course' => array(
                'type' => 'INT',
                'constraint' => 5,
            ),
            'status_cart' => array(
                'type' => 'VARCHAR',
                'constraint' => 20,
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ));
        $this->dbforge->add_key('id_cart', TRUE);
        $this->dbforge->create_table('tb_cart');
    }

    public function down()
    {
        $this->dbforge->drop_table('tb_cart');
    }
}
