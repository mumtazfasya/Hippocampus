<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_user extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'id_user' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'firstname_user' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'lastname_user' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'email_user' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'password_user' => array(
                'type' => 'VARCHAR',
                'constraint' => '50'
            ),
            'foto_user' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => '-'
            ),
            'bio_user' => array(
                'type' => 'TEXT'
            ),
            'id_role' => array(
                'type' => 'INT',
                'constraint' => '5'
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ));
        $this->dbforge->add_key('id_user', TRUE);
        $this->dbforge->create_table('tb_user');
    }

    public function down()
    {
        $this->dbforge->drop_table('tb_user');
    }
}
