<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property string $tags
 * @property string $company
 * @property string $location
 * @property string $email
 * @property string $website
 * @property string $description
 * @property string $logo
 * @property integer $user_id
 *
 * @property User $user
 */
class Listing extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'tags', 'company', 'location', 'email', 'user_id', 'logo', 'website', 'description'];

    public function scopeFilter($query, array $filters)
    {
        $tag = $filters['tag'] ?? false;
        $search = $filters['search'] ?? false;
        if ($tag) {
            $query->where('tags', 'like', "%$tag%");
        }
        if ($search) {
            $query->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('tags', 'like', "%$search%")
                ->orWhere('company', 'like', "%$search%");
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
