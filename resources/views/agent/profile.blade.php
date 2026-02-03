@extends('admin.layouts.app')
@section('title', 'Agent - Profile')
@section('admin.content')
    <x-profile-page :user="Auth::user()" />
@endsection