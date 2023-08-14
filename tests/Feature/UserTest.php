<?php

namespace Tests\Feature;
use Tests\TestCase;
use App\Models\User;
use App\Models\Site;

class UserTest extends TestCase
{
    public function testHomeScenario()
    {
        $specificSites = [
            ['site_name' => 'Tammipuu', 'site_latitude' => 61.3463, 'site_longitude' => 45.2345],
            ['site_name' => 'Kalliola', 'site_latitude' => 61.0443, 'site_longitude' => 42.5739],
        ];

        $user = User::factory()->create();

        foreach ($specificSites as $siteData) {
            Site::factory()->create([
                'user_id' => $user->id,
                'site_name' => $siteData['site_name'],
                'site_latitude' => $siteData['site_latitude'],
                'site_longitude' => $siteData['site_longitude'], 
            ]);
        }

    }
}
