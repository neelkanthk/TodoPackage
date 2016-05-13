{{-- Package session flash messages --}}
@if(Session::has('todopackage_session_flash'))
<div id="session_flash" class="alert alert-{{ Session::get('todopackage_session_flash_class') }}" role="alert">
    {{ Session::get('todopackage_session_flash') }}
</div>
@endif