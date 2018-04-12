<?php


use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateOrdersTable extends AbstractMigration
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
        $orders = $this->table('orders');

        $orders->addColumn('cart_id', 'integer')
               ->addColumn('user_id', 'integer')
               ->addColumn('isActive', 'integer', ['limit' => MysqlAdapter::INT_TINY, 'default' => 1])
               ->addColumn('delivered', 'integer', ['limit' => MysqlAdapter::INT_TINY, 'default' => 0])
               ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
               ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
               ->create();

        $orders->addForeignKey('user_id', 'users', 'id', ['delete'=> 'SET_NULL', 'update'=> 'NO_ACTION'])
               ->update();

    }
}