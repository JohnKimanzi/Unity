
    @if(count($debts)>0)
        @foreach($debts as $debt)		
            <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                <div class="profile-widget">
                    <form action="{{ route('debts.destroy',$debt->id) }}" method="POST">
                        <div class="profile-img">
                            <a href="{{ route('debts.show',$debt->id)}}" class="avatar"><img src="{{ asset('/img/user.jpg') }}" alt="user image"></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                            <div class="dropdown-menu dropdown-menu-right">

                                <a class="dropdown-item" href="{{ route('debts.edit',$debt->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item" href="#"><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                {{-- <a class="dropdown-item" href="#" data-catid={{$debt->id}}  data-toggle="modal" data-target="#delete_debtor"><i class="fa fa-trash-o m-r-5"></i> Delete</a> --}}
                                
                                
                                {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_debtor"><i class="fa fa-pencil m-r-5"></i> Edit</a> --}}
                                
                            </div>
                        </div>
                    </form>
                    <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="{{route('debts.show',$debt)}}">{{$debt->primary_debtor->first()->name}}</a></h4>


                    {{-- <div class="small text-muted">{{ $debt->principal }}</div> --}}

                </div>
            </div>
        @endforeach
    @else($debts)
        <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
            <div class="profile-widget">
                {{('There are no records at this time')}}
            </div>
        </div>
    @endif
