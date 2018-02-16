<?php


use Phinx\Migration\AbstractMigration;

class AddUsersTable extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('user_login','string',['default' => '','limit' => 60])
        ->addColumn('user_pass','string',['default' => '','limit' => 255])
        ->addColumn('user_nicename','string',['default' => '','limit' => 50])
        ->addColumn('user_email','string',['default' => '','limit' => 100])
        ->addColumn('user_url','string',['default' => '','limit' => 100])
        ->addColumn('user_registered','datetime',['default' => '0000-00-00 00:00:00'])
        ->addColumn('user_status','integer',['default' => '0','limit' => 11])
        ->addColumn('display_name','string',['default' => '','limit' => 250])
        ->addIndex(['user_login'], ['name' => 'user_login_key'])
        ->addIndex(['user_nicename'])
        ->addIndex(['user_email'])
        ->create();
    }
}
