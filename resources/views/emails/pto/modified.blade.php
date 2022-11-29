@component('mail::message')
# Hello, {{$recipient_name}},

This is to inform you that a PTO application that might be of interest to you has been modified on Unity as below;

@component('mail::table')
|  Item                    |  Value                                 |
|:-------------------------|:---------------------------------------|
| **Employee ID**          | {{$pto->user->id}}                     |
| **Employee Name**        | {{$pto->user->name}}                   |
| **PTO Type**             | {{$pto->pto_type->name}}               |
| **Applied on**           | {{$pto->created_at}}                   | 
| **Status**               | {{$pto->status}}                       |
| **Effective**            | {{$pto->start_at." - ".$pto->end_at}}  |
| **Updated on**           | {{$pto->updated_at}}                   |
| **Updated by**           | {{$pto->updated_by->name ?? 'n/a'}}    |
| **Comments**             | {{$pto->comments}}                     |

@endcomponent

@if($pto->has_attachment)
# Below find the attached file(s)

@endif

@component('mail::button', ['url' => route('pto.show', $pto->id)])
View on Unity
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
