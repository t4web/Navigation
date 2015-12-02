<?php

namespace T4webNavigation\Menu;


class Entry
{

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $route;

    /**
     * @var array
     */
    private $params;

    /**
     * @var string
     */
    private $icon;

    /**
     * @var array
     */
    private $query;

    function __construct($label, $route, $icon = '', $params = [], $query = [])
    {
        $this->label = $label;
        $this->route = $route;
        $this->icon = $icon;
        $this->params = $params;
        $this->query = $query;
    }

    /**
     * @return array
     */
    public function getParams() {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams($params) {
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @return array
     */
    public function getQuery()
    {
        return $this->query;
    }

}