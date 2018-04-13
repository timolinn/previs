<?php


use Phinx\Migration\AbstractMigration;

class CreateCartsTable extends AbstractMigration
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
        $exists = $this->hasTable('carts');
        if ($exists) {
            $this->dropTable('carts');
        }

        $carts = $this->table('carts');

        $carts->addColumn('user_id', 'integer')
                ->addColumn('cart', 'json')
                ->addTimeStamps()
                ->create();

        $carts->addForeignKey('user_id', 'users', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
               ->update();

        $orders = $this->table('orders');
        $orders->addForeignKey('cart_id', 'carts', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
                ->update();
    }
}
