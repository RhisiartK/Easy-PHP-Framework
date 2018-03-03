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
        $value = filter_input(INPUT_GET, Settings::URL_PATH_VARIABLE_NAME, FILTER_DEFAULT,
            ['options' => ['default' => null]]);

        if ($value !== null)
        {
            $this->requestedPath = new UrlPath($value);
            if ($this->requestedPath->getErrorCode() === ErrorCodes::NO_ERROR)
            {
                $this->processRequest();
                return;
            }
        }

        // TODO Error Page - Request Is Invalid
        Log::Message('Request is invalid!');
    }

    /**
     * Process the request
     */
    private function processRequest(): void
    {
        $urlArray = explode('/', rtrim(str_replace('-', '', $this->requestedPath->get()), '/'));

        $this->requestedMethod = $_SERVER['REQUEST_METHOD'] === 'POST' ? 'POST' : 'GET';

        if (empty($urlArray[0]))
        {
            $urlArray[0] = Settings::DEFAULT_PAGE;
        }

        $pathPart = 'Application';
        $urlArrayCount = count($urlArray);
        for ($i = 0; $i < $urlArrayCount && $i < Settings::MAX_PROCESSABLE_PATH_DEPTHS; $i++)
        {
            $pathPart .= '\\' . $urlArray[$i];
            if (class_exists($pathPart . '\\Controller') && method_exists($pathPart . '\\Controller',
                    $this->requestedMethod))
            {
                $this->requestedPage = $pathPart;
                $this->requestedParameters = \array_slice($urlArray, $i + 1);
            }
        }

        if ($this->requestedPage === null)
        {
//            throw new PageNotFoundException('The requested page (' . $this->requestedPath->get() . ') not found!');
        }

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
    public function getRequestedPage(): ?string
    {
        return $this->requestedPage;
    }
}
