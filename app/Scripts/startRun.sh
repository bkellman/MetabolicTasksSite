#!/bin/bash

#IMAGE="$1"
RUN_DIR="$1"
DATA_DIR="$2"
#NUM_CORES="$4"
echo "$RUN_DIR"
echo "Start Run Script Started"
echo "running" > $RUN_DIR/status.log
cd $RUN_DIR
#docker run --rm --cpus="$NUM_CORES" -v "$RUN_DIR/workingDir":/workingdir -v "$DATA_DIR":/workingdir/Data "$IMAGE" /bin/bash -c "python -u /opt/PinAPL-Py/Scripts/PinAPL.py > /workingdir/output.log 2>&1 && chown -R www-data:www-data /workingdir"
matlab -nodisplay -nosplash -nodesktop -r "addpath(genpath('~/')); config_file='{$RUN_DIR}/configuration.yaml'; /opt/MetabolicTasks/run.m" > "$RUN_DIR/status.log"

echo "finished" > "$RUN_DIR/status.log"
