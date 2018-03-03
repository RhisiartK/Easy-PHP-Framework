<?php
declare(strict_types=1);
/**
 * Router.php class file.
 *
 * @author Richard Keki <kricsi14@gmail.com>
 * @link https://github.com/RhisiartK/Easy-PHP-Framework
 * @license https://github.com/RhisiartK/Easy-PHP-Framework/blob/master/LICENSE
 */

namespace EasyPHP\Core;

use EasyPHP\ValueObjects\UrlPath;

class Router
{
    /**
     * @var UrlPath
     */
    private $requestedPath;
    /**
     * @var string
     */
    private $requestedMethod;
    /**
     * @var array
     */
    private $requestedParameters;
    /**
     * @var string
     */
    private $requestedPage;

    public function __construct()
    {
        $value = filter_input(INPUT_GET, Settings::UrlPathVariableName, FILTER_DEFAULT,
            ['options' => ['default' => null]]);
        if ($value !== null)
        {
            $this->requestedPath = new UrlPath($value);
            if ($this->requestedPath->getErrorCode() === ErrorCodes::NO_ERROR)
            {
                //            $this->processRequest();
            } else
            {
                // TODO Error Page - Requested Page Not Found
                Log::Message('The requested page not found!');
            }
        } else
        {
            // TODO Error Page - Request Not Found
            Log::Message('Request not found!');
        }
    }

    private function processRequest(): void
    {
        $urlArray = explode('/', rtrim(str_replace('-', '', $this->requestedPath->getValue()), '/'));

        $this->requestedMethod = $_SERVER['REQUEST_METHOD'] === 'POST' ? 'POST' : 'GET';

        if (empty($urlArray[0]))
        {
            $urlArray[0] = Settings::DefaultPage;
        }

        $pathPart = 'Application';
        foreach ($urlArray as $index => $item)
        {
            if ($index > Settings::MaxProcessablePathLength)
            {
                break;
            }
            $pathPart .= '\\' . $item;
            if (class_exists($pathPart . '\\Controller') && method_exists($pathPart . '\\Controller',
                    $this->requestedMethod))
            {
                $this->requestedPage = $pathPart;
                $this->requestedParameters = \array_slice($urlArray, $index + 1);
            }
        }

        if ($this->requestedPage === null)
        {
            throw new PageNotFoundException('The requested page (' . $this->requestedPath->getValue() . ') not found!');
        }
        // TODO paraméterek feldolgozása ha az url ilyen: /ControllerName/ParameterNeve/ParameterErteke/ParameterNeve/ParameterErteke

    }

    /**
     * @return string
     */
    public function getRequestedMethod(): string
    {
        return $this->requestedMethod;
    }

    /**
     * @return array
     */
    public function getRequestedParameters(): array
    {
        return $this->requestedParameters;
    }

    /**
     * @return string
     */
    public function getRequestedPage(): string
    {
        return $this->requestedPage;
    }
}
