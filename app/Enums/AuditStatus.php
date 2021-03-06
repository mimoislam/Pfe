<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class AuditStatus extends Enum
{
    const WORKING =   'working';
    const FINISHED =   'finished';

}
