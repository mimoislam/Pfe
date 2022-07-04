<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ResultStatus extends Enum
{
    const FAILED =  1;
    const CONFORM =   2;
    const FAILED_BY_SYSTEM = 3;
    const CONFORM_BY_SYSTEM =   4;   
    const OUT_OF_REGEX =  5; 
    const FAILED_BY_REGEX=6  ;
    const CONFUSED_BY_SYSTEM=7  ;

}
