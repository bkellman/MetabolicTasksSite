RUN_DIR=$1
DATA_DIR=$2

cd $RUN_DIR/workingDir
mkdir Analysis/
mkdir Analysis/Output/
mkdir Analysis/Input/
mkdir Analysis/Figures/
DATA_DIR=${DATA_DIR}/*
#docker run --rm --cpus="$NUM_CORES" -v "$RUN_DIR/workingDir":/workingdir -v "$DATA_DIR":/workingdir/Data "$IMAGE" /bin/bash -c "python -u /opt/PinAPL-Py/Scripts/PinAPL.py > /workingdir/output.log 2>&1 && chown -R www-data:www-data /workingdir"
#matlab -nodisplay -nosplash -nodesktop -r "config_file='{$RUN_DIR}/configuration.yaml'; /opt/MetabolicTasks/run.m" > "$RUN_DIR/status.log"
for filei in $DATA_DIR ; do
#	filei=${RUN_DIR}/workingdir/Data/${filei}
	echo $filei 
	cp $filei Analysis/Input/
	echo configuration.yaml
	/var/www/MATLAB/R2018a/bin/matlab -softwareopengl -nodisplay -nosplash -nodesktop -r "data_file='${filei}'; config_file='${RUN_DIR}/workingDir/configuration.yaml'; addpath(genpath('/var/www/MATLAB/lib/MetTasks/')); run; exit" 
done

#cp output.log Analysis/Configuration/
#cp configuration.yaml Analysis/Configuration/

#zip -r ${RUN_DIR}/archive.zip ${RUN_DIR}/workingDir/Analysis/

#zip -r ${RUN_DIR}/archive.zip ${RUN_DIR}/workingDir/Analysis/