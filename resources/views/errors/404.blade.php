@extends('errors::minimal')

@section('title', $exception->getMessage()?$exception->getMessage():'Sayfa Bulunamadı')
@section('code', '404')
@section('message', $exception->getMessage()?$exception->getMessage():'Sayfa Bulunamadı')
