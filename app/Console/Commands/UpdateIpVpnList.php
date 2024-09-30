<?php

namespace App\Console\Commands;

use App\Jobs\VpnList;
use Illuminate\Console\Command;

class UpdateIpVpnList extends Command
{
    protected $signature = 'vpnlist:update';
    protected $description = 'Manually trigger IP address update';

    public function handle()
    {
        $updateIpAddresses = new VpnList();

        $updateIpAddresses->handle();

        $this->info('IP addresses have been updated successfully.');
    }
}
