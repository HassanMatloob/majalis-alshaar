@extends('admin.layouts.app')
@section('title', 'Agency - Profile')
@section('admin.content')
    <x-profile-page :user="Auth::user()" />
@endsection