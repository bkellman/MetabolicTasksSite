#!/bin/bash

#IMAGE="$1"
RUN_DIR="$1"
DATA_DIR="$2"
#NUM_CORES="$4"
echo "$RUN_DIR"
echo "Start Run Script Started"
echo "running" > $RUN_DIR/status.log

scriptPath=$(cd -P -- "$(dirname -- "$0")" && pwd -P)

bash "$scriptPath"/bensRun.sh "$RUN_DIR" "$DATA_DIR" > "$RUN_DIR"/workingDir/output.log 2>&1

echo "finished" > "$RUN_DIR/status.log"
