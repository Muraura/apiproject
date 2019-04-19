<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_place extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'place_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'id' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ),
                        'name' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                               
                        ),
                        'lat' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        
                        ),
                        'lng' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '50',
                        ),
                        
                ));
                $this->dbforge->add_key('place_id', TRUE);
                $this->dbforge->create_table('place');
        }

        public function down()
        {
                $this->dbforge->drop_table('place');
        }
}
