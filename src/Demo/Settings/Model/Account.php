<?php

namespace App\Demo\Settings\Model;

class Account
{
    // details
    public string $username = 'yceruto';
    public string $timezone = 'UTC';
    public string $status = 'active';
    public bool $isVerified = false;
    public string $joinedDate = '';
    public string $lastActive = '';

    // profile
    public Personal $personal;
    public Location $location;

    // team
    /**
     * @var Member[]
     */
    public array $team = [];

    // notification
    public Notification $notification;
}
