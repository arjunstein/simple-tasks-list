<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'long_description'
    ];

    public function toggleComplete()
    {
        $this->completed = !$this->completed;
        $this->save();
    }

    public static function countProgress()
    {
        $totalTasks = self::count();
        $completedTasks = self::where('completed', 1)->count();

        if ($totalTasks == 0) {
            return 0;
        }

        $percentage = ($completedTasks / $totalTasks) * 100;

        return $percentage;
    }
}
