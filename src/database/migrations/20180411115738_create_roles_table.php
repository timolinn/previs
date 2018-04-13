<?php


use Phinx\Migration\AbstractMigration;

class CreateRolesTable extends AbstractMigration
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
    public function up()
    {
        $exists = $this->hasTable('roles');
        if ($exists) {
            $this->dropTable('roles');
        }

        $roles = $this->table('roles');

        $roles->addColumn('title', 'string')
                ->addColumn('permissions', 'json', ['null' => true])
                ->addTimeStamps()
                ->create();

        $users = $this->table('users');

        $users->addForeignKey('role_id', 'roles', 'id', ['delete' => 'NO_ACTION', 'update' => 'NO_ACTION'])
                ->update();
    }

    public function down()
    {
        $this->execute('SET FOREIGN_KEY_CHECKS=0');
        $exists = $this->hasTable('roles');
        if ($exists) {
            $this->dropTable('roles');

        }
        $this->execute('SET FOREIGN_KEY_CHECKS=1');
    }
}
