<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Station Entity
 *
 * @property int $id
 * @property string $Name
 * @property int $Adresse_id
 *
 * @property \App\Model\Entity\Adresse $adresse
 */
class Station extends Entity
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
        'Name' => true,
        'Adresse_id' => true,
        'adresse' => true,
    ];
}
