<?php

namespace Navigation\Menu;


class Navigator {

    private $config = [];

    /**
     * @param Entry $entry
     */
    public function add(Entry $entry)
    {
        $this->config[] = $entry;
    }

    public function addEntry($label, $route, $iconClass = '')
    {
        $this->config[] = new Entry($label, $route, $iconClass);
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
                'icon' => $entry->getIcon()
            ];
        }

        return $resultConfig;
    }

} 