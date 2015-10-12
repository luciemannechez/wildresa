<?php

namespace Wcs\UsersBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * Users
 */
class Users extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}

