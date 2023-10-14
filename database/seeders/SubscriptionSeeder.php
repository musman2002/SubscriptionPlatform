<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::where('email', 'john@example.com')->first();
        $user2 = User::where('email', 'jane@example.com')->first();
        
        $website1 = Website::where('url', 'http://example1.com')->first();
        $website2 = Website::where('url', 'http://example2.com')->first();
    
        Subscription::create(['user_id' => $user1->id, 'website_id' => $website1->id]);
        Subscription::create(['user_id' => $user2->id, 'website_id' => $website1->id]);
        Subscription::create(['user_id' => $user2->id, 'website_id' => $website2->id]);
    }
}
