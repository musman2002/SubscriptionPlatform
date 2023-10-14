<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(SubscribeRequest $request)
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        
        $existingSubscription = Subscription::where('website_id', $request->input('website_id'))
            ->where('user_id', $user->id)
            ->first();

        if ($existingSubscription) {
            return response()->json(['message' => 'User is already subscribed to this website.'], 400);
        }

        // Create a new subscription.
        $subscription = new Subscription([
            'website_id' => $request->input('website_id'),
            'user_id' => $user->id,
        ]);
        $subscription->save();

        return response()->json(['message' => 'Subscription created successfully.'], 201);
    }
}
