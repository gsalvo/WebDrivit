<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Alternative Entity.
 *
 * @property int $id
 * @property string $alternative
 * @property bool $correct
 * @property int $question_id
 * @property \App\Model\Entity\Question $question
 */
class Alternative extends Entity
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
        'id' => true,
        'question_id' => true,
    ];
}
