@extends('layouts.app')
@section('content')

@guest
<div class="card position-fixed shadow p-3 mb-5 bg-white rounded login-panel">
    <img class="card-img-top" src="imgs/logo-wide.svg" alt="Optimus - Delivery">
    <div class="card-body">
        <login-form token="{{ csrf_token() }}"></login-form>
    </div>
</div>
@endguest

<script type="application/javascript">
</script>

@endsection
