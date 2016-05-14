{{-- Package Errors --}}
@if (count($errors) > 0)
<!-- Form Error List -->
<div class="alert alert-danger">
    <strong>{{ $errors->first('name') }}</strong>
</div>
@endif