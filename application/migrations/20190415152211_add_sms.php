<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_sms extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(array(
                        'sms_id' => array(
                                'type' => 'INT',
                                'constraint' => 5,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'statusCode' => array(
                                'type' => 'TINYINT',
                                'constraint' => '3',
                        ),
                        'cost' => array(
                            'type' => 'DOUBLE',
                            
                          
                        ),
                        'status' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '10',
                              
                        ),
                        'messageId' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '50',
                           
                    ),
                    'number' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '50',
                       
                ),
                ));
                $this->dbforge->add_key('sms_id', TRUE);
                $this->dbforge->create_table('sms');
        }

        public function down()
        {
                $this->dbforge->drop_table('sms');
        }
}