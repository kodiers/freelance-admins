<?php
/**
 * Created by PhpStorm.
 * User: kodiers
 * Date: 26/02/16
 * Time: 03:43
 */

namespace Techforline\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * TODO: update database (schema:update doesn't work)
     * @ORM\OneToMany(targetEntity="Techforline\MainBundle\Entity\Orders", mappedBy="customer")
     */
    protected $orders;

    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->orders = new ArrayCollection();
    }
}