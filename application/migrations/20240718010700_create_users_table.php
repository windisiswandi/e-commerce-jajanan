<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_users_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '255',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'role' => array(
                'type' => 'VARCHAR',
                'constraint' => '6',
            ),
            'created_at' => array(
                'type' => 'TIMESTAMP',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
        // Set default value for created_at using a manual SQL query
        $sql = "ALTER TABLE users MODIFY created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP";
        $this->db->query($sql);
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}
