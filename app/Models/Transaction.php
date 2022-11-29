<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use Uuids;
    use HasFactory;
    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];  

    protected $fillable = [
        'amount',
        'transacted_by',
        'transaction_type_id',
        'user_id',
        'collector_id',
        'co_collector_id',
        'co_co_collector_id',
        'debt_id',
        'transaction_date',
        'note',
    ];

    public function transaction_type(){
        return $this->belongsTo(TransactionType::class);
    }
    public function debt(){
        return $this->belongsTo(Debt::class);
    }
    public function collector(){
        return $this->belongsTo(User::class, 'collector_id');
    }
    public function getPrincipalAttribute(){
        $p=$this->debt->percentage_amount_towards_principal;
        return $this->amount*($p/100);
    }
    public function getCostDistributionAttribute(){
        $amount=$this->amount;
        $bal=$this->debt()->balance;
        $principal_bal=$this->debt->principal_bal;

        $principal=0;
        $cost=0;
        $interest=0;
        $attorney=0;
        $overpayment=0;

        if($amount <= $principal_bal)
        {
            $principal=$amount;
        }
        elseif($amount > $principal_bal){
            $principal = $principal_bal;
            $interest = ('i');
        }
        return array([
            'principal'=>$principal,
            'interest'=>$interest,
            'cost'=>$cost,
            'attorney_fee'=>$attorney,
            'overpayment'=>$overpayment,
        ]);
    }
}
