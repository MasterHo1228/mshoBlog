<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    use SoftDeletes;

    /**
     * 需要被转换成日期的属性。
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getAllArticles()
    {
        return self::with('user', 'tags')->all()->orderBy('id', 'DESC');
    }

    public function getCurrentUserArticles()
    {
        $user = User::findOrFail(Auth::id());
        return $user->articles()->with('tags')->orderBy('created_at', 'desc')->paginate(30);
    }

    public function getPreviewContentById($id)
    {
        return self::findOrFail($id)->content;
    }
}
