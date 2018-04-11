@php
	$title = "Configure your analysis run";
	$description = "Please choose your <b>expression preprocessing:</b><br>
	<ul>
		<li>global: threshold of expression is unique and defined based on a percentile computed from the distribution of the gene expression or value directly provided by the users</li>
		<li>local: each gene is associated with is own expression threshold. It can be computed using different rules (e.g., mean of gene value across the samples, ...)</li>
	</ul>
	<b>Note:</b> the type of thresholding available to the users will depend on the number of sample available (e.g. local thresholding approach will only be available when expression data associated with at least 3 different samples ar provided). <br>
	<b>Min/Max Means Rule:</b> For each gene the activity threshold is defined by the mean value of the expression over all the samples available. BUT, the threshold need to be higher or equal the 25th percentile (global threshold), AND it should be lower or equal to the 75th percentile (global threshold).;</li>
	<b>Number of Samples:</b> Local Thresholding requires at least 3 samples.
	"
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

<div class="row">
	<div class="columns">
		<ul class="accordion" data-accordion data-allow-all-closed="true">
			<li class="accordion-item" data-accordion-item>
				<a class="accordion-title" href="#">Global Threshold Options</a>
				<div id="global-options-panel" class="accordion-content" data-tab-content>
					@foreach (config('pinapl_config.parameter_groups.Global Parameters') as $paramName => $parameter)
						@include('layouts.input',["name" => $paramName, "parameter"=>$parameter, "required"=>false])
					@endforeach
				</div>
			</li>
		</ul>
	</div>
</div>

<div class="row">
	<div class="columns">
		<ul class="accordion" data-accordion data-allow-all-closed="true">
			<li class="accordion-item" data-accordion-item>
				<a class="accordion-title" href="#">Local Threshold Options</a>
				<div id="local-options-panel" class="accordion-content" data-tab-content>
					@foreach (config('pinapl_config.parameter_groups.Local Parameters') as $paramName => $parameter)
						@include('layouts.input',["name" => $paramName, "parameter"=>$parameter, "required"=>false])
					@endforeach
					<div class="column medium-3">
						<label for="custom-lib-file">Custom Library File</label>
						<input type="file" id="custom-lib-file" name="custom-lib-file" required="false" disabled="true" accept=".csv, .tsv">
					</div>
				</div>
			</li>
		</ul>
	</div>
</div>


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
$("#LocalThresholdType-input").change(function function_name(argument) {
	if (this.value == "custom") {
		$("#custom-lib-file").attr('disabled',false)
		$("#custom-lib-file").slideDown();
	}
	else {
		$("#custom-lib-file").slideUp();
		$("#custom-lib-file").attr('disabled',true)
	}
});

$("#ThreshType-input").change(function function_name(argument) {
	if (this.value == "global") {
		$("#global-options-panel").attr('disabled',false)
		$("#global-options-panel").slideDown();
		$("#local-options-panel").slideUp();
		$("#local-options-panel").attr('disabled',true)
	}
	else {
		$("#local-options-panel").attr('disabled',false)
		$("#local-options-panel").slideDown();
		$("#global-options-panel").slideUp();
		$("#global-options-panel").attr('disabled',true)
	}
});

$("#SampleNumber-input").change(function function_name(argument) {
	if(this.value < 3){
		$("#global-options-panel").attr('disabled',false)
		$("#global-options-panel").slideDown();
		$("#local-options-panel").slideUp();
		$("#local-options-panel").attr('disabled',true)
	}
});

$("#percentile_or_value-input").change(function function_name(argument) {
	if(this.value == 'percentile'){
		$("#percentile-input").attr('disabled',false)
		$("#percentileHigh-input").attr('disabled',false)
		$("#percentileLow-input").attr('disabled',false)
		$("#value-input").attr('disabled',true)
		$("#valueHigh-input").attr('disabled',true)
		$("#valueLow-input").attr('disabled',true)
	} else{
		$("#percentile-input").attr('disabled',true)
		$("#percentileHigh-input").attr('disabled',true)
		$("#percentileLow-input").attr('disabled',true)
		$("#value-input").attr('disabled',false)
		$("#valueHigh-input").attr('disabled',false)
		$("#valueLow-input").attr('disabled',false)
	}
});

$("#EnoughSamples-input").change(function function_name(argument) {
	if(this.value == 'yes'){
		$("#LocalThresholdType-input").attr('disabled',false)
		$("#custom-lib-file").attr('disabled',false)
	} else{
		$("#LocalThresholdType-input").attr('disabled',true)
		$("#custom-lib-file").attr('disabled',true)
	}
});


</script>
@stop