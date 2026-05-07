@extends('errors::layout')

@section('title', 'Unauthorized')
@section('code', '401')
@section('message', 'You need to be authenticated to access this area. Please log in to your account and try again.')
