<?php
/**
 * Abstract Response
 */
namespace Omniship\Message;

use Omniship\Interfaces\RequestInterface;
use Omniship\Interfaces\ResponseInterface;
use Symfony\Component\Translation\Loader\PhpFileLoader;

/**
 * Abstract Response
 *
 * This abstract class implements ResponseInterface and defines a basic
 * set of functions that all Omniship Requests are intended to include.
 *
 * Objects of this class or a subclass are usually created in the Request
 * object (subclass of AbstractRequest) as the return parameters from the
 * send() function.
 *
 * Example -- validating and sending a request:
 *
 * <code>
 *   $myResponse = $myRequest->send();
 *   // now do something with the $myResponse object, test for success, etc.
 * </code>
 *
 * @see ResponseInterface
 */
abstract class AbstractResponse implements ResponseInterface
{
    /**
     * The embodied request object.
     *
     * @var RequestInterface
     */
    protected $request;
    /**
     * The data contained in the response.
     *
     * @var mixed
     */
    protected $data;

    /**
     * @var PhpFileLoader
     */
    protected $locale;

    /**
     * Constructor
     *
     * @param RequestInterface $request the initiating request.
     * @param mixed $data
     */
    public function __construct(RequestInterface $request, $data)
    {
        $this->request = $request;
        $this->data = $data;
    }
    /**
     * Get the initiating request object.
     *
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }
    /**
     * Get the response data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
    /**
     * Response Message
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        return null;
    }
    /**
     * Response code
     *
     * @return null|string A response code from the payment gateway
     */
    public function getCode()
    {
        return null;
    }
    /**
     * Country Name from Code
     *
     * @param string $code
     * @return null|string
     */
    public function getCountryName($code)
    {
        if(is_null($this->locale)) {
            $lang = $this->getRequest()->getLanguageCode() ? : 'en';
            $locale = new PhpFileLoader();
            $this->locale = false;
            if(is_file($file = __DIR__ . './../../../../umpirsky/country-list/data/' . $lang . '/country.php')) {
                $this->locale = $locale->load($file, $lang);
            }
        }
        return $this->locale ? $this->locale->get($code) : $code;
    }
}