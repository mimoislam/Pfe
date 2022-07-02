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
    const FAILED =  0;
    const CONFORM =   1;
    const FAILED_BY_SYSTEM = 2;
    const CONFORM_BY_SYSTEM =   3;   

}
