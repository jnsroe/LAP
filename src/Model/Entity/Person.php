<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string $Name
 * @property \Cake\I18n\FrozenDate $Birth
 * @property int $Adresse_id
 * @property string $email
 * @property int $Titel_id
 * @property int $Anrede_id
 * @property string $password
 *
 * @property \App\Model\Entity\Adresse $adresse
 * @property \App\Model\Entity\Titel $titel
 * @property \App\Model\Entity\Anrede $anrede
 */
class Person extends Entity
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
        'Birth' => true,
        'Adresse_id' => true,
        'email' => true,
        'Titel_id' => true,
        'Anrede_id' => true,
        'password' => true,
        'adresse' => true,
        'titel' => true,
        'anrede' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
