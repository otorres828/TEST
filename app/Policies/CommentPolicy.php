<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function autor(User $user, Comment $comment){
        $roles = $user->getRoleNames();   
        if($user->id == $comment->user_id || $roles[0]=='Admin'){
            return true;
        }else{
            return false;
        }
    }
}
