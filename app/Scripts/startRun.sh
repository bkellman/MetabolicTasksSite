#!/bin/bash

#IMAGE="$1"
RUN_DIR="$1"
DATA_DIR="$2"
#NUM_CORES="$4"
echo "$RUN_DIR"
echo "Start Run Script Started"
echo "running" > $RUN_DIR/status.log
cd $RUN_DIR
DATA_DIR=${DATA_DIR}/*
#docker run --rm --cpus="$NUM_CORES" -v "$RUN_DIR/workingDir":/workingdir -v "$DATA_DIR":/workingdir/Data "$IMAGE" /bin/bash -c "python -u /opt/PinAPL-Py/Scripts/PinAPL.py > /workingdir/output.log 2>&1 && chown -R www-data:www-data /workingdir"
#matlab -nodisplay -nosplash -nodesktop -r "config_file='{$RUN_DIR}/configuration.yaml'; /opt/MetabolicTasks/run.m" > "$RUN_DIR/status.log"
for filei in $DATA_DIR ; do
#	filei=${RUN_DIR}/workingdir/Data/${filei}
	echo $filei 
	/var/www/MATLAB/R2018a/bin/matlab -softwareopengl -nodisplay -nosplash -nodesktop -r "data_file='${filei}' ;config_file='${RUN_DIR}/workingdir/configuration.yaml'; addpath(genpath('/home/ben/Documents/MetTasks/')); run" > "${RUN_DIR}/status.log"
done


echo "finished" > "$RUN_DIR/status.log"
