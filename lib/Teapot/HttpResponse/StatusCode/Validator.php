<?php
namespace Teapot\HttpResponse\StatusCode;

class Validator
{

    /**
     * A ReflectionClass instance.
     *
     * @var \ReflectionClass
     */
    protected $reflector;

    /**
     * Validate a response code to see if it is a W3C-approved status code.
     *
     * @param integer $code
     * @return bool
     */
    public function isValid($code)
    {
        if (!is_integer($code)) {
            return false;
        }
        $reflector = $this->getReflector();
        $constants = array_flip($reflector->getConstants());

        return (isset($constants[$code]));
    }

    /**
     * Get an instance of a reflector for the status code interface,
     * or lazily create one.
     *
     * @return ReflectionClass
     */
    private function getReflector()
    {
        if (!isset($this->reflector)) {
            $this->reflector = new \ReflectionClass('\Teapot\HttpResponse\StatusCode');
        }
        return $this->reflector;
    }
}
