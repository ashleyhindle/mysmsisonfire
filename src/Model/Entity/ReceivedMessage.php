<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReceivedMessage Entity.
 *
 * @property int $id
 * @property string $phonenumber
 * @property string $message
 * @property string $status
 * @property \Cake\I18n\Time $datereceived
 */
class ReceivedMessage extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
