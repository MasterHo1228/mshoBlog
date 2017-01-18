<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public static function getAllArticles()
    {
        return self::with('user', 'tags')->all()->orderBy('id', 'DESC');
    }

    public static function getCurrentUserArticles($userID)
    {
        $user = User::find($userID);
        return $user->articles()->with('tags')->orderBy('created_at', 'desc')->paginate(30);
    }

    public static function getPreviewContentById($id)
    {
        return self::findOrFail($id)->content;
    }

    public static function getLatestArticles($limit = 8)
    {
        return self::with('user', 'tags')->orderBy('created_at', 'desc')->paginate($limit);
    }

    public static function getMostPopularArticles($limit = 5)
    {
        return self::with('user', 'tags')->orderBy('read_count', 'desc')->paginate($limit);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
