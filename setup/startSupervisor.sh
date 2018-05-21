#!/bin/bash
sudo supervisord
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start cellfie-worker:*
sudo supervisorctl start cellfie-worker-monitor:*
sudo supervisorctl start cellfie-worker-start-run:*
