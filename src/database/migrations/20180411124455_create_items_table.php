<?php


use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CreateItemsTable extends AbstractMigration
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
        $items = $this->table('items');

        $items->addColumn('item_name', 'string', ['limit' => 255])
                ->addColumn('number_in_stock', 'integer')
                ->addColumn('item_category', 'string', ['null' => true])
                ->addColumn('item_price', 'string')
                ->addColumn('description', 'text', ['null' => true])
                ->addColumn('image_path', 'string', ['null' => true])
                ->addColumn('isAvaliable', 'integer', ['limit' => MysqlAdapter::INT_TINY])
                ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
                ->create();

    }
}
