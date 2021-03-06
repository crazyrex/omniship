<?php
/**
 * Created by PhpStorm.
 * User: joro
 * Date: 10.5.2017 г.
 * Time: 18:16 ч.
 */

namespace Omniship\Common;

use Carbon\Carbon;
use Omniship\Interfaces\ArrayableInterface;
use Omniship\Interfaces\JsonableInterface;
use Omniship\Interfaces\TrackingInterface;
use Omniship\Traits\Parameters;

/**
 * Shipping Quote
 *
 * This class defines a single quote in the Omniship system.
 *
 * @see TrackingInterface
 */
class Tracking implements TrackingInterface, ArrayableInterface, \JsonSerializable, JsonableInterface
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
    public function getOriginServiceArea()
    {
        return $this->getParameter('origin_service_area');
    }

    /**
     * Set the item name
     * @param $value
     * @return $this
     */
    public function setOriginServiceArea($value)
    {
        return $this->setParameter('origin_service_area', $value);
    }

    /**
     * {@inheritDoc}
     */
    public function getDestinationServiceArea()
    {
        return $this->getParameter('destination_service_area');
    }

    /**
     * Set the item name
     * @param $value
     * @return $this
     */
    public function setDestinationServiceArea($value)
    {
        return $this->setParameter('destination_service_area', $value);
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
     * @return Carbon|null
     */
    public function getShipmentDate()
    {
        return $this->getParameter('shipment_date');
    }

    /**
     * @param  Carbon|null $value
     * @return $this
     */
    public function setShipmentDate(Carbon $value = null)
    {
        return $this->setParameter('shipment_date', $value);
    }

    /**
     * @return Carbon|null
     */
    public function getEstimatedDeliveryDate()
    {
        return $this->getParameter('estimated_delivery_date');
    }

    /**
     * @param  Carbon|null $value
     * @return $this
     */
    public function setEstimatedDeliveryDate(Carbon $value = null)
    {
        return $this->setParameter('estimated_delivery_date', $value);
    }

    /**
     * @return EventBag|null
     */
    public function getEvents()
    {
        return $this->getParameter('events');
    }

    /**
     * @param  EventBag $value
     * @return $this
     */
    public function setEvents(EventBag $value = null)
    {
        return $this->setParameter('events', $value);
    }

    /**
     * @return string|null
     */
    public function getError()
    {
        return $this->getParameter('error');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setError($value)
    {
        return $this->setParameter('error', $value);
    }

    /**
     * @return string|null
     */
    public function getErrorCode()
    {
        return $this->getParameter('error_code');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setErrorCode($value)
    {
        return $this->setParameter('error_code', $value);
    }

}