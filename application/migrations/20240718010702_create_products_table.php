<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_products_table extends CI_Migration {

    public function up()
    {
         $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'category_id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'product_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
             'stock' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'product_price' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'product_modal' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
            ),
            'description' => array(
                'type' => 'TEXT',
            ),
            'foto' => array(
                'type' => 'TEXT',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('products');
        $this->db->query('ALTER TABLE products ADD CONSTRAINT fk_category FOREIGN KEY (category_id) REFERENCES categories(id)');
    }

    public function down()
    {
        $this->dbforge->drop_table('products');
    }
}
