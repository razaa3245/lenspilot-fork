<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TryOn extends Model
{
    use HasFactory;

    protected $table      = 'try_ons';
    protected $primaryKey = 'id';

    protected $fillable = [
        'shop_id',
        'customer_id',
        'lens_id',
        'image_url',
        'status',
        'tryon_time',
    ];

    public function shopkeeper()
    {
        return $this->belongsTo(Shopkeeper::class, 'shop_id');
    }
    public function lens()
    {
        return $this->belongsTo(Lens::class, 'lens_id', 'id'); // 'id' fix kiya
    }
}