<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_orders_table extends CI_Migration {

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
            'order_date' => array(
                'type' => 'DATETIME',
            ),
            'total_amount' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'payment_method' => array(
                'type' => 'ENUM("transfer","COD")',
            ),
            'order_status' => array(
                'type' => 'ENUM("pending","confirmed","shipped","delivered","cancelled")',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('orders');
        $this->db->query('ALTER TABLE orders ADD CONSTRAINT fk_order_user FOREIGN KEY (user_id) REFERENCES users(id)');
    }

    public function down()
    {
        $this->dbforge->drop_table('orders');
    }
}
