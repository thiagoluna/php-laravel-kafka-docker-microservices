<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Uuid;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'customer_id',
        'status',
        'discount',
        'total',
        'order_date'
    ];

    protected $casts = [
        'order_date' => 'date',
        'total' => 'float',
        'discount' => 'float',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function delete()
    {
        //Primeiro executa a deleção de itens
        $this->items()->delete();

        //Caso a deleção acima seja true, executa o Delete Inicial
        return parent::delete();
    }
}
