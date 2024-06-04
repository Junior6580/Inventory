@extends('layouts.master')

@section('content')
    @livewire('categories.category-edit', ['id' => $id])
@endsection
