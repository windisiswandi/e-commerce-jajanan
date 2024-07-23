<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_carts_table extends CI_Migration {

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
        $this->dbforge->create_table('carts');
        $this->db->query('ALTER TABLE carts ADD CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES users(id)');
        $this->db->query('ALTER TABLE carts ADD CONSTRAINT fk_product FOREIGN KEY (product_id) REFERENCES products(id)');
    }

    public function down()
    {
        $this->dbforge->drop_table('carts');
    }
}
