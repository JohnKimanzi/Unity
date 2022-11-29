@if($leads->status='')
                            <span class="text-info" >New</span>
                        
                        @elseif($leads->status='cold')
                            <span class="text-danger">Pursue</span>
                        
                        @elseif($leads->status='warm')
                            <span class="text-warning">Interested</span>
                        
                        @elseif($leads->status='Hot')
                            <span class="text-success">Engage</span>
                        
                        @endif