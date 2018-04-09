<?php

namespace yapos2\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Item extends Model
{

  public $fillable = [
      'upc_ean_isbn',
      'name',
      'description',
      'avatar',
      'cost_price',
      'selling_price',
      'quantity',
      'is_item_kit',
      'is_stockeable',
      'reorder_level',
      'receiving_quantity',
      'category_id'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
      'id' => 'integer',
      'upc_ean_isbn' => 'string',
      'name' => 'string',
      'description' => 'string',
      'avatar' => 'string',
      'quantity' => 'integer',
      'is_item_kit' => 'boolean',
      'is_stockeable' => 'boolean',
      'category_id' => 'integer'
  ];

  protected static function boot()
  {
      parent::boot();

      static::addGlobalScope('is_item_kit', function (Builder $builder) {
          $builder->where('is_item_kit', '=', 0);
      });
  }//

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
      'name' => 'required|min:5',
      'avatar' => 'required',
      'cost_price' => 'required',
      'selling_price' => 'required',
      'quantity'  => 'required',
      'is_item_kit' => 'required',
      'is_stockeable'  => 'required',
      'reorder_level'  => 'required',
      'receiving_quantity'  => 'required',

  ];
}