<?php
/*
 * This file is part of the Ekino Wordpress package.
 *
 * (c) 2013 Ekino
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mukadi\WordpressBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User.
 *
 * This is the User entity
 *
 * @author Vincent Composieux <composieux@ekino.com>
 */
abstract class User implements UserInterface, WordpressEntityInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $login;

    /**
     * @var string
     */
    protected $pass;

    /**
     * @var string
     */
    protected $nicename;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var \DateTime
     */
    protected $registered;

    /**
     * @var string
     */
    protected $activationKey;

    /**
     * @var int
     */
    protected $status;

    /**
     * @var string
     */
    protected $displayName;


    /**
     * @var array
     */
    protected $roles;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $activationKey
     *
     * @return User
     */
    public function setActivationKey($activationKey)
    {
        $this->activationKey = $activationKey;

        return $this;
    }

    /**
     * @return string
     */
    public function getActivationKey()
    {
        return $this->activationKey;
    }

    /**
     * @param string $displayName
     *
     * @return User
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $nicename
     *
     * @return User
     */
    public function setNicename($nicename)
    {
        $this->nicename = $nicename;

        return $this;
    }

    /**
     * @return string
     */
    public function getNicename()
    {
        return $this->nicename;
    }

    /**
     * @param string $pass
     *
     * @return User
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param \DateTime $registered
     *
     * @return User
     */
    public function setRegistered($registered)
    {
        $this->registered = $registered;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRegistered()
    {
        return $this->registered;
    }

    /**
     * @param int $status
     *
     * @return User
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $url
     *
     * @return User
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }


    /**
     * Sets user roles.
     *
     * @param array|string $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        if (!is_array($roles)) {
            $roles = [$roles];
        }

        $this->roles = $roles;

        return $this;
    }

    /**
     * Sets Wordpress user roles by prefixing them.
     *
     * @param array  $roles  An array of roles
     * @param string $prefix A role prefix
     *
     * @return User
     */
    public function setWordpressRoles(array $roles, $prefix = 'ROLE_WP_')
    {
        foreach ($roles as $key => $role) {
            $roles[$key] = $prefix.strtoupper($role);
        }

        $this->setRoles($roles);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return $this->roles ? $this->roles : [];
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->getPass();
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->getLogin();
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->getUsername();
    }
}
