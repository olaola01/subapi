<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends ApiController{
    public function subscribe(Request $request, $topic){
        $request->validate([
            'url' => 'required'
        ]);

        Subscription::create([
            'url' => $request->url,
            'topic' => $topic
        ]);

        return response()->json([
            'url' => $request->url,
            'topic' => $topic,
        ],
            200);
    }

    public function publish(Request $request, $topic){
        $request->validate([
            'message' => 'required'
        ]);

        $subscription = Subscription::where('topic', $topic)->firstOrFail();

        $subscription->update([
            'message' => $request->message
        ]);

        $sub = Subscription::select('message')->where('topic', $topic)->first();


        return response()->json([
            'topic' => $topic,
            'data' => $sub,
        ],
            200);
    }
}
