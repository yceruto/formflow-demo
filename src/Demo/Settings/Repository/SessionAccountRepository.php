<?php

namespace App\Demo\Settings\Repository;

use App\Demo\Settings\Model\Account;
use Symfony\Component\HttpFoundation\RequestStack;

final readonly class SessionAccountRepository implements AccountRepositoryInterface
{
    public function __construct(
        private RequestStack $requestStack,
    ) {
    }

    public function current(): Account
    {
        $account = $this->requestStack->getSession()->get('demo_settings_account');

        if (!$account instanceof Account) {
            $account = new Account();
            $account->joinedDate = date('Y-m-d');
        }
        $account->lastActive = date('Y-m-d H:i');

        return $account;
    }

    public function save(Account $account): void
    {
        $this->requestStack->getSession()->set('demo_settings_account', $account);
    }
}
