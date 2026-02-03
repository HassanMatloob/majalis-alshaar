@extends('admin.layouts.app')
@section('title', 'Admin - Profile')
@section('admin.content')
    <x-profile-page :user="Auth::user()" />
@endsection