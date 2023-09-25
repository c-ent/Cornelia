<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
        'return_date',
        'borrow_status',
    ];


    // This model establishes a relationship with both the User and Book models.
    // It automatically identifies the foreign key columns as {modelname}_id,
    // which, in this case, are user_id and book_id.
    public function user()
    {
        return $this->belongsTo(User::class); 
    }           

    public function book()
    {
        return $this->belongsTo(Book::class); 
    }
}
