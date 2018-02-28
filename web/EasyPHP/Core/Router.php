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

class Router
{
    /**
     * @var Path
     */
    private $_requestedPath;
    /**
     * @var string
     */
    private $_requestedMethod;
    /**
     * @var array
     */
    private $_requestedParameters;
    /**
     * @var string
     */
    private $_requestedPage;

    public function __construct()
    {
        try
        {
            $this->_requestedPath = new Path(filter_input(INPUT_GET, Settings::UrlPathVariableName, FILTER_DEFAULT, ['options' => ['default' => NULL]]));
            $this->processRequest();
        } catch (InvalidPathException $ex)
        {
            // TODO log
            throw new PageNotFoundException('The requested page not found!', 0, $ex);
        }
    }

    private function processRequest(): void
    {
        $urlArray = explode('/', rtrim(str_replace('-', '', $this->_requestedPath->getValue()), '/'));

        $this->_requestedMethod = $_SERVER['REQUEST_METHOD'] === 'POST' ? 'POST' : 'GET';

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
            if (class_exists($pathPart . '\\Controller') && method_exists($pathPart . '\\Controller', $this->_requestedMethod))
            {
                $this->_requestedPage           = $pathPart;
                $this->_requestedParameters     = \array_slice($urlArray, $index + 1);
            }
        }

        if ($this->_requestedPage === NULL)
        {
            throw new PageNotFoundException('The requested page (' . $this->_requestedPath->getValue() . ') not found!');
        }
        // TODO paraméterek feldolgozása ha az url ilyen: /ControllerName/ParameterNeve/ParameterErteke/ParameterNeve/ParameterErteke

    }

    /**
     * @return string
     */
    public function getRequestedMethod(): string
    {
        return $this->_requestedMethod;
    }

    /**
     * @return array
     */
    public function getRequestedParameters(): array
    {
        return $this->_requestedParameters;
    }

    /**
     * @return string
     */
    public function getRequestedPage(): string
    {
        return $this->_requestedPage;
    }
}
