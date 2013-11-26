@extends('site.layouts.home')

{{-- Web site Title --}}
@section('title')
{{{ String::title($page->title) }}} ::
@parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')
{{{ String::title($page->meta_title) }}} ::
@stop

{{-- Update the Meta Description --}}
@section('meta_description')
{{{ String::title($page->meta_description) }}}
@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
{{{ String::title($page->meta_keywords) }}}
@stop

{{-- Content --}}
@section('content')
{{ $page->content }}
@stop
