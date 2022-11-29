<?php

namespace App\Imports;

use App\Models\BusinessType;
use App\Models\Lead;
use App\Models\State;
use Maatwebsite\Excel\Concerns\ToModel;

class LeadsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // function create_bs($name, ?bool $is_medical, ?string $description)
    private $rowCount = 0;
    protected $batch;
    public function __construct($batch)
    {
        $this->batch=$batch;
    }
    protected function get_or_create_bs($name)
    {
        // dd($name);
        $bs = BusinessType::whereRaw('lower(name) like (?)',["%{$name}%"] )->get()->first();
        
        if(empty($bs->exists)){
            $bs = BusinessType::create([
                'name'=>$name,
            ]);
        }
        // dd($bs->id);
        // return Redirect::route('calls.index');
        return $bs->id;
    }
    protected function get_state($name)
    {
        $state = State::whereRaw('lower(code) like (?)',["%{$name}%"] )->get()->first();
        try {
            if (empty($state->exists)) {
                $state = State::whereRaw('lower(name) like (?)',["%{$name}%"] )->first();
                // dd($state);
            }
           return $state->id;
        } catch (\Throwable $th) {
            throw $th;
            // dd($th) ;
        }
    }
    public function model(array $row)
    {
        // dd($this->batch->id);

        // only start after second row/ index[2]
        if ($this->rowCount>1) {
            // dd($row[0]);
            // $this->i++;
            $this->rowCount++;
            return new Lead([
                'name'=>$row[0],
                'business_type_id'=>$this->get_or_create_bs($row[1]),
                'phone1'=>$row[2],
                'phone2'=>$row[3],
                'email'=>$row[4],
                'state_id'=>$this->get_state($row[5]),
                'town'=>$row[6],
                'zip_code'=>$row[7],
                'address'=>$row[8],
                'status'=>$row[9],
                'batch_id'=>$this->get_batch_id(),
            ]);
        }
        
        else {
            $this->rowCount++;
            return null;
        }
    }
    public function getRowCount(): int
    {
        //sub 2 header rows
        return $this->rowCount-2;
    }
    protected function get_batch_id()
    {
        //sub 2 header rows
        if (isset($this->batch->id)) {
            return $this->batch->id;
        } else {
            $this->batch->save();
            return $this->batch->id;
        }
    }
}
