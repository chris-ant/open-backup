<?php 

namespace OpenBackup\Admin;

class Helper
{
    /**
     * Returns a value if the two items are identical strings or empty string if they are not.
     *
     * @param string $item1
     * @param string $item2
     * @param string $return_value
     * @return string
     */
    public static function str_compare_return(string $item1, string $item2, string $value = ''): string
    {
        if ($item1 == $item2){
            return $value;
        }

        return '';
    }
}