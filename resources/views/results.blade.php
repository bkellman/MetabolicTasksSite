@extends('layouts.master')
@section('content')
  <div class="row align-justify collapse">
    <div class="columns shrink"><h4>{{ $runName }}</h4></div>
    <div class="columns shrink">
      <a id="re-run" class="button warning bold" href="/rerun/{{ $hash }}" >Rerun With New Parameters</a>
      <a id="download-archive" class="button success bold" href="/run/download/{{ $hash }}" download>Download Results Archive</a>
      @if ($hash == "example-run")
        <a id="download-example-data" class="button success bold" href="/example-data" download>Download Example Data</a>
      @endif
    </div>
    <div>
      @if ($hash == "example-run")
        <p> We used the Human Protein Atlas (RNA-seq data of 20344 genes across 32 different human tissues; Ulhen 2015) in combination with Recon2.2 as example of how to use Cellfie to infer metabolic functions from transcriptomic data.</p>
      @endif
    </div>
  </div>


<div>
  <div class="align-middle">
    <h3>Distribution of Normalized Expression Values</h3>
    <img src='{{"/run-images?path=".urlencode("/$hash/workingDir/Analysis/Figures/histogram.png")}}'>
  </div>
  <div class="align-middle">
    <h3>Dendrogram of Samples</h3>
    <img src='{{"/run-images?path=".urlencode("/$hash/workingDir/Analysis/Figures/score_bin_dendro.png")}}'>
  </div>
  <div class="align-middle">
    <h3>Heatmap of Tasks by Sample</h3>
    <p>download results (green button at the top of the page) for complete description of active tasks</p>
    <img src='{{"/run-images?path=".urlencode("/$hash/workingDir/Analysis/Figures/score_bin_heatmap.png")}}'>
  </div>
</div>

@stop