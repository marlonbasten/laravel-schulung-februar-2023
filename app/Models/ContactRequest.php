<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ContactRequest
 *
 * @property int $id
 * @property string $name
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactRequest withoutTrashed()
 * @mixin \Eloquent
 */
class ContactRequest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'message',
    ];

    public function name(): Attribute
    {
        return new Attribute(
            set: fn($value) => ucfirst($value),
        );
    }
}
