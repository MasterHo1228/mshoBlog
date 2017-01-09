<?php

namespace App\Policies\Backend;

use App\Models\Backend\Article;
use App\Models\Backend\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function update(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

    public function destroy(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }
}
