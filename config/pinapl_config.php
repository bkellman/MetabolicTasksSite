<?php

return [
	"parameter_groups" =>[
		"Required" => [	
			"ThreshType" => [
				"display_name"=>"Gene Threshold",
				"default"=>"global",
				"placeholder"=>"Please select",
				"help_text"=>"Specifies the type of thresholding.",
				"in_quotes"=>true,
				"rules" => "string|required|in:global,local",
				"type"=> "select",
				"options" => ["global"=>"Global", "local"=>"Local"]
			],
			"SampleNumber" => [ 
				"display_name"=>"Number of Samples",
				"default"=> "0",
				"placeholder"=> "Please specify",
				"help_text"=>"number of samples",
				"in_quotes"=>false,
				"rules" => "numeric|required|min:1",
				"type"=>'number'
			]
		],
		"Global Parameters" => [	
			"percentile_or_value" => [
				"display_name"=>"Percentile or Value",
				"default"=>"percentile",
				"placeholder"=> "Please specify",
				"help_text"=>"Choose a thresholding method",
				"in_quotes"=>true,
				"rules" => "string|in:percentile,value",
				"type"=> "select",
				"options" => ["percentile"=>"percentile", "value"=>"value"]
			],
			"percentile" => [ 
				"display_name"=>"Percentile Threshold",
				"default"=> "25",
				"placeholder"=> "Percent (5-95%)",
				"help_text"=>"Enter the theshold percentile for gene retention",
				"in_quotes"=>false,
				"rules" => "numeric|min:5|max:95",
				"type"=>'number'
			],
			"percentileLow" => [ 
				"display_name"=>"Minimum Percentile",
				"default"=> "25",
				"placeholder"=> "Percent (0-95%)",
				"help_text"=>"Enter the minimum percentile for gene retention",
				"in_quotes"=>false,
				"rules" => "numeric|min:0|max:95",
				"type"=>'number'
			],
			"percentileHigh" => [ 
				"display_name"=>"Maximum Percentile",
				"default"=> "25",
				"placeholder"=> "Percent (5-100%)",
				"help_text"=>"Enter the maximum percentile for gene retention",
				"in_quotes"=>false,
				"rules" => "numeric|min:5|max:100",
				"type"=>'number'
			],
			"value" => [ 
				"display_name"=>"Threshold Expression Value",
				"default"=> "5",
				"placeholder"=> "Expression Value (1-1000)",
				"help_text"=>"Enter the theshold value for gene retention",
				"in_quotes"=>false,
				"rules" => "numeric|min:1|max:1000",
				"type"=>'number'
			],
			"valueLow" => [ 
				"display_name"=>"Minimum Expression Value",
				"default"=> "5",
				"placeholder"=> "Expression Value (1-100)",
				"help_text"=>"Enter the minimum value for gene retention",
				"in_quotes"=>false,
				"rules" => "numeric|min:1|max:100",
				"type"=>'number'
			],
			"valueHigh" => [ 
				"display_name"=>"Maximum Expression Value",
				"default"=> "5",
				"placeholder"=> "Expression Value (1-10000)",
				"help_text"=>"Enter the maximum value for gene retention",
				"in_quotes"=>false,
				"rules" => "numeric|min:1|max:10000",
				"type"=>'number'
			]
		],
		"Local Parameters" => [	
			"EnoughSamples" => [
				"display_name"=>"3 or more samples?",
				"default"=>"no",
				"placeholder"=>"Please select",
				"help_text"=>"Only use local thresholding with 3 or more samples",
				"in_quotes"=>true,
				"rules" => "string|in:yes,no",
				"type"=> "select",
				"options" => ["yes"=>"Yes", "no"=>"No"]
			],
			"LocalThresholdType" => [
				"display_name"=>"Local Threshold Method",
				"default"=>"MinMaxMean",
				"placeholder"=>"Please select",
				"help_text"=>"Please select a local thresholding method",
				"in_quotes"=>true,
				"rules" => "string|in:minmaxmean,mean,custom",
				"type"=> "select",
				"options" => ["minmaxmean"=>"MinMaxMean", "mean"=>"Mean","custom"=>"Custom"]
			],
		]
	],
	"directories"=> 
		"WorkingDir: '/workingdir/'\n".
		"DataDir: '/workingdir/Data/'\n".
		"TempDataDir: '/workingdir/TempData/'\n".
		"LibDir: '/workingdir/Library/'\n".
		"IndexDir: '/workingdir/Library/Bowtie2_Index/'\n".
		"ScriptsDir: '/opt/PinAPL-Py/Scripts/'\n".
		"AlignDir: '/workingdir/Alignments/'\n".
		"AnalysisDir: '/workingdir/Analysis/'\n".
		"TrimLogDir: '/workingdir/Analysis/Read_Trimming'\n".
		"HitDir: '/workingdir/Analysis/sgRNA_Rankings'\n".
		"GeneDir: '/workingdir/Analysis/Gene_Rankings'\n".
		"ControlDir: '/workingdir/Analysis/Control/'\n".
		"HeatDir: '/workingdir/Analysis/Heatmap/'\n".
		"AlnQCDir: '/workingdir/Analysis/Alignment_Statistics/'\n".
		"CountQCDir: '/workingdir/Analysis/ReadCount_Statistics/'\n".
		"ScatterDir: '/workingdir/Analysis/ReadCount_Scatterplots/'\n".
		"HiLiteDir: '/workingdir/Analysis/ReadCount_Scatterplots/Highlighted_Genes/'\n".
		"CorrelDir: '/workingdir/Analysis/Replicate_Correlation/'\n".
		"HiLiteDir2: '/workingdir/Analysis/Replicate_Correlation/Highlighted_Genes'\n".
		"EffDir: '/workingdir/Analysis/sgRNA_Efficacy/'\n".
		"DepthDir: '/workingdir/Analysis/Read_Depth/'\n".
		"SeqQCDir: '/workingdir/Analysis/Sequence_Quality/'\n".
		"pvalDir: '/workingdir/Analysis/p-values/' \n".
		"LogFileDir: '/workingdir/Analysis/Log_File/'\n".
		"bw2Dir: '/usr/bin/'\n".
		"CutAdaptDir: '/root/.local/bin/'   \n".
		"STARSDir: '/opt/PinAPL-Py/Scripts/STARS_mod/'\n"
	,
	"script_filenames" => 
		"SanityScript: 'CheckCharacters'\n".
		"IndexScript: 'BuildLibraryIndex'\n".
		"LoaderScript: 'LoadDataSheet'\n".
		"ReadDepthScript: 'PlotNumReads'\n".
		"SeqQCScript: 'CheckSequenceQuality'\n".
		"TrimScript: 'TrimReads'\n".
		"AlignScript: 'AlignReads'\n".
		"NormalizeScript: 'NormalizeReadCounts'\n".
		"AverageCountsScript: 'AverageCounts'\n".
		"StatsScript: 'AnalyzeReadCounts'\n".
		"ControlScript: 'AnalyzeControl'\n".
		"sgRNARankScript: 'FindHits'\n".
		"GeneRankScript: 'RankGenes'\n".
		"CombineScript: 'CombineGeneRanks'\n".
		"ScatterScript: 'PlotCounts'\n".
		"ReplicateScript: 'PlotReplicates'\n".
		"ClusterScript: 'PlotHeatmap'\n"
	,
	"libraries" => [
		"Activity-optimized_human_genome-wide.tsv" => "Activity-optimized human genome-wide",
		"Brie_Genome-wide_including_Controls.tsv" => "Brie Mouse genome-wide",
		"Brie_Kinome.tsv" => "Brie Mouse kinome",
		"Brunello_genome-wide.tsv" => "Brunello human genome-wide",
		"Brunello_kinome_guides1-4.tsv" => "Brunello human kinome (guides 1-4)",
		"Brunello_kinome_guides5-8.tsv" => "Brunello human kinome (guides 5-8)",
		"Brunello_kinome_guides1-4&5-8.tsv" => "Brunello human kinome (guides 1-4&5-8)",
		"GeCKOv2_Human.tsv" => "Human GeCKO v2 (Full)",
		"Human_GeCKOv2_Library_A.csv" => "Human GeCKO v2 (Half_A)",
		"Human_GeCKOv2_Library_B.csv" => "Human GeCKO v2 (Half_B)",
		"GeCKOv21_Human.tsv" => "Human GeCKO v2 (Full, NonTargeting duplicates removed)",
		"Human_improved_genome-wide_KnockOut_v1.tsv" => "Human improved genome-wide Knockout v1",
		"GeCKOv2_Mouse.csv" => "Mouse GeCKO v2 (Full)",
		"Mouse_GeCKOv2_Library_A.csv" => "Mouse GeCKO v2 (Half_A)",
		"Mouse_GeCKOv2_Library_B.csv" => "Mouse GeCKO v2 (Half_B)",
		"Mouse_improved_genome-wide_KnockOut_v2.tsv" => "Mouse improved genome-wide KnockOut v2",
		"Oxford_genome-wide.tsv" => "Oxford Drosophila genome-wide",
		"Toronto_KnockOut_genome-wide_base.tsv" => "Toronto KnockOut (Base Library)",
		"Toronto_KnockOut_genome-wide_base&supplemental.csv" => "Toronto KnockOut (Base & Supplemental Library)",
		"Toronto_KnockOut_genome-wide_supplemental.tsv" => "Toronto KnockOut (Supplemental Library)",
	]
];


/*
	
		"ArgName" => [
			"default"=>"ArgDefault",
			"help_text"=>"ArgHelpText",
			"in_quotes"=>true,
			"hidden" =>false,
			"rules" => ""
		],

 */