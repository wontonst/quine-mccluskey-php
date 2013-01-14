<?
require_once('quinemccluskey.php');
$array = array(0,1,1,0,1,1,0,0,0,1,0,1,1,1,1,1,0,1,0,0,0,0,0,0,0,1,0,1,1,1,1,1);

$array2 = array();
foreach($array as $k => $v)
{
    $r = $k;//retain decimal
    $k = decbin($k);//get binary vwxyz
    while(strlen($k) != 5)
    {
        $k = '0'.$k;
    }
    if($v == 1)
        $array2[$r] = $k;
}

$array3 = array();
for($i = 1; $i != 6; $i++)
{
    $array3[$i] = array();
    echo 'Number of indexes: '.$i."\n";
    foreach($array2 as $k => $v)
    {
        if(QuineMcCluskey::numOnes($v) == $i)
        {
            echo 'Index: '.$k.'; Minterms: '.$v."\n";
            $array3[$i][$k]=$v;
        }
    }
}

for($it = 1; count($array3) != 1; $it++)
{
    echo '========ITERATION-'.$it.'=========='."\n";
    $output = array();//minterms that cannot be matched are placed here
    $temparray = array();//next array3
    for($i = 1; $i != count($array3); $i++)
    {
        echo 'Groupings for '.$i.','.($i+1)."\n";
        foreach($array3[$i] as $kone => $one)
        {
            $matched = false;
            foreach($array3[$i+1] as $ktwo => $two)
            {
                if(QuineMcCluskey::differsByOne($one,$two))
                {
                    $matched = true;
                    echo '('.$kone.','.$ktwo.') '.QuineMcCluskey::simplify($one,$two)."\n";
                    $temparray[$i][$kone.';'.$ktwo] = QuineMcCluskey::simplify($one,$two);
                }
            }
            if(!$matched) {
                $output[$kone]=$one;
            }
        }
    }
    echo 'UNMATCHED OUTPUTS: '."\n";
    foreach($output as $k => $v)
    {
        echo $k.': '.$v."\n";
    }
    $array3 = $temparray;
}



?>