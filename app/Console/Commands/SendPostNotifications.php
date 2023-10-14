<?php

namespace App\Console\Commands;

use App\Jobs\SendPostNotificationJob;
use App\Mail\PostNotificationMail;
use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Models\Post;
use Mail;

class SendPostNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:post-notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send post notifications to subscribers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $subscriptions = Subscription::all();

        foreach ($subscriptions as $subscription) {
            $website = $subscription->website;


            $unnotifiedPosts = $website->posts
                ->where('created_at', '>', $subscription->last_notified);

            foreach ($unnotifiedPosts as $post) {
                if ($post->id > $subscription->last_sent_post_id) {
                    SendPostNotificationJob::dispatch($subscription->user, $post)->onQueue('Subscription');;
                    $subscription->update(['last_sent_post_id' => $post->id,'last_notified' => now()]);
                }
            }
        }

        $this->info('Post notifications sent to subscribers.');
        return 0;
    }
}
