<?php
/**
 * Shipping Item
 */
namespace Omniship\Common;

use Omniship\Interfaces\ArrayableInterface;
use Omniship\Interfaces\ItemInterface;
use Omniship\Interfaces\JsonableInterface;
use Omniship\Traits\Parameters;

/**
 * Shipping Item
 *
 * This class defines a single cart item in the Omniship system.
 *
 * @see ItemInterface
 */
class Item implements ItemInterface, ArrayableInterface, \JsonSerializable, JsonableInterface
{
    use Parameters;

    /**
     * Get item id
     */
    public function getId()
    {
        return $this->getParameter('id');
    }

    /**
     * Set item id
     * @param $value
     * @return $this
     */
    public function setId($value)
    {
        return $this->setParameter('id', $value);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->getParameter('name');
    }

    /**
     * Set the item name
     * @param $value
     * @return $this
     */
    public function setName($value)
    {
        return $this->setParameter('name', $value);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {
        return $this->getParameter('description');
    }

    /**
     * Set the item description
     * @param $value
     * @return $this
     */
    public function setDescription($value)
    {
        return $this->setParameter('description', $value);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getQuantity()
    {
        return $this->getParameter('quantity');
    }

    /**
     * Set the item quantity
     * @param $value
     * @return $this
     */
    public function setQuantity($value)
    {
        return $this->setParameter('quantity', $value);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getPrice()
    {
        return $this->getParameter('price');
    }

    /**
     * Set the item price
     * @param $value
     * @return $this
     */
    public function setPrice($value)
    {
        return $this->setParameter('price', $value);
    }
    
    /**
     * Get item height
     */
    public function getHeight()
    {
        return $this->getParameter('height');
    }

    /**
     * Set item height
     * @param $value
     * @return $this
     */
    public function setHeight($value)
    {
        return $this->setParameter('height', $value);
    }

    /**
     * Get item depth
     */
    public function getDepth()
    {
        return $this->getParameter('depth');
    }

    /**
     * Set item depth
     * @param $value
     * @return $this
     */
    public function setDepth($value)
    {
        return $this->setParameter('depth', $value);
    }

    /**
     * Get item width
     */
    public function getWidth()
    {
        return $this->getParameter('width');
    }

    /**
     * Set item width
     * @param $value
     * @return $this
     */
    public function setWidth($value)
    {
        return $this->setParameter('width', $value);
    }

    /**
     * Get item weight
     */
    public function getWeight()
    {
        return $this->getParameter('weight');
    }

    /**
     * Set item weight
     * @param $value
     * @return $this
     */
    public function setWeight($value)
    {
        return $this->setParameter('weight', $value);
    }
}
