<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_User_Table extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field([
			'id' => [
				'type'              => 'INT',
				'constraint'        => 5,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],
			'ip_address' => [
				'type'       => 'VARCHAR',
				'constraint' => '45'
			],
			'username' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
			'password' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'email' => [
				'type'       => 'VARCHAR',
				'constraint' => '254',
				'unique' => TRUE
			],
			'activation_selector' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => TRUE,
				'unique' => TRUE
			],
			'activation_code' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => TRUE
			],
			'forgotten_password_selector' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => TRUE,
				'unique' => TRUE
			],
			'forgotten_password_code' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => TRUE
			],
			'forgotten_password_time' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => TRUE,
				'null'       => TRUE
			],
			'remember_selector' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => TRUE,
                'unique' => TRUE
			],
			'remember_code' => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
				'null'       => TRUE
			],
			'created_on' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => TRUE,
			],
			'last_login' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => TRUE,
				'null'       => TRUE
			],
			'active' => [
				'type'       => 'TINYINT',
				'constraint' => '1',
				'unsigned'   => TRUE,
				'null'       => TRUE
			],
			'first_name' => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null'       => TRUE
			],
			'last_name' => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
				'null'       => TRUE
			],
			'company' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'       => TRUE
			],
			'phone' => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
				'null'       => TRUE
			]
		]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');

        $this->seeds();
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }

    private function seeds()
    {
		$data = [
            [
                'ip_address'              => '127.0.0.1',
                'username'                => 'root',
                'password'                => '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa',
                'email'                   => 'root@test.id',
                'activation_code'         => '',
                'forgotten_password_code' => NULL,
                'created_on'              => '1268889823',
                'last_login'              => '1268889823',
                'active'                  => '1',
                'first_name'              => 'Root',
                'last_name'               => 'User',
                'company'                 => 'BAKODE',
                'phone'                   => '0',
            ]
        ];

		$this->db->insert_batch('users', $data);
    }

}