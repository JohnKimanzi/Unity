
<!-- Bootstrap Core JS -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>


<script src="{{asset('assets/js/flipper.js')}}"></script>
{{-- <script src="{{asset('assets/js/lead_status.js')}}"></script> --}}

<!-- Slimscroll JS -->
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

<!-- Select2 JS -->
<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>
{{-- <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script> --}}
<script src="{{asset('assets/libs/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.ui.touch-punch.min.js')}}"></script>

<!-- Datetimepicker JS -->
<script src="{{asset('assets/libs/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Calendar JS -->
{{-- <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script> --}} {{--Replica--}}
<script src="{{asset('assets/libs/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{asset('assets/libs/fullcalendar/jquery.fullcalendar.js')}}"></script>

<!-- Multiselect JS -->
<script src="{{asset('assets/js/multiselect.min.js')}}"></script>
<script src="{{asset('assets/js/printer.js')}}"></script>

<!-- Datatable JS -->
{{-- <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script> --}}
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
{{-- <script src="{{asset('assets/js/table.js')}}"></script> --}}
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
<!-- Summernote JS -->
<script src="{{asset('assets/libs/summernote/summernote-bs4.min.js')}}"></script>

{{-- Fullcalendar --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

<!-- Chart JS -->
@if(Route::is(['jobs-dashboard','user-dashboard']))
			
<script src="{{asset('assets/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/line-chart.js')}}"></script>
@endif

@if(Route::is('dashboard','home'))
<script src="{{asset('assets/libs/morris/morris.min.js')}}"></script>
<script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/js/chart.js')}}"></script>
@endif

<script src="{{asset('assets/libs/sticky-kit/sticky-kit.min.js')}}"></script>

<!-- Task JS -->
<script src="{{asset('assets/js/task.js')}}"></script>

<!-- Dropfiles JS
			<script src="{{asset('assets/js/dropfiles.js')}}"></script> -->

{{-- tiny mce --}}
{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}

{{-- CKEDITOR --}}

{{-- <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> --}}

<!-- Custom JS -->
<script src="{{asset('assets/js/app.min.js')}}"></script>

{{-- chris --}}
<script src="{{asset('js/custom.js')}}"></script>

{{-- Alex --}}
{{-- <script src="{{asset('js/lead.js')}}"></script> --}}
<!-- Lead Management -->
<script src="{{asset('js/lead.js')}}"></script>
<script src="{{asset('js/profile.js')}}"></script>

<script src="{{asset('js/mark_design.js')}}"></script>

<script>
	$(document).ready(function(){
		// Read value on page load
		$("#result b").html($("#customRange").val());

		// Read value on change
		$("#customRange").change(function(){
			$("#result b").html($(this).val());
		});
	});        
	$(".header").stick_in_parent({
		
	});
	// This is for the sticky sidebar    
	$(".stickyside").stick_in_parent({
		offset_top: 60
	});
	$('.stickyside a').click(function() {
		$('html, body').animate({
			scrollTop: $($(this).attr('href')).offset().top - 60
		}, 500);
		return false;
	});
	// This is auto select left sidebar
	// Cache selectors
	// Cache selectors
	var lastId,
		topMenu = $(".stickyside"),
		topMenuHeight = topMenu.outerHeight(),
		// All list items
		menuItems = topMenu.find("a"),
		// Anchors corresponding to menu items
		scrollItems = menuItems.map(function() {
			var item = $($(this).attr("href"));
			if (item.length) {
				return item;
			}
		});

	// Bind click handler to menu items


	// Bind to scroll
	$(window).scroll(function() {
		// Get container scroll position
		var fromTop = $(this).scrollTop() + topMenuHeight - 250;

		// Get id of current scroll item
		var cur = scrollItems.map(function() {
			if ($(this).offset().top < fromTop)
				return this;
		});
		// Get the id of the current element
		cur = cur[cur.length - 1];
		var id = cur && cur.length ? cur[0].id : "";

		if (lastId !== id) {
			lastId = id;
			// Set/remove active class
			menuItems
				.removeClass("active")
				.filter("[href='#" + id + "']").addClass("active");
		}
	});
	// $(function () {
	// 	$(document).on("click", '.btn-add-row', function () {
	// 		var id = $(this).closest("table.table-review").attr('id');  // Id of particular table
	// 		console.log(id);
	// 		var div = $("<tr />");
	// 		div.html(GetDynamicTextBox(id));
	// 		$("#"+id+"_tbody").append(div);
	// 	});
	// 	$(document).on("click", "#comments_remove", function () {
	// 		$(this).closest("tr").prev().find('td:last-child').html('<button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button>');
	// 		$(this).closest("tr").remove();
	// 	});
	// 	function GetDynamicTextBox(table_id) {
	// 		$('#comments_remove').remove();
	// 		var rowsLength = document.getElementById(table_id).getElementsByTagName("tbody")[0].getElementsByTagName("tr").length+1;
	// 		return '<td>'+rowsLength+'</td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><input type="text" name = "DynamicTextBox" class="form-control" value = "" ></td>' + '<td><button type="button" class="btn btn-danger" id="comments_remove"><i class="fa fa-trash-o"></i></button></td>'
	// 	}
	// });
	$(function() {
		$('.alert').delay(500).fadeIn('normal', function() {
			$(this).delay(3500).fadeOut();
		});
	});

	//Display push notification
	// $(function(){
	// 	//check if session variable for notification is set
	// 	var send_noti='{{Session::has('send_noti')}}';
	// 	if(send_noti){
	// 		Push.create("Check on your call backs!", {
	// 			body: "You have scheduled call backs?",
	// 			icon: '{{asset('img/notification.jpg')}}',
	// 			timeout: 8000,
	// 			onClick: function () {
	// 				window.focus();
	// 				this.close();
	// 			}
	// 		});
	// 	}
	// 	// unset session variable after successifuly displaying noti
	// 	var unset_noti='{{Session::forget('send_noti')}}';
	// });
		
</script>
@stack('scripts')