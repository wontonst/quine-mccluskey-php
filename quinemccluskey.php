<?

class QuineMcCluskey {

    public static function numZeroes($s)
    {
        return QuineMcCluskey::num($s,0);
    }
    public static function numOnes($s)
    {
        return QuineMcCluskey::num($s,1);
    }
    public static function num($haystack, $needle)

    {   $i = 0;
        for($ii = 0; $ii != strlen($haystack); $ii++)
        {
            if($haystack[$ii] == $needle)
            {
                $i++;
            }
        }
        return $i;

    }
    public static function differsByOne($s1,$s2)
    {
        $match = false;
        for($i = 0; $i != strlen($s1); $i++)
        {
            if($s1[$i] != $s2[$i])
            {
                if(!$match)
                {
                    $match = true;
                }
                else return false;
            }
        }
        return true;
    }
    public static function simplify($s1,$s2)
    {
        if(!QuineMcCluskey::differsByOne($s1,$s2))
            return false;

        for($i = 0; $i != strlen($s1); $i++)
        {
            if($s1[$i] != $s2[$i])
            {
                $s1[$i] = '-';
                return $s1;
            }
        }
        return 'NULL';
    }
}
?>