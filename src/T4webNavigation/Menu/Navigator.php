<?php

namespace T4webNavigation\Menu;


class Navigator
{

    private $config = [];
    private $subEntries = [];

    /**
     * @param Entry $entry
     */
    public function add(Entry $entry)
    {
        $this->config[] = $entry;
    }

    public function addEntry($label, $route, $iconClass = '', $params = [], $query = [])
    {
        $this->add(new Entry($label, $route, $iconClass, $params, $query));
    }

    public function addSubEntry($parentLabel, $label, $route, $iconClass = '', $params = [], $query = [])
    {
        $this->subEntries[$parentLabel][] = new Entry($label, $route, $iconClass, $params, $query);
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->prepare($this->config);
    }

    private function prepare(array $config)
    {
        $resultConfig = [];

        /** @var Entry $entry */
        foreach ($config as $entry) {
            $resultConfig[$entry->getRoute()] = [
                'label' => $entry->getLabel(),
                'route' => $entry->getRoute(),
                'params' => $entry->getParams(),
                'query' => $entry->getQuery(),
                'icon' => $entry->getIcon()
            ];

            if (isset($this->subEntries[$entry->getLabel()])) {
                foreach ($this->subEntries[$entry->getLabel()] as $subEntry) {
                    $resultConfig[$entry->getRoute()]['pages'][] = [
                        'label' => $subEntry->getLabel(),
                        'route' => $subEntry->getRoute(),
                        'params' => $subEntry->getParams(),
                        'query' => $subEntry->getQuery(),
                        'icon' => $subEntry->getIcon()
                    ];
                }
            }
        }

        return $resultConfig;
    }

} 