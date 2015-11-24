<?php
namespace App\Model\Table;

use App\Model\Entity\SentMessage;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SentMessages Model
 *
 */
class SentMessagesTable extends Table
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

        $this->table('sent_messages');
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

        $validator->requirePresence('phonenumber')
            ->notEmpty('phonenumber', 'Please fill in this field')
            ->add('phonenumber', [
                'countryCode' => [
                    'rule' => function ($value, $context) {
                        $pregResult = preg_match('/^\+/', $value);
                        return !($pregResult === false || $pregResult === 0);
                    },
                    'message' => 'Phone number must include the country code. e.g. +447778882662'
                ]
            ]);

        $validator->requirePresence('message')
            ->notEmpty('message', 'Please fill in this field');

        $validator
            ->allowEmpty('status');

        $validator
            ->add('datesent', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('datesent');

        return $validator;
    }
}
