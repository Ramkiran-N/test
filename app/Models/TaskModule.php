<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskModule extends Model
{
   protected $fillable = ['user_id', 'task', 'description', 'category', 'tags', 'status'];
   public function user()
    {
        return $this->belongsTo(User::class);
    }
}
?>