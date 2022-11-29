<form action="{{route('transactions.store')}}" method="POST">
    @csrf
    <input type="hidden" value="{{$debt->id}}" name="debt_id">
    <div class="row filter-row">        
        <div class="col-md-6"> 
            <div class="form-group form-focus select-focus">
                @php
                    $types=App\models\TransactionType::all();
                @endphp
                <select class="form-control floating" required name='transaction_type_id'> 
                    <option value=""> -- Select -- </option>
                    @foreach ($types as $type)
                        <option value='{{$type->id}}'> {{$type->name}} </option>
                    @endforeach
                </select>
                <label class="focus-label">Description</label>
            </div>
        </div>
        <div class="col-md-6">  
            <div class="form-group form-focus  select-focus">
                <input type="number" class="form-control floating"  name="amount" required>
                <label class="focus-label">Amount</label>
            </div>
        </div>
        <div class="col-md-6">  
            <div class="form-group form-focus  select-focus">
                <input type="text" class="form-control floating" name="note">
                <label class="focus-label">Note/Ref number</label>
            </div>
        </div>
        
        <div class="col-md-6">  
            <div class="form-group form-focus  select-focus">
                <input type="text" class="form-control floating" name="transacted_by" value="{{old('transacted_by')}}">
                <label class="focus-label">Transacted By</label>
            </div>
        </div>

        <div class="col-md-6"> 
            <div class="form-group form-focus select-focus">
                @php
                    $collectors=App\Models\User::all();
                @endphp
                <select class="form-control floating" name='collector_id'> 
                    <option value=""> -- Select -- </option>
                    @foreach ($collectors as $collector)
                        <option value='{{$collector->id}}'> {{$collector->name}} </option>
                    @endforeach
                </select>
                <label class="focus-label">Collector</label>
            </div>
        </div>
        <div class="col-md-6"> 
            <div class="form-group form-focus select-focus">
                @php
                    $co_collectors=App\Models\User::all();
                @endphp
                <select class="form-control floating" name='co_collector_id'> 
                    <option value=""> -- Select -- </option>
                    @foreach ($co_collectors as $co_collector)
                        <option value='{{$co_collector->id}}'> {{$co_collector->name}} </option>
                    @endforeach
                </select>
                <label class="focus-label">Co_collector</label>
            </div>
        </div>
        <div class="col-md-6"> 
            <div class="form-group form-focus select-focus">
                @php
                    $co_co_collectors=App\Models\User::all();
                @endphp
                <select class="form-control floating" name='co_co_collector_id'> 
                    <option value=""> -- Select -- </option>
                    @foreach ($co_co_collectors as $co_co_collector)
                        <option value='{{$co_co_collector->id}}'> {{$co_co_collector->name}} </option>
                    @endforeach
                </select>
                <label class="focus-label">Co_co_collector</label>
            </div>
        </div>
     
        <div class="col-md-6">  
            <div class="form-group form-focus select-focus">
                <input class="form-control floating " type="date"  name="transaction_date">
                <label class="focus-label">Transaction Date</label>
            </div>
        </div>
        <div class="col-md-6">  
            <div class="form-group form-focus select-focus">
                <input class="form-control floating " type="text"  name="note">
                <label class="focus-label">Note</label>
            </div>
        </div>
       
        <div class="col-md-6">  
            <button role="submit" class="btn btn-success btn-block"> Save </button>  
        </div>     
    </div>
</form>