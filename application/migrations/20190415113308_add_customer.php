<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_customer extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'customer_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'customer_name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'customer_phone' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '20',
                                'null' => TRUE,
                        ),
                ));
                $this->dbforge->add_key('customer_id', TRUE);
                $this->dbforge->create_table('customer');
        }

        public function down()
        {
                $this->dbforge->drop_table('customer');
        }
}