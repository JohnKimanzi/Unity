<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Debt extends Model
{
    use HasFactory;
    Use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at','received_date','deliquency_date'];  
    
    protected $fillable = [
        'code',
        // 'current_balance',
        'principal',
        'cost',
        'service_fee',
        'overpayment',
        'interest',
        'attorney_fees',
        'percentage_charge',
        'deliquency_date',
        'received_date',
        'status',
        'linked_debt_id',
        'client_id',
        'collector_id',
    ];

    public function notes(){
        return $this->morphMany(Note::class, 'notable');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function getTotalPaidAttribute(){
        return $this->payments->sum('amount');
    }

    public function action_codes(){
        return $this->morphToMany(ActionCode::class, 'actionable');
    }//returns all action codes

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function debtors(){
        return $this->belongsToMany(Debtor::class)->withPivot('tag');
    }

    public function clients(){
        return $this->belongsToMany(Client::class)->withTimestamps();
    }

    public function collector(){
        return $this->belongsTo(User::class);
    }

    public function getCoDebtorsAttribute(){
        // return $this->hasMany(CoDebtor::class);// removed co-debor connection
        return $this->debtors->whereIn('id', DB::table('debt_debtor')->where('debt_id', $this->id)->where('tag', 'like', 'primary')->get()->pluck('debtor_id'));    
    }

    public function getPrimaryDebtorAttribute(){
        
        // // $debtors=DB::table('debt_debtor')->where('debt_id', $this->id)->where('tag', 'like', 'primary')->get();
        // $pd= $this->debtors()->withPivot('tag')->where('tag', 'like', '%primary%')->first();
        // // dd($pd);
        
        $pd=$this->debtors()->withPivot('tag')->where('tag','like','%primary')->first();
        return $pd;
    }

    // cost distribution
    public function getPercentageAmountTowardsPrincipalAttribute(){
        return 100;
        // 100 untill p is fully settled
    }
    public function getPercentageAmountTowardsInterestAttribute(){
        return 0; 
        // zero if principal isnt fully settled
    }
    public function getPercentageAmountTowardsCostAttribute(){
        return 0; 
        // zero if principal isnt fully settled
    }
    
    // amount sharing
    public function getPercentageAmountTowardsClientAttribute(){
        return 0; 
        // zero if principal isnt fully settled
    }
    
    public function getPercentageAmountTowardsAgencyAttribute(){
        return 0; 
        // zero if principal isnt fully settled
    }
    
}
