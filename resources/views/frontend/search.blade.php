@extends('layouts.frontend.app')
@push('css')
@endpush
@section('content')
<style>
	.section-padding-02 {
		margin-top: 0 !important;
	}

	.h-margin {
		margin-top: 65px;
	}

	.Pagination {
		gap: 10px;
	}
</style>
<!-- Courses Start -->
@livewire('frontend.search', ['lat' => $lat, 'long' => $long, 'location'=>$location]);
<!-- Courses End -->
@endsection
@push('js')
@endpush