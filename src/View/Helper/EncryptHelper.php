<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\Utility\Security;

/**
 * Encrypt helper
 */
class EncryptHelper extends Helper
{
    protected const ENCRYPTION_KEY = 'e22ddfe8ecb5356550aff2a23b70b35e';

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected $_defaultConfig = [];

    public function hex($hex)
    {
        return bin2hex(Security::encrypt((string) $hex, self::ENCRYPTION_KEY));
    }
}
