<?php

namespace Omniship\Traits;

use Omniship\Exceptions\InvalidArgumentException;
use Omniship\Helper\Helper;
use Omniship\Interfaces\ArrayableInterface;
use Symfony\Component\HttpFoundation\ParameterBag;

trait Parameters
{
    /**
     * @var \Symfony\Component\HttpFoundation\ParameterBag
     */
    protected $parameters;

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
     * Initialize this item with the specified parameters
     *
     * @param array|null $parameters An array of parameters to set on this object
     * @return $this Item
     */
    public function initialize(array $parameters = null)
    {
        $this->parameters = new ParameterBag();
        Helper::initialize($this, $parameters);
        return $this;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters->all();
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getParameter($key)
    {
        return $this->parameters->get($key);
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function setParameter($key, $value)
    {
        $this->parameters->set($key, $value);
        return $this;
    }

    /**
     * Check object is empty
     * @return bool
     */
    public function isEmpty()
    {
        return $this->parameters->count() < 1;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $array = [];
        foreach ($this->parameters->all() as $key => $value) {
            if ($value instanceof ArrayableInterface) {
                $array[$key] = $value->toArray();
            } else {
                $array[$key] = $value;
            }
        }
        return $array;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * @param $code
     * @throws InvalidArgumentException
     */
    protected function invalidArguments($code)
    {
        if (defined('static::INVALID_ARGUMENTS') && empty(static::INVALID_ARGUMENTS[$code])) {
            $backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2);
            if (!empty($backtrace[1]['function'])) {
                $message = 'Invalid arguments for method ' . get_class($this) . '::' . $backtrace[1]['function'];
            } else {
                $message = 'Invalid arguments for method';
            }
        } else {
            $message = static::INVALID_ARGUMENTS[$code];
        }
        throw new InvalidArgumentException($message, $code);
    }
}