<?php
namespace App\Model\Table;

use App\Model\Entity\ReceivedMessage;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReceivedMessages Model
 *
 */
class ReceivedMessagesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('received_messages');
        $this->displayField('id');
        $this->primaryKey('id');

    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('phonenumber');

        $validator
            ->allowEmpty('message');

        $validator
            ->allowEmpty('status');

        $validator
            ->add('datereceived', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('datereceived');

        return $validator;
    }
}
