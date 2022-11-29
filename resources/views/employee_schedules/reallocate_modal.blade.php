    <div class="modal custom-modal fade" id="re_allocation_modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Re-allocation</h3>
                        <p>Select schedule to re-allocate employee</p>
                    </div>
                    <div class="modal-btn">
                        <form id="employee_re_allocation_form" method="POST" >
                            @csrf
                            <div class=" form-group">
                                <select class="form-control" name="new_schedule_id" id="" required>
                                    <option value="" selected> </option>
                                    @forelse ($all_schedules as $one_schedule)
                                        <option value="{{$one_schedule->id}}">{{$one_schedule->name}}</option>
                                    @empty
                                        <option value="">No options! Contact Admin</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="submit-section">
                                <button role='submit' class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-6">
                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-warning cancel-btn">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $("#re_allocation_btn").on('click',function(e){
            user_id = $(this).data('id');
            try{
                $('#employee_re_allocation_form').get(0).setAttribute('action', "/employee_schedules/re_allocate_employee/"+user_id)
            }catch (error){
                console.log(error);
                alert('That didnt work! Refresh page and try again');
            }
        })
    </script>
        
    @endpush