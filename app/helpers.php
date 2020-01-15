<?php

use App\CountryContext;
use App\Language;
use Illuminate\Support\Collection;

function getEnabledLanguages() {
    return Language::where('enabled', true)->get();
}

function getDisabledLanguages() {
    return Language::where('enabled', false)->get();
}

function existsInCollection($object, Collection $collection, $props)
{
    $result = $collection;

    foreach ($props as $p) {
        $result = $result->where($p, $object->$p);
    }

    if ($result->count() > 0) {
        return true;
    }

    return false;
}

function getRoute($name, $params = []) {
    $params['country'] = session('country') ?? 'US';

    return route($name, $params);
}

function categoryLink($slug, $params = []) {
    return getRoute('category-overview-page', ['category' => $slug]);
}