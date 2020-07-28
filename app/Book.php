<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  protected $fillable = ['isbn', 'title', 'author', 'description', 'publication', 'language', 'edition'];

  public function getTitleAttribute($value)
  {
    return ucwords($value);
  }

  public function getAuthorAttribute($value)
  {
    return ucwords($value);
  }

  public function getPublicationAttribute($value)
  {
    return ucwords($value);
  }

  public function getISBNAttribute($value)
  {
    return strtoupper($value);
  }

  public function getLanguageAttribute($value)
  {
    return ucwords($value);
  }

  // public function subscription()
  // {
  //   $book_id = $this->id;
  //   $user_id = auth()->user()->id;
  //   $subscription = Subscription::where(['book_id' => $book_id, 'user_id' => $user_id])->first();
  //   if (isset($subscription))
  //     return $subscription;
  //   else
  //     return $subscription=[];
  // }
}
