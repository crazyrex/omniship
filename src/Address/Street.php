<?php

namespace Omniship\Address;

use Omniship\Interfaces\ArrayableInterface;
use Omniship\Interfaces\ComponentInterface;
use Omniship\Interfaces\JsonableInterface;
use Omniship\Traits\Parameters;
use Omniship\Traits\ArrayAccess AS TraitArrayAccess;

class Street implements ComponentInterface, ArrayableInterface, \JsonSerializable, JsonableInterface, \ArrayAccess
{

    use Parameters, TraitArrayAccess;

    /**
     * Create a new item with the specified parameters
     *
     * @param array|null $parameters An array of parameters to set on the new object
     */
    public function __construct(array $parameters = null)
    {
        $this->initialize($parameters);
    }

    /**
     * Get street id
     */
    public function getId()
    {
        return $this->getParameter('id');
    }

    /**
     * Set street id
     * @param $value
     * @return $this
     */
    public function setId($value)
    {
        return $this->setParameter('id', $value);
    }

    /**
     * Get street name
     */
    public function getName()
    {
        return $this->getParameter('name');
    }

    /**
     * Set street name
     * @param $value
     * @return $this
     */
    public function setName($value)
    {
        return $this->setParameter('name', $value);
    }
}
