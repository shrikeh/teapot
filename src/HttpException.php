<?php
/**
 * Simple Exception to represent http-based Exceptions.
 *
 * @category Exception
 *
 * @package Teapot
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @see https://shrikeh.github.com/teapot
 */

namespace Teapot;

/**
 * Simple Exception to represent http-based Exceptions.
 *
 * @category Exception
 *
 * @package Teapot
 *
 * @author    Barney Hanlon <barney@shrikeh.net>
 * @copyright 2013-2016 B Hanlon. All rights reserved.
 * @license   MIT http://opensource.org/licenses/MIT
 *
 * @see https://shrikeh.github.com/teapot
 * @api
 */
class HttpException extends \Exception implements StatusCode
{
    /**
     * The standard HTTP 1.1 prefix.
     *
     * @var string
     */
    public const HTTP1_1_PREFIX = 'HTTP/1.1';

    /**
     * Simple magic so you can use the Exception directly as a string, for
     * example in header();.
     *
     * @return string A fully valid status header
     */
    public function __toString()
    {
        // I dislike functionality inside magic methods,
        // so this just proxies to render().
        return $this->render();
    }

    /**
     * Render the code and message (in whole or in part) as a valid
     * response status header.
     *
     * @param bool $prependHttp Whether to prepend the HTTP/1.1 prefix
     */
    public function render(bool $prependHttp = true): string
    {
        $string = $this->getCode() . ' ' . $this->getMessage();

        if ($prependHttp) {
            $string = self::HTTP1_1_PREFIX . ' ' . $string;
        }

        return $string;
    }
}
