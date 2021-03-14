<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PersonHasFahrrad Entity
 *
 * @property int $Person_id
 * @property int $Fahrrad_id
 * @property int $id
 * @property int $Zahlungsmoeglichkeiten_id
 * @property int $Start_Station
 * @property int|null $End_Station
 * @property \Cake\I18n\FrozenTime $StartZeit
 * @property \Cake\I18n\FrozenTime $EndZeit
 *
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\Fahrrad $fahrrad
 * @property \App\Model\Entity\Zahlungsmoeglichkeiten $zahlungsmoeglichkeiten
 */
class PersonHasFahrrad extends Entity
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
        'Person_id' => true,
        'Fahrrad_id' => true,
        'Zahlungsmoeglichkeiten_id' => true,
        'Start_Station' => true,
        'End_Station' => true,
        'StartZeit' => true,
        'EndZeit' => true,
        'person' => true,
        'fahrrad' => true,
        'zahlungsmoeglichkeiten' => true,
    ];
}
