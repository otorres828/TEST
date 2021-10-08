<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    public function autor(User $user, Post $post){
        $roles = $user->getRoleNames();   
        if($user->id == $post->user_id || $roles[0]=='Admin'){
            return true;
        }else{
            return false;
        }
    }

    public function publicado(?User $user, Post $post){
        if($post->status==2){
            return true;
        }else{
            return false;
        }
    }
}
