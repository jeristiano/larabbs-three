<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    //使用cache缓存分类数据
    public static function allCached()
    {
        $expiresAt = Carbon::now()->addMinutes(180);
        return Cache::remember('categoryCached', $expiresAt, function()
        {
            return self::all();
        });


    }
}

