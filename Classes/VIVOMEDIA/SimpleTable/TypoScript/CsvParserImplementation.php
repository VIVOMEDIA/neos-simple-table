<?php
namespace VIVOMEDIA\SimpleTable\TypoScript;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\TypoScript\TypoScriptObjects\AbstractTypoScriptObject;


class CsvParserImplementation extends AbstractTypoScriptObject
{

    /**
     * Evaluate this TypoScript object and return the result
     *
     * @return mixed
     */
    public function evaluate()
    {
        $data = [];

        $csvData = $this->tsValue('csv');
        $lines = preg_split('/\n|\r\n?/', $csvData);
        foreach ($lines as $line) {
            $data[] = str_getcsv($line, ';');
        }
        return $data;
    }
}
