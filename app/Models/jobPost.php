<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class jobPost extends Model
{
    use HasFactory;

    protected $table = "job_posts";

    protected $fillable = [
        'title', 
        'description', 
        'location', 
        'salary', 
        'job_type', 
        'contact_phone', 
        'contact_email', 
        'status'
    ];
    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
