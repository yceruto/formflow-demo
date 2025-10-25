<?php

namespace App\Demo\Settings\Repository;

use App\Demo\Settings\Model\Account;

interface AccountRepositoryInterface
{
    public function current(): Account;

    public function save(Account $account): void;
}
