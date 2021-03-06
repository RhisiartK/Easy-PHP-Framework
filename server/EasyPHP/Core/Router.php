<?php

declare(strict_types=1);
/**
 * Router.php class file.
 *
 * @author  Richard Keki <kricsi14@gmail.com>
 *
 * @link    https://github.com/RhisiartK/Easy-PHP-Framework
 *
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Core;

use EasyPHP\ValueObjects\UrlPath;

class Router
{
    /**
     * @var ?string
     */
    private $requestMethod;

    /**
     * @var ?array
     */
    private $requestParameters;

    /**
     * @var ?string
     */
    private $requestUrl;

    /**
     * @var int
     */
    private $requestErrorCode;

    /**
     * Router constructor.
     *
     * @param null|string $value requested page uri
     */
    public function __construct()
    {
        $value = filter_input(
            INPUT_GET,
            Settings::URL_PATH_VARIABLE_NAME,
            FILTER_DEFAULT,
            ['options' => ['default' => null]]
        );

        if ($value !== null && isset($_SERVER['REQUEST_METHOD'])) {
            $requestedPath = new UrlPath($value);

            if ($requestedPath->getErrorCode() === ErrorCodes::NO_ERROR) {
                $urlArray = explode('/', $requestedPath->get());

                $this->requestMethod = $_SERVER['REQUEST_METHOD'] === 'POST' ? 'POST' : 'GET';

                if (empty($urlArray[0])) {
                    $urlArray[0] = Settings::DEFAULT_PAGE;
                }

                $pathPart      = 'Application';
                $urlArrayCount = count($urlArray);

                for ($i = 0; $i < $urlArrayCount && $i < Settings::MAX_PROCESSABLE_PATH_DEPTHS; $i++) {
                    $pathPart .= '\\' . $urlArray[$i];
                    if (class_exists($pathPart . '\\Controller') && method_exists(
                        $pathPart . '\\Controller',
                        $this->requestMethod
                    )) {
                        $this->requestUrl        = $pathPart;
                        $this->requestParameters = \array_slice($urlArray, $i + 1);
                    }
                }

                if ($this->requestUrl === null) {
                    $this->requestErrorCode = ErrorCodes::PAGE_NOT_FOUND;
                } else {
                    $this->requestErrorCode = ErrorCodes::NO_ERROR;
                }

                return;
            }
        }

        $this->requestErrorCode = ErrorCodes::INVALID_PAGE_REQUEST;
    }

    /**
     * @return string
     */
    public function getRequestMethod(): ?string
    {
        return $this->requestMethod;
    }

    /**
     * @return array
     */
    public function getRequestParameters(): ?array
    {
        return $this->requestParameters;
    }

    /**
     * @return string
     */
    public function getRequestUrl(): ?string
    {
        return $this->requestUrl;
    }

    /**
     * @return int
     */
    public function getRequestErrorCode(): int
    {
        return $this->requestErrorCode;
    }
}
