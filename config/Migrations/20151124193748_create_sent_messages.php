<?php
use Migrations\AbstractMigration;

class CreateSentMessages extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('sent_messages');
        $table->addColumn('phonenumber', 'string', [
            'default' => null,
            'limit' => 25,
            'null' => false,
        ]);

        $table->addColumn('message', 'string', [
            'default' => null,
            'limit' => 160,
            'null' => false,
        ]);

        $table->addColumn('status', 'string', [
            'default' => 'queued',
            'limit' => 255,
            'null' => false,
        ]);

        $table->addColumn('datesent', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP'
        ]);
        $table->create();
    }
}
