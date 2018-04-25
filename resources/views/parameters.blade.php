@php
	$title = "Configure your analysis run";
	$description = "Please choose your the <b>options for the definition of gene activity threshold:</b>
	<ul>
		<li><b>global</b>: the threshold value is the same for all the genes.
			<ul>
			<li><b>value</b> - the user provide the expression value for which a gene is considered as active or not</li>
			<li><b>percentile</b> - the threshold is defined based on a percentile computed from the distribution of expression values for all the genes and across all samples of the user dataset</li>
			</ul>
		</li>
		<li><b>local</b>: the threshold value is different for all the genes
			<ul>
				<li><b>Mean</b> - the threshold for a gene is defined as the mean expression value of this gene across all the samples, tissues, or conditions (option only available if more than 3 samples are provided by the user).</li>
				<li><b>MinMaxMean</b> - the threshold for a gene is determined by the mean of expression values observed for that gene among all the samples, tissues, or conditions BUT the threshold :(i) must be higher or equal to a lower bound and (ii) must be lower or equal to an upper bound. The lower an upper bound can be defined using a <b>value</b> introduced by the user or based on a <b>percentile</b> of the distribution of expression value for all the genes and across all samples of your dataset (option only available if more than 3 samples are provided by the user).</li>
				<li><b>Custom</b> – (UNDER CONSTRUCTION) the user provide the list of threshold value associated to each gene. This option allows user to use the local threshold approach even if their dataset present less than 3 samples.</li>
			</ul>
		</li>
	</ul>"

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
// $("#LocalThresholdType-input").change(function function_name(argument) {
// 	if (this.value == "custom") {
// 		$("#custom-lib-file").attr('disabled',false)
// 		$("#custom-lib-file").slideDown();
// 	}
// 	else {
// 		$("#custom-lib-file").slideUp();
// 		$("#custom-lib-file").attr('disabled',true)
// 	}
// });

$("#ThreshType-input").change(function function_name(argument) {
	if (this.value == "global") {
		$("#global-options-panel").attr('disabled',false)
		$("#global-options-panel").slideDown();
		$("#local-options-panel").slideUp();
		$("#local-options-panel").attr('disabled',true)

	}else {
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

$("#LocalThresholdType-input").change(function function_name(argument) {
	if(this.value == 'MinMaxMean'){
		$("#percentile_or_value_local-input").attr('disabled',false)
		$("#custom-lib-file").attr('disabled',true)
	}else if(this.value == 'Custom'){
		$("#custom-lib-file").attr('disabled',false)
		$("#percentile_or_value_local-input").attr('disabled',true)
	}else if(this.value=='Mean'){
		$("#percentile_or_value_local-input").attr('disabled',true)
		$("#custom-lib-file").attr('disabled',true)
	}

});

$("#percentile_or_value-input").change(function function_name(argument) {
	if(this.value == 'percentile'){
		$("#percentile-input").attr('disabled',false)
		$("#value-input").attr('disabled',true)
	} else{
		$("#percentile-input").attr('disabled',true)
		$("#value-input").attr('disabled',false)
	}
});

$("#percentile_or_value_local-input").change(function function_name(argument) {
	if(this.value == 'percentile'){
		$("#percentileHigh-input").attr('disabled',false)
		$("#percentileLow-input").attr('disabled',false)
		$("#valueHigh-input").attr('disabled',true)
		$("#valueLow-input").attr('disabled',true)
	} else{
		$("#percentileHigh-input").attr('disabled',true)
		$("#percentileLow-input").attr('disabled',true)
		$("#valueHigh-input").attr('disabled',false)
		$("#valueLow-input").attr('disabled',false)
	}
});


// $("#EnoughSamples-input").change(function function_name(argument) {
// 	if(this.value == 'yes'){
// 		$("#LocalThresholdType-input").attr('disabled',false)
// 		$("#percentile_or_value_local-input").attr('disabled',false)
// 		$("#percentileHigh-input").attr('disabled',false)
// 		$("#percentileLow-input").attr('disabled',false)
// 		$("#valueHigh-input").attr('disabled',false)
// 		$("#valueLow-input").attr('disabled',false)

// 	} else{
// 		$("#LocalThresholdType-input").attr('disabled',true)
// 		$("#percentile_or_value_local-input").attr('disabled',true)
// 		$("#percentileHigh-input").attr('disabled',true)
// 		$("#percentileLow-input").attr('disabled',true)
// 		$("#valueHigh-input").attr('disabled',true)
// 		$("#valueLow-input").attr('disabled',true)
// 	}
// });


</script>
@stop