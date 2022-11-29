@component('mail::message')
# Hello, {{$recipient_name}},

This is to inform you that an new PTO application has just been created on Unity as below;

@component('mail::table')
|  Item                    |  Value                                 |
|:-------------------------|:---------------------------------------|
| **Employee ID**          | {{$pto->user->id}}                     |
| **Employee Name**        | {{$pto->user->name}}                   |
| **PTO Type**             | {{$pto->pto_type->name}}               |
| **Applied on**           | {{$pto->created_at}}                   | 
| **Effective dates**      | {{$pto->start_at." - ".$pto->end_at}}  |
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
