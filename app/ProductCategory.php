<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductCategory extends Model {

    protected $guarded = ['id'];
    public $timestamps = false;

    public static $rules = [
        // Validation rules
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->level = 0;
            $model->path = '';
            $model->slug = Str::slug($model->name, '-');
        });

        self::created(function ($model) {
            $model->level = $model->calculateLevel();
            $model->path = $model->calculatePath();
        });

        self::updating(function ($model) {
            $model->slug = Str::slug($model->name, '-');
        });

    }

    // Relationships
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category_product',  'product_category_id', 'product_id');
    }

    public function subcategories()
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function getDistributorFilesAttribute()
    {
        return ProductMedia::whereIn('product_id', $this->products->pluck('id'))->where('distributor_file', true)->get();
    }

    public function calculateLevel()
    {
        if (!$this->is_subcategory) {
            return 0;
        } else {
            $level = 0;
            $parent = $this->parent;
            while ($parent) {
                $level += 1;
                $parent = $parent->parent;
            }

            return $level;
        }
    }

    public  function calculatePath()
    {

        if (!$this->is_subcategory) {
            return '/'.$this->id;
        } else {
            $path = '';
            $parents = [];
            $parent = $this->parent;
            while ($parent) {
                $parents[] = $parent;
                $parent = $parent->parent;
            }

            $parents = array_reverse($parents);
            foreach ($parents as $parent) {
                $path .= '/'.$parent->id;
            }

            $path .= '/'.$this->id;
            return $path;
        }
    }

}
