<?php


use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        // creates new table
        $users = $this->table('users');

        // Add columns
        $users->addColumn('first_name', 'string', ['limit' => '60'])
              ->addColumn('last_name', 'string', ['limit' => '60'])
              ->addColumn('password', 'string', ['limit' => '100'])
              ->addColumn('user_name', 'string', ['limit' => '60'])
              ->addColumn('email', 'string', ['limit' => '100'])
              ->addColumn('phone_number', 'string', ['limit' => '22'])
              ->addColumn('isBanned', 'integer', ['limit' => MysqlAdapter::INT_TINY, 'default' => 0])
              ->addColumn('role_id', 'integer')
              ->addColumn('recurrent_order_id', 'integer')
              ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
              ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
              ->addIndex(['user_name', 'email'], ['unique' => true])
              ->create();

    }
}
