<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Organization extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setOrganizationNameAttribute($value)
    {
        $this->attributes['organization_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
