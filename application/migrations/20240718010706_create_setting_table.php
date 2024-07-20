<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_setting_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'wa_commpany' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'sosmed_company' => array(
                'type' => 'TEXT',
            ),
            'address_company' => array(
                'type' => 'TEXT',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('setting');
    }

    public function down()
    {
        $this->dbforge->drop_table('setting');
    }
}
