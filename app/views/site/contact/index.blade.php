@extends('site.layouts.default')

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
<div class="row">
	<div class="col-md-12">
		<!-- Page Title -->
		<div class="row">
			<div class="col-md-12">
				<h4><strong>{{ String::title($page->title) }}</strong></h4>
			</div>
		</div>
		<!-- ./ page title -->

		<!-- Page Content -->
		<div class="row">
			<div class="col-md-12">
				<p>
					{{ String::tidy($page->content, 200) }}
				</p>
			</div>
		</div>
		<!-- ./ page content -->
	</div>
</div>

<hr />
@stop
