<?php

namespace Illuminate\Auth\Events;

use App\Model\User;
use Illuminate\Queue\SerializesModels;

class Registered
{
    use SerializesModels;

    /**
     * The authenticated user.
     *
     * @var User
     */
    public $user;

    /**
     * Registered constructor.
     *
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
