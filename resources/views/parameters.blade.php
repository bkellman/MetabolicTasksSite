@php
	$title = "Configure your analysis run";
	$description = "Please choose your <b>expression preprocessing:</b><br>
	<ul>
		<li>global: threshold of expression is unique and defined based on a percentile computed from the distribution of the gene expression or value directly provided by the users</li>
		<li>local: each gene is associated with is own expression threshold. It can be computed using different rules (e.g., mean of gene value across the samples, ...)</li>
	</ul>
	<b>Note:</b> the type of thresholding available to the users will depend on the number of sample available (e.g. local thresholding approach will only be available when expression data associated with at least 3 different samples ar provided). <br>
	<b>Min/Max Means Rule:</b> For each gene the activity threshold is defined by the mean value of the expression over all the samples available. BUT, the threshold need to be higher or equal the 25th percentile (global threshold), AND it should be lower or equal to the 75th percentile (global threshold).;"
@endphp
@extends('layouts.master',["title"=>$title, "description"=>$description])
@section('before_title')
<div class="row collapse">
  <div class="columns small-12">
		<img src="/img/StatusBar_4.png">
	</div>
</div>
@stop
@section('content')
<form action="/run/start/{{$hash}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<fieldset>
	<legend>Project Parameters</legend>
	<div class="row align-bottom medium-unstack">
	@foreach (config('pinapl_config.parameter_groups.Required') as $paramName => $parameter)
		@include('layouts.input',["name" => $paramName, "parameter"=>$parameter, "required"=>true])
	@endforeach
	</div>
</fieldset>
<fieldset>
	<legend>Global Threshold Parameters</legend>
	<div class="row">
		@foreach (config('pinapl_config.parameter_groups.Global Parameters') as $paramName => $parameter)
			@include('layouts.input',["name" => $paramName, "parameter"=>$parameter, "required"=>false])
		@endforeach
	</div>
</fieldset>
<fieldset>
	<legend>Local Threshold Parameters</legend>
	<div class="row">
		@foreach (config('pinapl_config.parameter_groups.Local Parameters') as $paramName => $parameter)
			@include('layouts.input',["name" => $paramName, "parameter"=>$parameter, "required"=>false])
		@endforeach
		<div class="column medium-3">
			<label for="custom-thresh-file">Custom Threshold File: (col1: gene name, col2: value threshold)</label>
			<input type="file" id="custom-thresh-file" name="custom-thresh-file" required="false" accept=".csv, .tsv">
		</div>
	</div>
</fieldset>

<div class="row align-right">
	<div class="column shrink">
		<input type="submit" value="Start Run" class="button success">
	</div>
</div>
</form>
@stop
@section('customCSS')

@stop
@section('customScripts')
<script type="text/javascript">
$("#LibFilename-input").change(function function_name(argument) {
	if (this.value == "custom") {
		$("#custom-library-fields").attr('disabled',false)
		$("#custom-library-fields").slideDown();
	}
	else {
		$("#custom-library-fields").slideUp();
		$("#custom-library-fields").attr('disabled',true)
	}
});
$('#sgRNALength-input').change(function(){
   $('#AS_min-input').val(this.value * 2);
});
</script>
@stop