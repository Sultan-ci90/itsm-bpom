<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('service-request.{id}', function ($user, $id) {
    $req = \App\Models\ServiceRequest::find($id);
    if (!$req) {
        return false;
    }
    return (int) $user->id === (int) $req->user_id || $user->isTeknisi() || $user->isAdmin();
});
