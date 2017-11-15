@extends('layouts.app')
@section('page-script')
<script type="text/javascript">
    //MENAMPILKAN PESAN
    @if (session()->has('pesan'))
		var delay = alertify.get('notifier','delay');
		alertify.set('notifier','delay', 10);
		alertify.success("{{ (string)Session::get('pesan') }}");
		alertify.set('notifier','delay', delay);
    @endif
</script>
@endsection