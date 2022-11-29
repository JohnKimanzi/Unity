@php
    $leads=App\Models\Lead::find(1)
@endphp
<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
    </div>
    <input type="text" class="form-control" readonly aria-label="Small" aria-describedby="inputGroup-sizing-sm"
        value="{{ $leads->name }}">
</div>

<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Category</span>
    </div>
    <input type="text" class="form-control" readonly aria-label="Small" aria-describedby="inputGroup-sizing-sm"
        value="{{ App\Models\BusinessType::find($leads->business_type_id)->name }}">
</div>
<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Date Onboarded</span>
    </div>
    <input type="text" class="form-control" readonly aria-label="Small" aria-describedby="inputGroup-sizing-md"
        value="{{ $leads->created_at }}">
</div>
<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Status</span>
    </div>
    <input type="text" class="form-control" readonly aria-label="Small" aria-describedby="inputGroup-sizing-sm"
        value="{{ $leads->status }}">
</div>
<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Nurture stage</span>
    </div>
    @if (strtolower($leads->status) == '')
        <input type="text" class="form-control text-info" readonly aria-label="Small"
            aria-describedby="inputGroup-sizing-sm" value="New">
    @elseif(strtolower($leads->status)=='cold'||$leads->status=='do not call'||$leads->status=='not interested')
        <input type="text" class="form-control text-danger" readonly aria-label="Small" value="Pursue"
            aria-describedby="inputGroup-sizing-sm">

    @elseif(strtolower($leads->status)=='warm')
        <input type="text" class="form-control text-warning" readonly aria-label="Small" value="Interested"
            aria-describedby="inputGroup-sizing-sm">

    @elseif(strtolower($leads->status)=='hot')
        <input type="text" class="form-control text-success" readonly aria-label="Small" value="Engage"
            aria-describedby="inputGroup-sizing-sm">
    @endif

</div>
