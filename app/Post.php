<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function user()
    {
    	return $this->belongsTo(User::class);
    }

	public function addComment($body)
	{
		$this->comments()->create([
		'body' => request('body'),
		'user_id' => auth()->id()
		]);
	}

	public function scopeFilter($query, $filters)
	{
        if($month = $filters['month'])
        {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filters['year'])
        {
            $query->whereYear('created_at', $year);
        }
	}

	public static function archives()
	{
		return static::selectRaw('YEAR(created_at) year,  MONTHNAME(created_at) month, COUNT(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
	}
}
