@extends('errors::minimal')

@section('title', $exception->getMessage()?$exception->getMessage():'Sayfa Bulunamad─▒')
@section('code', '404')
@section('message', $exception->getMessage()?$exception->getMessage():'Sayfa Bulunamad─▒')
