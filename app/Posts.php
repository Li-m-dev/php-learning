<?php

namespace App;

use Carbon\Carbon;

class Posts extends Model
{
   public function comments()
   {
    return $this->hasMany(Comment::class);
   }

   public function addComment($body)
   {

    $this->comments()->create(compact('body')); 

    //     Comment::create([
    //     'body'=> $body,
    //     'posts_id'=>$this->id
    // ]); 
   }

   public function scopeFilter($query,$filters)

   {
   
   if(isset($filters['month'])){
   
   $query->whereMonth('created_at',Carbon::parse($filters['month'])->month);
   }
   
   if(isset($filters['year'])){
   
   $query->whereYear('created_at',$filters['year']);
   }
   
   }


//    public function scopeFilter($query, $filters)
//    {
//     // //    var_dump($query);
//     //    var_dump($filters['month']);
//         // $month = $filters['month'];
//        if (isset($month)){
//             $query->whereMonth('created_at', Carbon::parse($month)->month);
//         }

//         if(isset($filters['year'])){
//             if($year = $filters['year']){
//             $query->whereYear('created_at', $year);
//             }
//             }
//    }


public static function archives()
{
    return static::selectRaw ('year(created_at) year, monthname(created_at) month, count(*) published')
        
        ->groupBy('year', 'month')

        ->orderByRaw('min(created_at) desc')

        ->get()
        
        ->toArray();
}

public function tags()
{
    return $this->belongsToMany(Tag::class);
}

   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
   