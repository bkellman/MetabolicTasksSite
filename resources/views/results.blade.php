@extends('layouts.master')
@section('content')
  <div class="row align-justify collapse">
    <div class="columns shrink"><h4>{{ $runName }}</h4></div>
    <div class="columns shrink">
      <a id="re-run" class="button warning bold" href="/rerun/{{ $hash }}" >Rerun With New Parameters</a>
      <a id="download-archive" class="button success bold" href="/run/download/{{ $hash }}" download>Download Results Archive</a>
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