<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_order_items_table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'order_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'product_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'qty' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('order_items');
        $this->db->query('ALTER TABLE order_items ADD CONSTRAINT fk_order FOREIGN KEY (order_id) REFERENCES orders(id)');
        $this->db->query('ALTER TABLE order_items ADD CONSTRAINT fk_product_order FOREIGN KEY (product_id) REFERENCES products(id)');
    }

    public function down()
    {
        $this->dbforge->drop_table('order_items');
    }
}
