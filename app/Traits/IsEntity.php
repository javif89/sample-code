<?php

namespace App\Traits;

use App\Country;
use App\Entity as AppEntity;

trait IsEntity {
    public function countries()
    {
        return $this->belongsToMany(Country::class, 'entity_countries', 'entity_id');
    }
}