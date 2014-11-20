<?php
namespace Application\View\Helper;
use Zend\View\Helper\AbstractHelper;
 
class NavigationHelper extends AbstractHelper
{
    private $config = null;
    private $urlHelper = null;
    private $path = null;

    public function __invoke()
    {
        $list = $this->renderList();
    }

    public function setConfig($config)
    {
        $this->config = $config;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setUrlHelper($urlHelper)
    {
        $this->urlHelper = $urlHelper;
    }

    public function setPath()
    {
        $this->path = $this->getUrlHelper()->__invoke();
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getUrlHelper()
    {
        return $this->urlHelper;
    }

    private function renderList()
    {
        $openNormal = '<li>';
        $openActive = '<li class="active">';
        $wrapper = array(
            'start' => null,
            'content' => null,
            'end' => '</li>'
        );
        $navConf = $this->getConfig();
        $path = $this->getPath();
        $html = '';

        foreach ($navConf as $key => $navItem) {
            if ($navItem['exclude']) {
                continue;
            }
            if (strpos($path, $key) === false) {
                $wrapper['start'] = $openNormal;       
            } else {
                $wrapper['start'] = $openActive;
            }

            $source = $this->getUrlHelper()->__invoke($navItem['route']);
            
            $wrapper['content'] = 
                '<a href="' . $source . '">
                <i class="icon ' . $navItem['icon'] . '"></i>' . 
                $navItem['label'] . '</a>';
            // $html .= $wrapper['start'] . $wrapper['content'] . $wrapper['end'];
            echo($wrapper['start'] . $wrapper['content'] . $wrapper['end']);    
        }
    }
}