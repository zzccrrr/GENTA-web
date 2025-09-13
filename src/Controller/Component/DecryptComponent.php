<?php
declare(strict_types=1);

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Utility\Security;

/**
 * Decrypt component
 */
class DecryptComponent extends Component
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
        return Security::decrypt(hex2bin($hex), self::ENCRYPTION_KEY);
    }
}
