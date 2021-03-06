<?php
class Candoo_Dataset_Array
{
	/**
     * Merge two arrays recursively, overwriting keys of the same name
     * in $firstArray with the value in $secondArray.
     *
     * @param  mixed $firstArray  First array
     * @param  mixed $secondArray Second array to merge into first array
     * @return array
     */
    public static function mergeRecursive($firstArray, $secondArray)
    {
        if (is_array($firstArray) && is_array($secondArray)) {
            foreach ($secondArray as $key => $value) {
                if (isset($firstArray[$key])) {
                    $firstArray[$key] = $this->_arrayMergeRecursive($firstArray[$key], $value);
                } else {
                    if($key === 0) {
                        $firstArray= array(0=>$this->_arrayMergeRecursive($firstArray, $value));
                    } else {
                        $firstArray[$key] = $value;
                    }
                }
            }
        } else {
            $firstArray = $secondArray;
        }

        return $firstArray;
    }
    
    public static function lastKey(array $array) 
    {
        foreach ($array as $key=>$val) {}
        
        return $key;
    }
    
    
    
    function array_slice_assoc ($array, $key, $length=null )
    {
    	$offset = array_search($key, array_keys($array));
    
    	if (is_string($length))
    		$length = array_search($length, array_keys($array)) - $offset;
    
    	return array_slice($array, $offset, $length, true);
    }
}