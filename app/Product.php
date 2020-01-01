<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Dimsav\Translatable\Translatable;

    protected $guarded=[];
    protected $appends=['image_path','profit_percent'];
    public $translatedAttributes = ['name','description'];

    public function category()
    {
        return $this->belongsTo(Product::class);
    }
    public function getImagePathAttribute()
    {
        return asset('uploads/product_images/'.$this->image);
    }

    public function getProfitPercentAttribute()
    {
        $profit=$this->sale_price - $this->purchase_price;
        $profit_percent=$profit*100/$this->purchase_price; 
        return number_format($profit_percent,2).' % ';
    }
}
