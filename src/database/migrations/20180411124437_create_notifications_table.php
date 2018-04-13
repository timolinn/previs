<?php


use Phinx\Migration\AbstractMigration;

class CreateNotificationsTable extends AbstractMigration
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
        $notifs = $this->table('notifications');


        $notifs->addColumn('user_id', 'integer')
                ->addColumn('message', 'string', ['limit' => 60])
                ->addColumn('description', 'text', ['null' => true])
                ->addColumn('link_url', 'string', ['null' => true])
                ->addColumn('event', 'string', ['null' => true])
                ->addTimeStamps()
                ->create();

        $notifs->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
                ->update();

    }
}
