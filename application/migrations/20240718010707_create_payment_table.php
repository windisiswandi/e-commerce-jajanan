<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_payment_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'order_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'bank_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'no_rekening' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
            ),
            'foto' => array(
                'type' => 'TEXT',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('payments');
        $this->db->query('ALTER TABLE payments ADD CONSTRAINT fk_user_payment FOREIGN KEY (user_id) REFERENCES users(id)');
        $this->db->query('ALTER TABLE payments ADD CONSTRAINT fk_order_payment FOREIGN KEY (order_id) REFERENCES orders(id)');
    }

    public function down()
    {
        $this->dbforge->drop_table('payments');
    }
}
