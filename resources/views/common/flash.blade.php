@if(Session::has('flash_message'))
	<div class="alert alert-custom alert-notice alert-light-{{ Session::get('flash_message_level') }} fade show" role="alert">
		<div class="alert-icon"><i class="flaticon-warning"></i></div>
		<div class="alert-text">{{ Session::get('flash_message') }}</div>
		@if(Session::get('flash_message_dismissible'))
		<div class="alert-close">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"><i class="ki ki-close"></i></span>
			</button>
		</div>
		@endif
	</div>
@endif
