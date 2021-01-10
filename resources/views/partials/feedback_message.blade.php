@if(Session::has('success'))
<div class="alert alert-success alert-dismissable" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong></strong> {{ Session::get('success') }}
</div>
@endif

@if(Session::has('errors'))
<div class="alert alert-danger alert-dismissable" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong></strong> {{ __('views.pages.common.error_occurred') }}
</div>
@endif