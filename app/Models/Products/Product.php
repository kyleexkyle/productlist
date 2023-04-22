<?php


namespace App\Models\Products;


use App\Models\Categories\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'description',
        'date_and_time'
    ];

    protected $casts = [
        'date_and_time' => 'datetime:Y-m-d\TH:i'
    ];

    public function getDateTimeAttribute()
    {
        return $this->date_and_time->format('Y-m-d\TH:i');
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
