<?php

class N2AssetsGoogleFonts extends N2AssetsAbstract
{

    private static $url = '//fonts.googleapis.com/css?family=';

    function addSubset($subset = 'latin') {
        if (!in_array($subset, $this->inline)) {
            $this->inline[] = $subset;
        }
    }

    function addFont($family, $style = '400') {
        if (!isset($this->files[$family])) {
            $this->files[$family] = array();
        }
        if (!in_array($style, $this->files[$family])) {
            $this->files[$family][] = $style;
        }
    }

    public function getFontUrl() {
        $familyQuery = '';
        if (count($this->files)) {
            foreach ($this->files AS $family => $styles) {
                if (count($styles)) {
                    $familyQuery .= $family . ':' . implode(',', $styles) . '|';
                }
            }
        }
        if ($familyQuery == '') {
            return false;
        }

        $subset = array_unique($this->inline);
        return self::$url . urlencode(substr($familyQuery, 0, -1)) . '&subset=' . urlencode(implode(',', $subset));
    }
}