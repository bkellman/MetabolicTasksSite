@extends('layouts.master')

@section('customScripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js"></script>
    <script>
      d3.csv("score.csv", function (myArrayOfObjects){
        myArrayOfObjects.forEach(function (d){
          console.log(d);
        });
      });
    </script>
@parent
@stop